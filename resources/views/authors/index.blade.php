@foreach ($authors as $author)
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
@endforeach