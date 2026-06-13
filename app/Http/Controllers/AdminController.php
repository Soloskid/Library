<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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
            $uploadedFile = Cloudinary::upload($request->file('cover_image')->getRealPath(), [
                'folder' => 'library/covers'
            ]);
            $book->cover_image = $uploadedFile->getSecurePath();
        }

        if ($request->hasFile('file_path')) {
            $uploadedFile = Cloudinary::uploadFile($request->file('file_path')->getRealPath(), [
                'folder' => 'library/books',
                'resource_type' => 'raw'
            ]);
            $book->file_path = $uploadedFile->getSecurePath();
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