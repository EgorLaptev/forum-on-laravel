@extends('layouts.layout')

@section('title') Login @endsection

@section('content')

    {{-- Create post form --}}
    <form action="{{ route('posts.create') }}" method="POST" class="container">

        @csrf

        <input type="text" name="title" placeholder="Title" class="form-control form-control-lg"
               value="{{ old('title') }}">
        <div class="form-file">
            <input type="file" name="image" class="form-file-input" id="image">
            <label class="form-file-label" for="image">
                <span class="form-file-text">Choose file...</span>
            </label>
        </div>
        <textarea name="anons" class="form-control form-control-lg" placeholder="Anons">{{ old('anons') }}</textarea>
        <textarea name="content" class="form-control form-control-lg" placeholder="Content">{{ old('content') }}</textarea>

        <input type="submit" value="Create" class="form-control form-control-lg btn btn-primary">

    </form>

    {{-- Validation errors --}}
    <div class="text-danger">
        @if($errors->any())
            {{ $errors->all()[0] }}
        @endif
    </div>

    {{-- If the post was created successfully --}}
    <div class="text-success">
        @if(\Illuminate\Support\Facades\Session::has('success'))
            {{ \Illuminate\Support\Facades\Session::get('success') }}
        @endif
    </div>

@endsection
