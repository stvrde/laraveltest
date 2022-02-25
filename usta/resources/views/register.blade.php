@extends('layouts.guest')
@section('styles')
    <link rel="stylesheet" href="/css/login.css">
@endsection

@section('errors')
    @if(count($errors) > 0)
        <section class="info-box fail">
            @foreach($errors->all() as $error)
                <div class="isa_warning">
                    <i class="fa fa-warning"></i>
                    {{$error}}
                </div>
            @endforeach
        </section>
    @endif
@endsection

@section('form')
    <!--form-stars-here-->
    <div class="wthree-form">
        <h2>Fill out the form below to login</h2>
        <form action="{{route('register')}}" method="post">
            <div class="form-sub-w3">
                <input type="text" name="username" placeholder="Username " required="" />
                <div class="icon-w3">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
            </div>
            <div class="form-sub-w3">
                <input type="text" name="email" placeholder="email@email.com " required="" />
                <div class="icon-w3">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                </div>
            </div>
            <div class="form-sub-w3">
                <input type="text" name="age" placeholder="1971 " required="" />
                <div class="icon-w3">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                </div>
            </div>
            <div class="form-sub-w3">
                <input type="password" name="password" placeholder="Password" required="" />
                <div class="icon-w3">
                    <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                </div>
            </div>
            <div class="form-sub-w3">
                <input type="password" name="repeat" placeholder="Password" required="" />
                <div class="icon-w3">
                    <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                </div>
            </div>

            <div class="submit-agileits">
                <input type="submit" value="Register">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

            </div>

        </form>

    </div>
    <!--//form-ends-here-->
@endsection
@section('content')
    <div class="container text-center">
        <br> <br>
        <h2 class="thin">OVO JE REGISTER STRANICA</h2>
        <p class="text-muted">
            The difference between involvement and commitment is like an eggs-and-ham breakfast:<br>
            the chicken was involved; the pig was committed.
        </p>
    </div>
@endsection