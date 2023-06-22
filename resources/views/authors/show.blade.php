@extends('layouts.app')
@section('content')
<div class="container">
    @if (session('success'))
    <div class ='alert alert-success'>
        {{session('success')}}
    </div>
        @endif
    <div>
    <h2>{{ $author->name }}</h2>
    <p>{{ $author->date }}</p>
    <p>{{ $author->brief }}</p>
    <a href="{{ route('Author.edit', $author) }}">Edit</a>
   
    <form action="{{ route('Author.destroy', $author) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</div>