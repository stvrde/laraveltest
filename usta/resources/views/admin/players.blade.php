@extends('layouts.master')
@section('navbar')
    <li><a href="{{ route('admin.home') }}">Home</a></li>
    <li><a href="{{ route('admin.matches') }}">Matches</a></li>
    <li class="active"><a href="{{ route('admin.players') }}">Players</a></li>
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
                    @if ($player != null)
                        <h1 class="page-title"><a href="{{ route('admin.players') }}"><i class="fa fa-chevron-left" aria-hidden="true"></i>
                            </a>Svi igrači </h1><a href="{{ route('admin.players') }}"></a>
                    @else
                        <h1 class="page-title">Svi igrači</h1>
                    @endif
                </header>
                @if ($player != null)
                    <form action="{{route('admin.players')}}" method="post">
                        <h3>Player: {{ $player->name }}</h3>
                        <label> Name:
                            <div><input type="text" name="name" value="{{ $player->name }}"></div>
                        </label>
                        <label> Email:
                            <div><input type="text" name="email" value="{{ $player->email }}"></div>
                        </label>
                        <label> MMR:
                            <div><input type="text" name="mmr" value="{{ $player->mmr }}"></div>
                        </label>
                        <label> Age:
                            <div><input type="text" name="age" value="{{ $player->age }}"></div>
                        </label>
                        <label> Admin:
                            <div><input type="text" name="isAdmin" value="{{ $player->isAdmin }}"></div>
                        </label>
                        <div><input type="submit" value="Save"></div>
                        <input type="hidden" name="player_id" value="{{ $player->id }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                @else
                    <div> Status // Location // Score</div>
                    @foreach ($users as $user)
                        <form action="{{ route('admin.deleteUser') }}" method="post">
                            <div>
                                <a href="{{ route('admin.players' , ['player_id' => $user->id]) }}">{{ $user->name }}</a>
                                &nbsp &nbsp &nbsp
                                <button type="submit" class="fa fa-times" aria-hidden="true"></button>
                            </div>
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
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