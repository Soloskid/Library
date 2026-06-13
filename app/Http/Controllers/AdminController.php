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

        $cloudName = env('CLOUDINARY_CLOUD_NAME');
        $apiKey = env('CLOUDINARY_API_KEY');
        $apiSecret = env('CLOUDINARY_API_SECRET');

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $timestamp = time();
            $signature = sha1('timestamp='.$timestamp.$apiSecret);

            $response = Http::attach('file', file_get_contents($file), $file->getClientOriginalName())
            ->post('https://api.cloudinary.com/v1_1/'.$cloudName.'/image/upload', [
                'api_key' => $apiKey,
                'timestamp' => $timestamp,
                'signature' => $signature,
            ]);

            if($response->successful()) {
                $book->cover_image = $response->json()['secure_url'];
            }
        }

        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $timestamp = time();
            $signature = sha1('timestamp='.$timestamp.$apiSecret);

            $response = Http::attach('file', file_get_contents($file), $file->getClientOriginalName())
            ->post('https://api.cloudinary.com/v1_1/'.$cloudName.'/raw/upload', [
                'api_key' => $apiKey,
                'timestamp' => $timestamp,
                'signature' => $signature,
            ]);

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