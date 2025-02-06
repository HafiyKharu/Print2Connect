<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PostPrintRequest;
use App\Models\PrintShops;
use App\Models\User;
use App\Mail\TemplateEmail;
use Illuminate\Support\Facades\Mail;

class PrintRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // Get the incoming search term
        $search = $request->input('search');

        // Filter print requests by 'printType' or 'description'
        $printRequests = PostPrintRequest::when($search, function ($query) use ($search) {
            return $query->where('printType', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        })
            ->with('user', 'comments.user')
            ->latest()
            ->paginate(10);

        return view('post_print_requests.index', compact('printRequests'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'printType' => 'required|string|max:255',
            'description' => 'required|string',
            'quantity' => 'required|integer',
            'deadline' => 'required|date',
        ]);

        PostPrintRequest::create([
            'user_id' => auth()->id(),
            'printType' => $request->printType,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'deadline' => $request->deadline,
            'status' => 'opened',
        ]);

        return redirect()->route('post_print_requests.index')
            ->with('success', 'Print request created successfully.');
    }

    public function accept(PostPrintRequest $postPrintRequest, $id)
    {
        // Optional: confirm user is a print shop
        if (auth()->user()->role !== 'print shop') {
            return redirect()->route('post_print_requests.index')->with('error', 'Not authorized.');
        }
    
        // Only update if status is not already "accepted"
        if ($postPrintRequest->status !== 'accepted') {
            // $postPrintRequest->update([
            //     'status' => 'accepted',
            // ]);
            // Send approval email
            $UserC = User::findOrFail($postPrintRequest->user_id);
            $printshop = $printshop = PrintShops::findOrFail($this->getPrintShopByUserId($id));
            $details = [
                'title' => 'Your Print Request has been Accepted',
                'body' => 'The detail of print shop:',
                'printshop' => $printshop,
                'closer' => "Kindly chat the print shop by yourself 🥳. Thank you for using our services. We hope to see you posting again 😄",
            ];
            Mail::to($UserC->email)->send(new TemplateEmail($details));
    
            return redirect()->route('post_print_requests.index')->with('success', 'Print request accepted.');
        }
    
        return redirect()->route('post_print_requests.index')->with('error', 'This request is already accepted.');
    }
    public function getByUserId($userId)
    {
        $requests = PostPrintRequest::where('user_id', $userId)->get();
        return $requests;
    }
    public function getPrintShopByUserId($id)
    {
        $printShop = PrintShops::where('user_id', $id)->first();
        return $printShop ? $printShop->id : null;
    }
    public function getPrintRequestsByUserId($userId)
{
    return PostPrintRequest::where('user_id', $userId)->get();
}
}