<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('userregister');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'age' => ['nullable', 'integer', 'min:13', 'max:120'],
            'address' => ['nullable', 'string', 'max:255'],
            'phone_number' => ['nullable', 'string', 'max:20'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'username' => ['nullable', 'string', 'max:255', 'unique:'.User::class],
            'height' => ['nullable', 'numeric', 'min:100', 'max:250'],
            'weight' => ['nullable', 'numeric', 'min:20', 'max:300'],
            'body_type' => ['nullable', 'string', 'in:ectomorph,mesomorph,endomorph,other'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'age' => $request->age,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'username' => $request->username,
            'height' => $request->height,
            'weight' => $request->weight,
            'body_type' => $request->body_type,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('discover', absolute: false));
    }
}
