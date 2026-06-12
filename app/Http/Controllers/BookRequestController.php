<?php

namespace App\Http\Controllers;

use App\Models\BookRequest;
use Illuminate\Http\Request;

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
        $request = BookRequest::findOrFail($id);
        $request->update(['status' => 'fulfilled']);
        return back()->with('success', 'Request marked as fulfilled!');
    }
}