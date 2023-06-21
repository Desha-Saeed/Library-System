@extends('layouts.app');

@section('content')
@if (session()->has('success'))
<div class="alert alert-success">
    {{ session('success')}}
</div>
@endif
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{$category->name}}</td>
            <td>{{$category->description}}</td>
            <td>
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info">
                    Edit
                </a>
            </td>
            <td>
                <form action="{{ route('categories.destroy', $category) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection