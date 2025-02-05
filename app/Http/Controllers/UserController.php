<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Contracts\Validation\Rule;

class UserController extends Controller
{
    public function show(User $user)
    {
        $items = null;

        switch ($user->role) {
            case 'customer':
                $items = (new PrintRequestController)->getByUserId($user->id);
                break;
            case 'printshop':
                $items = (new CatalogueController)->getByUserId($user->id);
                break;
            default:
                $items = collect(); // Empty collection if no role matches
                break;
        }

        return view('users.show', [
            'user' => $user,
            'items' => $items,
        ]);
    }

    public function edit(User $user)
    {
        abort_if($user->isNot(auth()->user()), 404);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username'=>[
                'string', 
                'required', 
                'max:255', 
                'alpha_dash', ],
            'avatar'=>'file',
            'name'=>'string|required|max:255',
            'description'=>'string',
            'email'=>
            'string|required|email|max:255',
            // 'Unique:users,username,except,$user->email'
            'password'=>'string|required|min:8|max:255|confirmed',
        ]);
        $validated['password'] = Hash::make($request->password);

        if(request('avatar')){
            $validated['avatar'] = request('avatar')->store('avatars');
        }
        if(request('banner')){
            $validated['banner'] = request('banner')->store('banners');
        }
        
        $user->update($validated);
        return redirect(route('users.show', $user));
    }
}
