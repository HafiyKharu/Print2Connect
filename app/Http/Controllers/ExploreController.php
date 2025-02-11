<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ExploreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $search = $request->input('search');

        $customers = User::where('role', 'customer')
            ->where('username', 'like', '%' . $search . '%')
            ->orderBy('username', 'asc')
            ->get();

        $printShops = User::join('print_shops', 'users.id', '=', 'print_shops.user_id')
            ->where('users.role', 'print shop')
            ->where(function ($query) use ($search) {
                $query->where('users.username', 'like', '%' . $search . '%')
                    ->orWhere('users.name', 'like', '%' . $search . '%');
            })
            ->where('print_shops.is_approved', 1)
            ->orderBy('users.username', 'asc')
            ->select('users.*')
            ->get();


        return view('explore', [
            'customers' => $customers,
            'printShops' => $printShops,
            'search' => $search,
        ]);
    }
}
