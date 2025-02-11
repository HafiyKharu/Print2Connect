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

        $printShops = User::where('role', 'print shop')
            ->where('username', 'like', '%' . $search . '%')
            ->where('status', 'approved')
            ->orderBy('username', 'asc')
            ->get();

        return view('explore', [
            'customers' => $customers,
            'printShops' => $printShops,
            'search' => $search,
        ]);
    }
}
