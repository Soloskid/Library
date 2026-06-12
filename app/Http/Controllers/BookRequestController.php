<?php

namespace App\Http\Controllers;

use App\Models\BookRequest;
use App\Mail\BookRequestFulfilled;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookRequestController extends Controller
{
    public function index()
    {
        $requests = BookRequest::where('user_id', auth()->id())->get();
        return view('requests.index', compact('requests'));
    }

    public function create()
    {
        return view('requests.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_title' => 'required',
        ]);

        BookRequest::create([
            'user_id' => auth()->id(),
            'book_title' => $request->book_title,
            'author' => $request->author,
            'description' => $request->description,
            'status' => 'pending',
        ]);

        return redirect('/requests')->with('success', 'Book request submitted! We will upload it within 24-48 hours.');
    }

    public function adminIndex()
    {
        $requests = BookRequest::with('user')->latest()->get();
        return view('admin.requests', compact('requests'));
    }

    public function fulfill($id)
    {
        $bookRequest = BookRequest::with('user')->findOrFail($id);
        $bookRequest->update(['status' => 'fulfilled']);

        Mail::to($bookRequest->user->email)->send(new BookRequestFulfilled($bookRequest));

        return back()->with('success', 'Request fulfilled and email sent to user!');
    }
}