@extends('layouts.app')
 @section('content')
 <div class="container">

    {!! Form::open(['route' => 'managers.store']) !!} 
    <div class="mb-3">
        {!!   Form::label('name', 'name', ['class' => 'awesome'])  !!}
        {!!   Form::text('name', null,['class' =>"form-control"])  !!}    
    </div>
    <span
    class="@error('name') is-invalid @enderror">
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </span>
    <div class="mb-3">
        {!!   Form::label('email', 'email', ['class' => 'awesome'])  !!}
        {!!   Form::email('email', null,['class' => 'form-control'])  !!}    
    </div>
    <span
    class="@error('email') is-invalid @enderror">
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </span>

    <div class="mb-3">
        {!!   Form::label('password', 'password', ['class' => 'awesome'])  !!}
        {!!   Form::password('password', null,['class' => 'form-control'], $attributes = [])  !!}    
    </div>
    <span
    class="@error('password') is-invalid @enderror">
    @error('password')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </span>

   

   @can('create', App\Models\User::class)
<div class="mb-3">
    {!!   Form::submit('add manager!' ,['class' => 'form-control btn btn-primary'])  !!}    
</div>
@endcan

{!! Form::close() !!}
  @endsection
