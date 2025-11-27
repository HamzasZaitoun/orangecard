<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordResetController extends Controller
{
    public function __invoke showForceResetForm()
    {
        return view('auth.force-password-reset');
    }
}
