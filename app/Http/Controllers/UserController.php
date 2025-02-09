<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PostPrintRequest; // Add this line
use App\Models\Catalogue; // Add this line if not already present
use App\Models\Customers;
use App\Models\PrintShops;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Contracts\Validation\Rule;

class UserController extends Controller
{
    public function show(User $user)
    {
        $printRequests = [];
        $catalogues = [];
        $customer = Customers::where('user_id', $user->id)->first();
        $printshop = PrintShops::where('user_id', $user->id)->first();

        if ($user->role === 'customer') {
            $printRequests = $user->postPrintRequests()->paginate(50);
        } elseif ($user->role === 'print shop') {
            $catalogues = $user->catalogues()->paginate(50);
        }

        return view('users.show', [
            'user' => $user,
            'printRequests' => $printRequests,
            'catalogues' => $catalogues,
            'customer' => $customer,
            'printshop' => $printshop,
        ]);
    }

    public function edit(User $user)
    {
        abort_if($user->isNot(auth()->user()), 404);

        $roleSpecificData = [];
        if ($user->role === 'customer') {
            $roleSpecificData = Customers::where('user_id', $user->id)->first();
        } elseif ($user->role === 'print shop') {
            $roleSpecificData = PrintShops::where('user_id', $user->id)->first();
        }

        return view('users.edit', compact('user', 'roleSpecificData'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username' => [
                'string',
                'required',
                'max:255',
                'alpha_dash',
            ],
            'avatar' => 'file',
            'name' => 'string|required|max:255',
            'description' => 'string|nullable',
            'email' => 'string|required|email|max:255',
            'password' => 'nullable|string|min:8|max:255|confirmed',
        ]);
    
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        } else {
            unset($validated['password']);
        }
    
        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('avatars');
        }
        if ($request->hasFile('banner')) {
            $validated['banner'] = $request->file('banner')->store('banners');
        }
    
        $user->update($validated);
    
        if ($user->role === 'customer') {
            $customerData = $request->validate([
                'phoneNumber' => 'nullable|string|max:255',
                'address' => 'nullable|string|max:255',
            ]);
    
            Customers::updateOrCreate(
                ['user_id' => $user->id],
                $customerData
            );
        } elseif ($user->role === 'print shop') {
            $printShopData = $request->validate([
                'businessRegNo' => 'nullable|string|max:255',
                'address' => 'nullable|string|max:255',
                'contactNo' => 'nullable|string|max:255',
                'serviceDescription' => 'nullable|string|max:255',
            ]);
    
            PrintShops::updateOrCreate(
                ['user_id' => $user->id],
                $printShopData
            );
        }
    
        return redirect(route('users.show', $user));
    }
}
