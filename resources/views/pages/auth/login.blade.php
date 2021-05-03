@extends('layouts.layout')

@section('title') Login @endsection

@section('content')

    {{-- Login form --}}
    <form action="{{ route('login') }}" method="POST" class="container">

        @csrf

        <input type="text" name="login" placeholder="Login" class="form-control form-control-lg" value="{{ old('login') }}">
        <input type="password" name="password" placeholder="Password" class="form-control form-control-lg">

        <input type="submit" value="Login" class="form-control form-control-lg btn btn-primary">

    </form>

    {{-- Validation errors --}}
    <div class="text-danger">
        @if($errors->any())
            {{ $errors->all()[0] }}
        @endif
    </div>

@endsection
