<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\StoreBookRequest;
use App\Http\Controllers\Api\UpdateBookRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookCollection;
use App\Models\Book;

class BookController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return BookCollection
     */
    public function index()
    {
        return new BookCollection(Book::latest()->paginate());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
