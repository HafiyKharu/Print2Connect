<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\PostPrintRequest;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, PostPrintRequest $postPrintRequest)
    {
        $request->validate([
            'description' => 'required|string',
        ]);

        Comment::create([
            'postprintrequest_id' => $postPrintRequest->id,
            'user_id'             => auth()->id(),
            'description'         => $request->description,
        ]);

        return redirect()->route('post_print_requests.index')
                         ->with('success', 'Comment added successfully.');
    }
}