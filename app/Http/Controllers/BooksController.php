<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    public function store()
    {
        Book::create($this->validateRequest());

        $book = Book::first();

        return redirect($book->path());
    }

    public function update(Book $book)
    {
        $book->update($this->validateRequest());

        return redirect($book->path());
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect('/books');
    }

    /**
     * @return array
     */
    protected function validateRequest()
    {
        return request()->validate([
            'title' => 'required',
            'author' => 'required'
        ]);
    }
}
