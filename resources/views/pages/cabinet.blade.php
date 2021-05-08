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
                    <li> Role: <span class="text-danger"> {{ $user->role['name'] }} </span></li>
                </ul>

                @cannot('admin')
                    @if(\Illuminate\Support\Facades\Auth::id() == $user['id'])
                        <a href="{{ route('user.delete', ['user_id' => $user['id']]) }}" id="deleteAccount" class="btn btn-danger mt-4">Delete account</a>
                    @endif
                    <div class="text-secondary fas fa-user personal_info-bg"></div>
                @else
                    <div class="text-secondary personal_info-bg fas fa-user-shield"></div>
                @endcannot

            </section>

            <section class="position-relative user_info bg-dark rounded text-left text-light p-4 ml-4 col">

                <table class="info_table">

                    <tr>
                        <td>Total posts</td>
                        <td>{{ count($user->posts()->get()) }}</td>
                        <td>
                            <a href="{{ route('user.posts', ['user_id' => $user['id']]) }}" class="btn"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Total comments</td>
                        <td>{{ count($user->comments()->get()) }}</td>
                        <td>
                            <a href="{{ route('user.comments', ['user_id' => $user['id']]) }}" class="btn"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Liked posts</td>
                        <td>{{ count($user->liked_posts()->get()) }}</td>
                        <td>
                            <a href="{{ route('user.likedPosts', ['user_id' => $user['id']]) }}" class="btn"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Liked comments</td>
                        <td>{{ count($user->liked_comments()->get()) }}</td>
                        <td>
                            <a href="{{ route('user.likedComments', ['user_id' => $user['id']]) }}" class="btn"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>

                </table>

                <div class="fas fa-address-card text-secondary"></div>

            </section>

        </div>
        @can('moder')
            <div class="row mt-3">

                <section class="all_users bg-dark text-light text-left rounded p-4 col-12">

                    <form>
                        <input type="search" id="searchUser" placeholder="Search user" class="form-control">
                    </form>

                    <table id="usersList" class="table table-hover text-secondary p-5"> {{-- The list generate with js --}} </table>

                </section>

            </div>
        @endcan
    </div>

@endsection

@section('scripts')
    @can('moder')
        {{-- Scripts for admin panel --}}
        <script src='{{ url('public/js/cabinet/searchUser.js') }}'></script>
    @elsecannot('moder')
        {{-- Scripts for user panel --}}
        <script src='{{ url('public/js/cabinet/deleteAccount.js') }}'></script>
    @endcannot
@endsection
