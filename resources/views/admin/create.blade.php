@extends('layouts.app')
 @section('content')
 <div class="container">

    {!! Form::open(['route' => 'books.store', 'files' => true]) !!} 
    <div class="mb-3">
        {!!   Form::label('title', 'title', ['class' => 'awesome'])  !!}
        {!!   Form::text('title', null,['class' =>"form-control"])  !!}    
    </div>
    <span
    class="@error('title') is-invalid @enderror">
    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </span>
    <div class="mb-3">
        {!!   Form::label('description', 'description', ['class' => 'awesome'])  !!}
        {!!   Form::textArea('description', null,['class' => 'form-control'])  !!}    
    </div>
    <span
    class="@error('description') is-invalid @enderror">
    @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </span>


    <span
    class="@error('Image') is-invalid @enderror">
    @error('Image')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </span>


    <div class="mb-3">
        {!!   Form::label('Auther_id', 'Author name', ['class' => 'awesome'])  !!}
        <select name="Auther_id" class="form-control"placeholder = 'plz select author...'>
        <option value="">Select Author</option>
            @foreach($authors as $author)
            <option value="{{$author->id}}">{{$author->name}}</option>
            @endforeach
        </select>
    </div>
    <span
    class="@error('Auther_id') is-invalid @enderror">
    @error('Auther_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </span>

    <div class="mb-3">
        {!!   Form::label('Category_id', 'Category_id', ['class' => 'awesome'])  !!}
        <select name="Category_id" class="form-control"placeholder = 'plz select cateory...'>
            <option  value="">Select category</option>
                @foreach($category as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select>
    </div>
    <span
    class="@error('Category_id') is-invalid @enderror">
    @error('Category_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </span>
    

<div class="mb-3">
    {!!   Form::submit('Click Me!' ,['class' => 'form-control btn btn-primary'])  !!}    
</div>
{!! Form::close() !!}
  @endsection
