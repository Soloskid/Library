<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('admin.index', compact('books'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);

        $book = new Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->category = $request->category;
        $book->description = $request->description;

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $response = Http::withBasicAuth(
                env('CLOUDINARY_API_KEY'),
                env('CLOUDINARY_API_SECRET')
            )->attach('file', file_get_contents($file), $file->getClientOriginalName())
            ->post('https://api.cloudinary.com/v1_1/'.env('CLOUDINARY_CLOUD_NAME').'/image/upload');
            
            if($response->successful()) {
                $book->cover_image = $response->json()['secure_url'];
            }
        }

        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $response = Http::withBasicAuth(
                env('CLOUDINARY_API_KEY'),
                env('CLOUDINARY_API_SECRET')
            )->attach('file', file_get_contents($file), $file->getClientOriginalName())
            ->post('https://api.cloudinary.com/v1_1/'.env('CLOUDINARY_CLOUD_NAME').'/raw/upload');
            
            if($response->successful()) {
                $book->file_path = $response->json()['secure_url'];
            }
        }

        $book->save();

        return redirect('/admin')->with('success', 'Book added successfully!');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect('/admin')->with('success', 'Book deleted successfully!');
    }
}