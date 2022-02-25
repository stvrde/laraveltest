@extends('layouts.master')
@section('navbar')
    <li class="active"><a href="{{ route('admin.home') }}">Home</a></li>
    <li><a href="{{ route('admin.matches') }}">Matches</a></li>
    <li><a href="{{ route('admin.players') }}">Players</a></li>
    <li><a href="{{ route('admin.gallery') }}">Gallery</a></li>
    <li><a href="{{ route('home') }}">User mode</a></li>
    <li><a class="btn" href="{{ route('logout') }}">LOGOUT</a></li>
@endsection
@section('content')

    <body>
    <header id="head" class="secondary"></header>

    <!-- container -->
    <div class="container">

        <ol class="breadcrumb">
            <li><a href="{{ route('admin.home') }}">Home</a></li>
            <li class="active">{{ strtoupper(Auth::user()->name )}}</li>
        </ol>

        <div class="row">



            <!-- Article main content -->
            <article class="col-md-8 maincontent">
                <header class="page-header">
                    <h1 class="page-title">Add new event</h1>
                </header>
                <form action="{{ route ('admin.home') }}" method="post">
                   <div>
                   <label> Location:
                        <input type="text" name="location" value="">
                    </label>
                   </div>
                    <div>
                    <label> Capacity:
                        <input type="text" name="capacity" value="">
                    </label>
                    </div>
                    <div>
                    <label> Start:
                        <input type="datetime-local" name="start" max="2200-12-31">
                        </label>
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" value="Save">
                </form>
            </article>
            <!-- /Article -->

        </div>
    </div>	<!-- /container -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="/js/headroom.min.js"></script>
    <script src="/js/jQuery.headroom.min.js"></script>
    <script src="/js/template.js"></script>
    </body>
@endsection