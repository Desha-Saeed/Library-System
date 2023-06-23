@extends('layouts.app')
@section('content')
<div class="container">
<?php
//  use App\Models\User; 
?>    
    @if (session('success'))
    <div class ='alert alert-success'>
        {{session('success')}}
    </div>
        @endif
 
    <a class ='btn btn-primary'  href={{ route('books.create') }}>add new book </a>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">description</th>
            <th scope="col">Image</th>
            <th scope="col">Auther_name</th>
            <th scope="col">Category_name </th>
            <th scope="col">created_date</th>
            <th scope="col">actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                    
                <td>{{ $loop->iteration }}</td>
                {{-- <td> {{  $student->user->name }}</td> --}}
                {{-- <td> {{User::find(  $student->user_id)->name }}</td> --}}
                {{-- <td>{{ $student->user_id }}</td> --}}
                <td>{{ $book->title  }}</td>
                <td>{{ $book->description }}</td>
                <td><img height=100px width="100px" src="{{asset('/storage/images/books/'.$book->Image)}}"></td>
                <td>{{ $book->Auther_id }}</td>
                <td>{{ $book->Category_id }}</td>
                <td>{{ $book->created_at }}</td>
                
                @can('update', App\Models\books::class)
                <td>
                   
                <a class ='btn btn-primary'  href={{ route('books.edit', "$book->id") }}>edit book </a>
              
                </td>
                @endcan

                @can('delete', App\Models\books::class)
                <td>
                {!! Form ::open(['route' => ['books.destroy',$book->id], 'method' => 'delete']) !!} 
                <div class="mb-3">
                    {!!   Form::submit('delete!' ,['class' => 'btn btn-danger'])  !!}    
                </div>
                {!! Form::close() !!}
                </td>
                @endcan
            </tr>
        @endforeach
        
          
        </tbody>
      </table>

  @endsection
    