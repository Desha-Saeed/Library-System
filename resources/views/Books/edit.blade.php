 @extends('layouts.app')
 @section('content')
 <div class="container">
{!! Form ::model($book,['route' => ['books.update',$book->id], 'method' => 'put', 'files' => true]) !!} 

    <div class="mb-3">
        {!!   Form::label('title', 'title', ['class' => 'awesome'])  !!}
        {!!   Form::text('title', null,['class' => 'form-control'])  !!}    
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

    <div class="mb-3">
        {!!   Form::label('Image', 'Image', ['class' => 'awesome'])  !!}
        {!!   Form::file('Image', null,['class' => 'form-control'], $attributes = [])  !!}    
    </div>
    <span
    class="@error('Image') is-invalid @enderror">
    @error('Image')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </span>


    <div class="mb-3">
        {!!   Form::label('Auther_id', 'Auther_id', ['class' => 'awesome'])  !!}
        {!!   Form::number('Auther_id', null,['class' => 'form-control'])  !!}    
    </div>
    <span
    class="@error('Auther_id') is-invalid @enderror">
    @error('Auther_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </span>
    <div class="mb-3">
        {!!   Form::label('Category_id', 'Category_id', ['class' => 'awesome'])  !!}
        {!!   Form::number('Category_id', null,['class' => 'form-control'])  !!}    
    </div>
    <span
    class="@error('Category_id') is-invalid @enderror">
    @error('Category_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </span>
    @can('update', App\Models\books::class)   
    <div class="mb-3">
    {!!   Form::submit('Click Me!' ,['class' => 'form-control btn btn-primary'])  !!}
 
    </div>
    @endcan
{!! Form::close() !!}
  @endsection
