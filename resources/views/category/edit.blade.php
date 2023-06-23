@extends('layouts.app');

@section('content')
<div style="margin: auto; width:50%; padding:10px; border: 1px solid blue; border-radius:10px;">
{!! Form::model($category, ['route' => ['categories.update', $category], 'method' => 'put']) !!}
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name:</label>
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
@error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description:</label>
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
  </div>
  @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
@can('update', App\Models\Category::class)
  {!! Form::submit('Update', ['class' => 'btn btn-success form-control']) !!}
  {!! Form::close() !!}
  </div>
  @endcan
@endsection