<?php

namespace App\Http\Controllers;

use App\Models\PrintShops;
use Illuminate\Http\Request;
use App\Mail\TemplateEmail;
use Illuminate\Support\Facades\Mail;

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

        // Send approval email
        $details = [
            'title' => 'Your Account has been Approved',
            'body' => 'Your print shop account has been approved.',
            'printshop' => $printshop,
            'closer' => "Your account is now active 🥳. You can now login and start using our services. Welcome to Print2Connect! 😄",
        ];
        Mail::to($printshop->user->email)->send(new TemplateEmail($details));

        return redirect()->back()->with('success', 'Print shop approved and email sent.');
    }

    public function showPrintshop($id)
    {
        $printshop = PrintShops::findOrFail($id);
        return view('admin.show-printshop', compact('printshop'));
    }

    public function rejectPrintshop($id)
    {
        $printshop = PrintShops::findOrFail($id);
        $email = $printshop->user->email;
        $printshop->delete();
        $printshop->user->delete();

        // Send rejection email
        $details = [
            'title' => 'Your Account has been Rejected',
            'body' => 'Your print shop account has been rejected.',
            'printshop' => $printshop,
            'closer' => "We reviewed your application and found it's not satisfactory 😓.Your account had been removed. We hope you can apply again in the future. Thank you for your interest in Print2Connect. 😊",
        ];
        Mail::to($printshop->user->email)->send(new TemplateEmail($details));

        return redirect()->back()->with('success', 'Print shop rejected and email sent.');
    }
}