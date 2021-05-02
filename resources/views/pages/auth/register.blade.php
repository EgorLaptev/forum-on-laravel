@extends('layouts.layout')

@section('title') Register @endsection

@section('content')

    <form action="{{ route('register') }}" method="POST" class="container">

        @csrf

        <div class="row">
            <input type="text" name="login" placeholder="Login" class="form-control form-control-lg col mr-2" value="{{ old('login') }}">
            <input type="email" name="email" placeholder="E-mail" class="form-control form-control-lg col" value="{{ old('email') }}">
        </div>
        <div class="row">
            <input type="password" name="password" placeholder="Password" class="form-control form-control-lg col mr-2">
            <input type="password" name="password_confirmation" placeholder="Confirm password"
                   class="form-control form-control-lg col">
        </div>
        <div class="row">
            <input type="submit" value="Register" class="form-control form-control-lg btn btn-primary col-12">
        </div>

    </form>

    <div class="text-danger">
        @if($errors->any())
            {{ $errors->all()[0] }}
        @endif
    </div>

@endsection
