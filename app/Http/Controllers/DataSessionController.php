<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataSessionController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->is_admin) {
            return 'Eres admin';
        } else {
            return 'No eres admin';
        }
    }
}
