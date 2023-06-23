<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Twilio\Rest\Client;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $to = $request->phone;

        //send OTP with Twilio
        $otp = rand(100000, 999999);

        // Store the OTP in the session
        Session::put('OTP', $otp);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->phone,
            'national_id' => $request->national_id,
            'password' => Hash::make($request->password),
            'OTP' => $otp,
        ]);

        $role = Role::findByName('Regular'); // Replace 'user' with the desired role name
        $user->assignRole($role);

        event(new Registered($user));
        Auth::login($user);

        // Send the OTP via SMS
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $twilioNumber = env('TWILIO_FROM');

        $client = new Client($sid, $token);
        $client->messages->create($to, // to
            array(
                "from" => $twilioNumber,
                "body" => "Your OTP is :" . $otp,
            )
        );

        return redirect(RouteServiceProvider::HOME);
    }
}
