<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PostPrintRequest; // Add this line
use App\Models\Catalogue; // Add this line if not already present
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
    
        if ($user->role === 'customer') {
            $printRequests = $user->postPrintRequests()->paginate(50);
        } elseif ($user->role === 'print shop') {
            $catalogues = $user->catalogues()->paginate(50);
        }

        return view('users.show', [
            'user' => $user,
            'printRequests' => $printRequests,
            'catalogues' => $catalogues,
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
