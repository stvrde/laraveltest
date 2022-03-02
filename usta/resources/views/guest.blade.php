@extends('layouts.guest')
@section('styles')
    <link rel="stylesheet" href="/css/login.css">
@endsection
@section('form')

    <!--form-stars-here-->
    <div class="wthree-form">
        <h2>Fill out the form below to login</h2>
        <form action="{{ route('login') }}" method="post">
            <div class="form-sub-w3">
                <input type="text" name="username" placeholder="Username " required="" />
                <div class="icon-w3">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
            </div>
            <div class="form-sub-w3">
                <input type="password" name="password" placeholder="Password" required="" />
                <div class="icon-w3">
                    <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                </div>
            </div>

            <div class="submit-agileits">
                <input type="submit" value="Login">
                &nbsp &nbsp &nbsp &nbsp
                <a href="{{ route('register') }}"><input type="button" value="Register"></a>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">


        </form>

    </div>
    <!--//form-ends-here-->
@endsection
@section('content')
    <div class="container text-center">
        <br> <br>
        <h2 class="thin">Hello stranger</h2>
        <p class="text-muted">
            The difference between involvement and commitment is like an eggs-and-ham breakfast:<br>
            the chicken was involved; the pig was committed.
        </p>
    </div>
@endsection