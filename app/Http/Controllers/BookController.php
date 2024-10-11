<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {

        $books = Book::latest()->paginate(6);
        return view('book.index', compact('books'));
    }

    public function show(Book $book)
    {
        return view('book.show', compact('book'));
    }

    public function create()
    {
        return view('book.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'author_name' => 'required',
            'page_num' => 'required',
        ]);

        $book = Book::create($request->all());
        return redirect()->route('book.index')
            ->with('success', 'book added succeessfully');
    }
    public function edit(Book $book)
    {
        return view('book.edit', compact('book'));
    }

    public function update(Request $request, Book $bookId){
        $request->validate([
            'name' => 'required',
            'author_name' => 'required',
            'page_num' => 'required',
            'image' => 'required',
        ]);
        $book = Book::class;
       (new Book)->update($request->all());
        return redirect()->route('book.index')
            ->with('success', 'book ubdated succeessfully');
    }
    public function destroy(Book $bookId){
        $bookId->delete();
        return redirect()->route('book.index')
            ->with('success', 'book deleted succeessfully');
    }
}
