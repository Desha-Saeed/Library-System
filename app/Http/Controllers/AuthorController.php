<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\books;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();

    return response()->json([
        'status' => 'success',
        'data' => $authors
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'brief' => 'required|string|max:500',
        ]);
    
        $author = Author::create($validatedData);
    
        return response()->json([
            'status' => 'success',
            'message' => 'Author created successfully',
            'data' => $author
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $author = Author::with('books')->findOrFail($id);

    return response()->json([
        'status' => 'success',
        'data' => [
            'id' => $author->id,
            'name' => $author->name,
            'date'=> $author->date,
            'brief'=> $author->brief,
            'books' => $author->books->map(function ($book) {
                return [
                    'id' => $book->id,
                    'title' => $book->title,
                    //'published_at' => $book->published_at,
                ];
            })
        ]
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $author = Author::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'brief' => 'required|string|max:500',
        ]);
    
        $author->update($validatedData);
    
        return response()->json([
            'status' => 'success',
            'message' => 'Author updated successfully',
            'data' => $author
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = Author::findOrFail($id);

    $author->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'Author deleted successfully'
    ]);
    }
}
