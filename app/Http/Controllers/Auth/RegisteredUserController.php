<?php

namespace App\Http\Controllers\Auth;

use App\Events\PodcastProcessed;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // dd($request->post());

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string',
            'type_document' => 'required|string',
            'document_id' => 'required|integer',
            'telephone' => 'required|integer',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::min(8)],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'type_document' => $request->type_document,
            'document_id' => $request->document_id,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        event(new PodcastProcessed($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
