@extends('layouts.app')
@section('content')
<div class="container">
    <?php
     use App\Models\books; 
     use App\Models\Author; 
     use App\Models\Category; 
    ?>
{{-- //  use App\Models\User;  --}}
<div class="container">
        <div class="row">
            
            @foreach ($books as $book)
            <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" height=150px width="100px" src="{{asset('/storage/images/books/'.$book->Image)}}"    alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">book name: {{ $book->title }}</h5>
                  {{-- <h5>author name:  {{$book->Auther() }}</h5> --}}
                  <h5>author name:  {{Author::find(  $book->Auther_id)->name }}</h5>
                  <p class="card-text">desc: {{$book->description}}</p>
                  <p>
                    categories :  {{Category::find(  $book->Category_id)->name }}
                  </p>
                </div>
              </div>
            </div>
            @endforeach
        </div>
    </div>
       
    

  @endsection
    