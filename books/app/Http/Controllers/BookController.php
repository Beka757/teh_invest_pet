<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BookController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $books = Book::orderBy('created_at', 'DESC')->paginate(10);
        return view('books.index', compact('books'));
    }

    /**
     * @return View
     */
    public function create(Book $book): View
    {
        $authors = Author::all();
        return view('books.create', compact('book', 'authors'));
    }

    /**
     * @param BookRequest $request
     * @return RedirectResponse
     */
    public function store(BookRequest $request): RedirectResponse
    {
        $data = $request->all();
        $book = Book::create($data);
        return redirect()->route('home')->with('status', "{$book->name} successfully created!");
    }
}
