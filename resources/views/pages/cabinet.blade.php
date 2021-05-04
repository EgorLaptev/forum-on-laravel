@extends('layouts.layout')

@section('title') Cabinet @endsection

@section('links')
    <link rel="stylesheet" href="{{ url('public/css/cabinet.css') }}">
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <section class="position-relative personal_info text-left text-light bg-dark rounded col-4 p-4 pt-5">

                <ul>
                    <li> Login: {{ $user['login'] }} </li>
                    <li> E-mail: {{ $user['email'] }} </li>
                    <li> Role: <span class="text-danger"> {{ $user['role'] }} </span></li>
                </ul>

                <button class="btn btn-danger mt-4">Delete account</button>

                <div class="text-secondary fas fa-user"></div>

            </section>

            <section class="position-relative user_info bg-dark rounded text-left text-light p-4 ml-4 col">

                <table class="info_table">

                    <tr>
                        <td>Total posts</td>
                        <td>{{ count($user->posts()->get()) }}</td>
                        <td>
                            <button class="btn"><i class="fas fa-eye"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Total comments</td>
                        <td>{{ count($user->comments()->get()) }}</td>
                        <td>
                            <button class="btn"><i class="fas fa-eye"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Liked posts</td>
                        <td>{{ count($user->liked_posts()->get()) }}</td>
                        <td>
                            <button class="btn"><i class="fas fa-eye"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Liked comments</td>
                        <td>{{ count($user->liked_comments()->get()) }}</td>
                        <td>
                            <button class="btn"><i class="fas fa-eye"></i></button>
                        </td>
                    </tr>

                </table>

                <div class="fas fa-address-card text-secondary"></div>

            </section>

        </div>
    </div>
@endsection
