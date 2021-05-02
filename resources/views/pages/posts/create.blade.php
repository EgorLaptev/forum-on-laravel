@extends('layouts.layout')

@section('title') Login @endsection

@section('content')

    <form action="{{ route('posts.create') }}" method="POST" class="container">

        @csrf

        <input type="text" name="title" placeholder="Title" class="form-control form-control-lg" value="{{ old('title') }}">
        <textarea name="anons" class="form-control form-control-lg" placeholder="Anons">{{ old('anons') }}</textarea>
        <textarea name="content" class="form-control form-control-lg" placeholder="Content">{{ old('content') }}</textarea>
        <input type="submit" value="Create" class="form-control form-control-lg btn btn-primary">

    </form>

    <div class="text-danger">
        @if($errors->any())
            {{ $errors->all()[0] }}
        @endif
    </div>

    <div class="text-success">
        @if(\Illuminate\Support\Facades\Session::has('success'))
            {{ \Illuminate\Support\Facades\Session::get('success') }}
        @endif
    </div>

@endsection
