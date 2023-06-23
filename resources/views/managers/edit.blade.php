@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Manager') }}</div>
        
                    <div class="card-body">
                        {!! Form::model($manager, ['route' => ['managers.update', $manager], 'method' => 'PUT']) !!}
        
                            <div class="form-group row">
                                {!! Form::label('name', __('Name'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}
        
                                <div class="col-md-6">
                                    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'required', 'autofocus']) !!}
        
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="form-group row">
                                {!! Form::label('email', __('Email'), ['class' => 'col-md-4 col-form-label text-md-right']) !!}
        
                                <div class="col-md-6">
                                    {!! Form::email('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'required']) !!}
        
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
        
                          
        
                           @can('update', App\Models\User::class)
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    {!! Form::submit(__('Update Manager'), ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>
                            @endcan
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection