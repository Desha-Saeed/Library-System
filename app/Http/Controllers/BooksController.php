<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorebooksRequest;
use App\Http\Requests\UpdatebooksRequest;
use App\Http\Resources\catResource;
use App\Models\Author;
use App\Models\books;
use App\Models\Category;
use Illuminate\Http\Request;
use Mockery\Exception;
use Mockery\Expectation;

class BooksController extends Controller
{
    public function index(Request $request)
    {
    if ($request->user()->cannot('view',books::class)) {
        return $this->show();
    }
        $books= books::all();
        return view('Books.list',compact( "books"));
    }

public function create(Request $request)
{
    if ($request->user()->cannot('create',books::class)) {
        return $this->show();
    }
    $category =  Category::all();
    $authors = Author::all();
    return view('Books.create',compact('category', 'authors'));
    }
    

   
    public function store(StorebooksRequest $request)
    {
        if ($request->user()->cannot('create',books::class)) {
            return $this->show();
        }
     $this->authorize('create', books::class);
        $book=new books($request->all());
        if($request->hasFile('Image')){ 
            $destination_path ='public/images/books';
            $image=$request->file('Image');
            $image_name=$image->getClientOriginalName();
            $path=$request->file('Image')->storeAs($destination_path,$image_name);
            $book['Image']=$image_name;
        }
        $book->save();
        return to_route('books.index')-> with('success',' create and save success');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // return "not valid";
         $books= books::all();
        return view('index',compact( "books"));
    }
    public function edit(books $book, Request $request)
    {

    //  $this->authorize('update', $book);
     if ($request->user()->cannot('update', $book)) 
     return $this->show();
     return view('Books.edit',compact("book"));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(StorebooksRequest $request, books $book)
    public function update(UpdatebooksRequest $request, books $book)
    {
     if ($request->user()->cannot('update', $book)) 
     return $this->show();
    $book->update($request->all());
    if($request->hasFile('Image')){ 
        $destination_path ='public/images/books';
        $image=$request->file('Image');
        $image_name=$image->getClientOriginalName();
        $path=$request->file('Image')->storeAs($destination_path,$image_name);
        $book['Image']=$image_name;
        }
    $book->save();
    return to_route('books.index');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(  Request $request ,books $book)
    {
        if ($request->user()->cannot('delete', $book)) 
     return $this->show();
     $book->delete();
     $request->session()->flash('success',"deleted successfully");

     return to_route('books.index');

        //
    }
}
