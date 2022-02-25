@extends('layouts.master')
@section('navbar')
    <li class="active"><a href="{{ route('home') }}">Home</a></li>
    <li><a href="{{ route('events') }}">Events</a></li>
    <li><a href="{{ route('matches') }}">Matches</a></li>
    <li><a href="{{ route('records') }}">Records</a></li>
    <li><a href="{{ route('players') }}">Players</a></li>
    <li><a href="{{ route('gallery') }}">Gallery</a></li>
    @if(Auth::user()->isAdmin == 1)
        <li><a href="{{ route('admin.home') }}">Admin mode</a></li>
    @endif
    <li><a class="btn" href="{{ route('logout') }}">LOGOUT</a></li>
@endsection

@section('content')
    <body>
    <header id="head" class="secondary"></header>

    <!-- container -->
    <div class="container">

        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li class="active">{{ strtoupper(Auth::user()->name )}}</li>
        </ol>

        <div class="row">

            <!-- Sidebar -->
            <aside class="col-md-4 sidebar sidebar-left">

                <div class="row widget">
                    <div class="col-xs-12">
                        <h4>{{ $user->name}}</h4>
                        <p>
                            <div>Email: {{ $user->email }}</div>
                            <div>Age: {{ date("Y") - $user->age }}</div>
                            <div>Rating: {{ $user->mmr }}</div>
                            <div>Matches played: {{ $user->match->count() }}</div>
                        </p>
                    </div>
                </div>
                <div class="row widget">
                    <div class="col-xs-12">
                        <h4>Last match stats</h4>
                        @if($user->lastMatch->last())
                        <div>{{ $user->lastMatch->last()->location }}</div>
                        <div>Team: {{ $user->lastMatch->last()->pivot->team == "away" ? "Blue" : "White"}}</div>
                        <div>{{"White ".$user->lastMatch->last()->score_home.":".$user->lastMatch->last()->score_away." Blue" }}</div>
                        <br>

                        <div>Goals: {{ $user->lastMatch->last()->pivot->goals }}</div>
                        <div>Assists: {{ $user->lastMatch->last()->pivot->assists }}</div>
                        <div>Saves: {{ $user->lastMatch->last()->pivot->saves }}</div>
                        @endif
                    </div>
                </div>

            </aside>
            <!-- /Sidebar -->

            <!-- Article main content -->
            <article class="col-md-8 maincontent">
                <header class="page-header">
                    <h1 class="page-title">Personal stats</h1>
                </header>
                <h2>Totals</h2>
                <div>Total goals: {{ $goals }}</div>
                <div>Total assists: {{ $assists }}</div>
                <div>Total saves: {{ $saves }}</div>
                <br/>
                <h2>Averages</h2>
                @if($user->lastMatch->last())
                <div>Average goals: {{ $goals / $user->match->count() }}</div>
                <div>Average assists: {{ $assists / $user->match->count() }}</div>
                <div>Average saves: {{ $saves / $user->match->count() }}</div>
                <br/>
                @else
                    <div>No matches on record</div>
                @endif
                <h2>Records</h2>
                <div>Most goals: {{ $most_goals }}</div>
                <div>Most assists: {{ $most_assists }}</div>
                <div>Most saves: {{ $most_saves }}</div>



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