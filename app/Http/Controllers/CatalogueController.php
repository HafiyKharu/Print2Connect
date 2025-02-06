<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalogue;

class CatalogueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        //$catalogues = Catalogue::with('user')->latest()->get();

        // Filter print requests by 'printType' or 'description'
        $catalogues = Catalogue::when($search, function ($query) use ($search) {
            return $query->where('title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        })
            ->latest()
            ->paginate(10);
        return view('catalogues.index', compact('catalogues'));
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'print shop') {
            return redirect()->route('catalogues.index')
                ->with('error', 'Only print shops can post a new service.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start' => 'required|date',
            'end' => 'required|date',
            'catalogueImages' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (request('catalogueImages')) {
            $validated['catalogueImages'] = request('catalogueImages')->store('catalogueImages');
        }
        

        $validated['user_id'] = auth()->id();

        Catalogue::create($validated);

        return redirect()->route('catalogues.index')
            ->with('success', 'New service posted successfully.');
    }
    public function getByUserId($userId)
    {
        $catalogues = Catalogue::where('user_id', $userId)->get();
        return $catalogues;
    }
    public function getCataloguesByUserId($userId)
    {
        return Catalogue::where('user_id', $userId)->get();
    }
}