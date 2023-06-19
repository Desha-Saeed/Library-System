@foreach ($authors as $author)
    <div>
        <h2>{{ $author->name }}</h2>
        <p>{{ $author->date }}</p>
        <p>{{ $author->brief }}</p>
        <a href="{{ route('authors.edit', $author) }}">Edit</a>
        <form action="{{ route('authors.destroy', $author) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach