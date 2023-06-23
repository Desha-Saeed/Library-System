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
 
    <a class ='btn btn-primary'  href={{ route('managers.create') }}>add new Manager </a>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                    
                <td>{{ $loop->iteration }}</td>
                {{-- <td> {{  $student->user->name }}</td> --}}
                {{-- <td> {{User::find(  $student->user_id)->name }}</td> --}}
                {{-- <td>{{ $student->user_id }}</td> --}}
                <td>{{ $user->name  }}</td>
                <td>{{ $user->email }}</td>
            
                
                @can('delete', App\Models\User::class)
                <td>
                   
                <a class ='btn btn-primary'  href={{ route('managers.edit', "$user->id") }}>edit book </a>
              
                </td>
                @endcan
          

                @can('delete', App\Models\User::class)
                <td>
                {!! Form ::open(['route' => ['managers.destroy',$user->id], 'method' => 'delete']) !!} 
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
    