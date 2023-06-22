@extends('layouts.app')
 @section('content')
 <div class="container">
<form action="{{ route('Author.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        @error('name')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="date">Date:</label>
        <input type="date" name="date" id="date" value="{{ old('date') }}">
        @error('date')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="brief">Brief:</label>
        <textarea name="brief" id="brief">{{ old('brief') }}</textarea>
        @error('brief')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <button type="submit">Create</button>
</form>
</div>
  @endsection
