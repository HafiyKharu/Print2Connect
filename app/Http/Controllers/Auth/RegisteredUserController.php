<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Customers;
use App\Models\PrintShops;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users|alpha_dash',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        Auth::login($user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]));

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }

    public function createCustomer()
    {
        return view('auth.register-customer');
    }

    public function storeCustomer(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users|alpha_dash',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'phoneNumber' => 'required|string',
            'address' => 'required|string',
        ]);

        $user = User::create([
            'role' => 'customer',
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Store Customer data
        Customers::create([
            'user_id' => $user->id,
            'phoneNumber' => $request->phoneNumber,
            'address' => $request->address,
        ]);

        Auth::login($user);
        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }

    public function createPrintshop()
    {
        return view('auth.register-printshop');
    }

    public function storePrintshop(Request $request)
    {

        $request->validate([
            'username' => 'required|string|max:255|unique:users|alpha_dash',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'businessRegNo' => 'required|string',
            'address' => 'required|string',
            'contactNo' => 'required|string',
            'serviceDescription' => 'required|string',
        ]);

        $user = User::create([
            'role' => 'print shop',
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Store PrintShop data
        PrintShops::create([
            'user_id' => $user->id,
            'businessRegNo' => $request->businessRegNo,
            'address' => $request->address,
            'contactNo' => $request->contactNo,
            'serviceDescription' => $request->serviceDescription,
            'is_approved' => false,
        ]);

        return redirect()->route('login')->
            with('status', 'You need to wait for the admin to approve or reject your account. It will send you an email once your account is approved.');
    }
}
