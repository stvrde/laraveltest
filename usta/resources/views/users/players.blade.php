@extends('layouts.master')
@section('navbar')
    <li><a href="{{ route('home') }}">Home</a></li>
    <li><a href="{{ route('events') }}">Events</a></li>
    <li><a href="{{ route('matches') }}">Matches</a></li>
    <li><a href="{{ route('records') }}">Records</a></li>
    <li class="active"><a href="{{ route('players') }}">Players</a></li>
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
                        <h4>PLAYERS</h4>
                        @foreach($users as $user)
                            <div><a href="{{ route('players', ['player_id' => $user->id]) }}">{{ $user->name }}</a></div>
                        @endforeach
                    </div>
                </div>
                <div class="row widget">
                    <div class="col-xs-12">
                        <h4>Lorem ipsum dolor sit</h4>
                        <p><img src="/images/slika1.jpg" alt=""></p>
                    </div>
                </div>

            </aside>
            <!-- /Sidebar -->

            <!-- Article main content -->
            <article class="col-md-8 maincontent">
                <header class="page-header">
                    @if ($player != null)
                        <h1 class="page-title"><a href="{{ route('players') }}"><i class="fa fa-chevron-left" aria-hidden="true"></i>
                        </a>Stats ({{ $player->name }})</h1><a href="{{ route('players') }}"></a>
                    @else
                        <h1 class="page-title">Stats</h1>
                    @endif
                </header>
                <h2>Totals</h2>
                <div>Total goals: {{ $player->goals() }}</div>
                <div>Total assists: {{ $player->assists() }}</div>
                <div>Total saves: {{ $player->saves() }}</div>
                <div>Matches played: {{ $player->match->count() }}</div>
                <div>Rating: {{ $player->mmr }}</div>
                <br/>
                <h2>Averages</h2>
                @if($player->match->count() > 0)
                    <div>Average goals: {{ $player->goals() / $player->match->count() }}</div>
                    <div>Average assists: {{ $player->assists() / $player->match->count() }}</div>
                    <div>Average saves: {{ $player->saves() / $player->match->count() }}</div>
                @endif
                <br/>
                <h2>Records</h2>
                <div>Most goals: {{ $player->maxGoals() }}</div>
                <div>Most assists: {{ $player->maxAssists() }}</div>
                <div>Most saves: {{ $player->maxSaves() }}</div>
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