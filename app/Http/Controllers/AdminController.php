<?php

namespace App\Http\Controllers;

use App\Models\PrintShops;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function approvePrintshopIndex()
    {
        $printshops = PrintShops::where('is_approved', false)->get();
        return view('admin.approve-printshop', compact('printshops'));
    }

    public function approvePrintshop($id)
    {
        $printshop = PrintShops::findOrFail($id);
        $printshop->update(['is_approved' => true]);
        return redirect()->back();
    }

    public function showPrintshop($id)
    {
        $printshop = PrintShops::findOrFail($id);
        return view('admin.show-printshop', compact('printshop'));
    }

    public function rejectPrintshop($id)
    {
        $printshop = PrintShops::findOrFail($id);
        $printshop->delete();
        return redirect()->back();
    }
}