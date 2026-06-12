<?php

namespace App\Http\Controllers;

use App\Models\SavedBook;
use App\Models\Book;
use Illuminate\Http\Request;

class SavedBookController extends Controller
{
    public function save($id)
    {
        $already = SavedBook::where('user_id', auth()->id())
                            ->where('book_id', $id)
                            ->first();

        if ($already) {
            return back()->with('error', 'Book already saved!');
        }

        SavedBook::create([
            'user_id' => auth()->id(),
            'book_id' => $id,
        ]);

        return back()->with('success', 'Book saved successfully!');
    }

    public function unsave($id)
    {
        SavedBook::where('user_id', auth()->id())
                 ->where('book_id', $id)
                 ->delete();

        return back()->with('success', 'Book removed from saved list!');
    }

    public function index()
    {
        $savedBooks = SavedBook::where('user_id', auth()->id())
                               ->with('book')
                               ->get();

        return view('dashboard', compact('savedBooks'));
    }
}