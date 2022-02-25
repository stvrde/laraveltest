@extends('layouts.master')
@section('navbar')
    <li><a href="{{ route('home') }}">Home</a></li>
    <li><a href="{{ route('events') }}">Events</a></li>
    <li><a href="{{ route('matches') }}">Matches</a></li>
    <li class="active"><a href="{{ route('records') }}">Records</a></li>
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
                        <h4>Menu</h4>
                        <p>
                        <div><a href="{{ route('records', ['category' => "goals"]) }}">Goals</a></div>
                        <div><a href="{{ route('records', ['category' => "assists"]) }}">Assists</a></div>
                        <div><a href="{{ route('records', ['category' => "saves"]) }}">Saves</a></div>
                        <div><a href="{{ route('records', ['category' => "mmr"]) }}">Rating</a></div>
                        <div><a href="{{ route('records', ['category' => "appearances"]) }}">Appearances</a></div>
                        <div><a href="{{ route('records', ['category' => "wins"]) }}">Wins</a></div>
                        </p>
                    </div>
                </div>
                <div class="row widget">
                    <div class="col-xs-12">
                        <h4>Lorem ipsum dolor sit</h4>
                        <p><img src="/images/1.jpg" alt=""></p>
                    </div>
                </div>


            </aside>
            <!-- /Sidebar -->

            <!-- Article main content -->
            <article class="col-md-8 maincontent">
                <header class="page-header">
                    <h1 class="page-title">Stats</h1>
                </header>
                <h2>Overall</h2>

                @if ($data != null)
                    @foreach($data as $player=>$stat)
                        @if($player)
                            <div>{{ $player }} {{ $stat }}</div>
                        @endif
                    @endforeach
                @endif
                <h2>Averages: {{ $description }}</h2>

                @if ($data != null)
                    @foreach($averages as $player=>$average)
                        @if($player)
                            <div>{{ $player }} {{ $average }}</div>
                        @endif
                    @endforeach
                @endif
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