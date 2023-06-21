<form action="{{ route('authors.update', $author) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $author->name) }}">
        @error('name')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="date">Date:</label>
        <input type="date" name="date" id="date" value="{{ old('date', $author->date) }}">
        @error('date')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="brief">Brief:</label>
        <textarea name="brief" id="brief">{{ old('brief', $author->brief) }}</textarea>
        @error('brief')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <button type="submit">Update</button>
</form>