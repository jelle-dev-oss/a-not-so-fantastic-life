<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = DB::table('books')->get();

        return view('books.index', compact('books'));
    }

    // Display the Add Book form
    public function create()
    {
        return view('books.create');
    }

    // Save the new book
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|unique:books,isbn',
            'quantity' => 'required|integer|min:1',
        ]);

        DB::table('books')->insert([
            'title' => $validated['title'],
            'author' => $validated['author'],
            'isbn' => $validated['isbn'],
            'quantity' => $validated['quantity'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('books.index')
            ->with('success', 'Book added successfully!');
    }
}
