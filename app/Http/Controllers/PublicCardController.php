<?php

namespace App\Http\Controllers;

use App\Models\DigitalCard;
use Illuminate\Http\Request;

class PublicCardController extends Controller
{
    public function show($username, $userId)
    {
        // Find the user first
        $user = \App\Models\User::findOrFail($userId);

        // Verify username matches for security
        if ($user->username !== $username) {
            abort(404);
        }

        // Check if user is active
        if (!$user->is_active) {
            abort(404, 'This card is no longer available.');
        }

        // Check if user has a digital card
        if ($user->digitalCard) {
            $card = $user->digitalCard;
            return view('public.card', compact('card'));
        } else {
            // User doesn't have a digital card, show template
            return view('public.template-card', compact('user'));
        }
    }

    public function addContact(Request $request, $slug)
    {
        $request->validate([
            'visitor_name' => 'required|string|max:255',
            'visitor_mobile' => 'required|string|max:20',
        ]);

        $card = DigitalCard::where('public_slug', $slug)
            ->with('user')
            ->firstOrFail();

        // Check if user is active
        if (!$card->user->is_active) {
            abort(404, 'This card is no longer available.');
        }

        // Store the contact exchange for analytics (optional)
        try {
            \App\Models\ContactExchange::create([
                'digital_card_id' => $card->id,
                'visitor_name' => $request->visitor_name,
                'visitor_mobile' => $request->visitor_mobile,
                'visitor_ip' => $request->ip(),
            ]);
        } catch (\Exception $e) {
            // Silently fail if table doesn't exist
        }

        // Generate VCF with both contacts
        $vcf = $this->generateDualVCard($card, $request->visitor_name, $request->visitor_mobile);

        // Return as downloadable file
        $filename = str_replace(' ', '_', $card->full_name) . '_contact.vcf';

        return response($vcf, 200, [
            'Content-Type' => 'text/vcard; charset=utf-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }

    private function generateDualVCard(DigitalCard $card, string $visitorName, string $visitorMobile): string
    {
        $vcf = [];

        // Add card owner contact
        $vcf[] = "BEGIN:VCARD";
        $vcf[] = "VERSION:3.0";
        $vcf[] = "N:{$card->last_name};{$card->first_name};;;";
        $vcf[] = "FN:{$card->full_name}";

        if ($card->job_title) {
            $vcf[] = "TITLE:{$card->job_title}";
        }

        if ($card->email) {
            $vcf[] = "EMAIL;TYPE=INTERNET,WORK:{$card->email}";
        }

        if ($card->mobile_number) {
            $vcf[] = "TEL;TYPE=CELL:{$card->mobile_number}";
        }

        $vcf[] = "REV:" . now()->format('Y-m-d\TH:i:s\Z');
        $vcf[] = "END:VCARD";

        // Add visitor contact with card owner's name
        $vcf[] = "";
        $vcf[] = "BEGIN:VCARD";
        $vcf[] = "VERSION:3.0";

        // Parse visitor name
        $nameParts = explode(' ', trim($visitorName), 2);
        $firstName = $nameParts[0];
        $lastName = $nameParts[1] ?? '';

        $vcf[] = "N:{$lastName};{$firstName};;;";
        $vcf[] = "FN:{$visitorName}";
        $vcf[] = "TEL;TYPE=CELL:{$visitorMobile}";
        $vcf[] = "NOTE:Met via {$card->full_name}'s Orange E Card";
        $vcf[] = "REV:" . now()->format('Y-m-d\TH:i:s\Z');
        $vcf[] = "END:VCARD";

        return implode("\r\n", $vcf);
    }
}
