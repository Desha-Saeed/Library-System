{{-- @extends('layouts.app') --}}
 {{-- @section('content') --}}
 <div class="container">

    {!! Form::open(['route' => 'books.store', 'files' => true]) !!} 

   
    <div class="mb-3">
        {!!   Form::label('title', 'title', ['class' => 'awesome'])  !!}
        {!!   Form::text('title', null,['class' => 'form-control'])  !!}    
    </div>
   
   
      @if ($errors->has('name'))
         {{-- @foreach ( $errors->all() as $error )
        <div class ="alert alert-danger mb-3" >   {{$error}}</div>
         @endforeach  --}}
        <div class ="alert alert-danger mb-3" >   {{$errors->first()}}</div>
        @endif
   
   
        <div class="mb-3">
        {!!   Form::label('description', 'description', ['class' => 'awesome'])  !!}
        {!!   Form::textArea('description', null,['class' => 'form-control'])  !!}    
    </div>

    @if ($errors->has('description'))
   {{-- <div class ="alert alert-danger mb-3" >   {{$errors->all()->second() }}</div> --}}
   <div class ="alert alert-danger mb-3" >  ss</div>
   @endif
    <div class="mb-3">
        {!!   Form::label('Image', 'Image', ['class' => 'awesome'])  !!}
        {!!   Form::file('Image', null,['class' => 'form-control'], $attributes = [])  !!}    
    </div>


    <div class="mb-3">
        {!!   Form::label('Auther_id', 'Auther_id', ['class' => 'awesome'])  !!}
        {!!   Form::number('Auther_id', null,['class' => 'form-control'])  !!}    
    </div>
    <div class="mb-3">
        {!!   Form::label('Category_id', 'Category_id', ['class' => 'awesome'])  !!}
        {!!   Form::number('Category_id', null,['class' => 'form-control'])  !!}    
    </div>
<div class="mb-3">
    {!!   Form::submit('Click Me!' ,['class' => 'form-control btn btn-primary'])  !!}    
</div>
{!! Form::close() !!}
  {{-- @endsection --}}
