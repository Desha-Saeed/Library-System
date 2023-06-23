<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorebooksRequest;
use App\Http\Requests\UpdatebooksRequest;
use App\Models\books;
use Illuminate\Http\Request;
use Mockery\Exception;
use Mockery\Expectation;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = books::all();

        return view('Books.list', compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorebooksRequest $request)
    {
        // $book->title=$request->title;
        // $book->description=$request->description;
        $book = new books($request->all());

        $this->authorize('create', $book);
        if ($request->hasFile('Image')) {
            $destination_path = 'public/images/books';
            $image = $request->file('Image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('Image')->storeAs($destination_path, $image_name);
            $book['Image'] = $image_name;
        }
        // $this->authorize('create', books::class);
        //     $validaated=$request->validate(['name'=>'required', 
        //     'title'=>'required |numeric',
        //     'description'=>'required |unique:students'
        //     ,'tracks_id'=>'required']
        // );        
        // $st->user_id = auth()->user()->id;

        $book->save();
        return to_route('books.index')->with('success', ' create and save success');
    }

    /**
     * Display the specified resource.
     */
    public function show(books $books)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(books $book, Request $request)
    {
        // dd($book);
        //  $this->authorize('update', $book);

        // if ($request->user()->cannot('update', $Student)) 
        // return "no access";


        return view('Books.edit', compact("book")); // لازم نفس اسم المتغير وبرده بنادي عليه بنفس الاسم في الليست

        //
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(StorebooksRequest $request, books $book)
    public function update(UpdatebooksRequest $request, books $book)
    {
        $book->update($request->all());

        $this->authorize('update', $book);
        if ($request->hasFile('Image')) {
            $destination_path = 'public/images/books';
            $image = $request->file('Image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('Image')->storeAs($destination_path, $image_name);
            $book['Image'] = $image_name;
        }
        $book->save();
        return to_route('books.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, books $book)
    {

        $this->authorize('delete', $book);
        //  $books= books::find($books);
        $book->delete();
        $request->session()->flash('success', "deleted successfully");

        return to_route('books.index');

        //
    }
}
