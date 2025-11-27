<?php

namespace App\Http\Controllers;

use App\Models\DigitalCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class VCardController extends Controller
{
    public function download($slug)
    {
        $card = DigitalCard::where('public_slug', $slug)
            ->with('user')
            ->firstOrFail();

        // Check if user is active
        if (!$card->user->is_active) {
            abort(404, 'This card is no longer available.');
        }

        // Generate VCF content
        $vcf = $this->generateVCard($card);

        // Return as downloadable file
        $filename = str_replace(' ', '_', $card->full_name) . '.vcf';

        return Response::make($vcf, 200, [
            'Content-Type' => 'text/vcard; charset=utf-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }

    private function generateVCard(DigitalCard $card): string
    {
        $vcf = [];
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

        if ($card->profile_img_url) {
            // Optional: Include photo URL
            $vcf[] = "URL:{$card->profile_img_url}";
        }

        $vcf[] = "REV:" . now()->format('Y-m-d\TH:i:s\Z');
        $vcf[] = "END:VCARD";

        return implode("\r\n", $vcf);
    }
}
