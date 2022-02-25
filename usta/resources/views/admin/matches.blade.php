@extends('layouts.master')
@section('navbar')
    <li><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="active"><a href="{{ route('admin.matches') }}">Matches</a></li>
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

                <br class="col-md-8 maincontent">
                    <header class="page-header">
                        @if ($match != null)
                            <h1 class="page-title"><a href="{{ route('admin.matches') }}"><i class="fa fa-chevron-left" aria-hidden="true"></i>
                                </a>Sve utakmice </h1><a href="{{ route('admin.matches') }}"></a>
                        @else
                            <h1 class="page-title">Sve utakmice</h1>
                        @endif
                    </header>
                @if ($match != null)
                    <form action="{{route('admin.matches')}}" method="post">

                            <h3>Location: {{ $match->location }}</h3>
                        <div class="mydiv">
                            <label> Score white:
                                <input type="text" name="score_home" value="{{ $match->score_home }}">
                            </label>
                            <label> Score blue:
                                <input type="text" name="score_away" value="{{ $match->score_away }}">
                            </label>
                        </div>

                        <div>
                            <label>Status:
                                <select name="status">
                                    <option value="open">Open</option>
                                    <option value="finished">Finished</option>
                                </select>
                            </label>
                        </div>
                        <div class="mydiv">

                            <br/>
                            <h3>Goals</h3>
                            @foreach($match->user as $player)
                                <label> {{ $player->name }}:
                                    <input type="text" name="goals[{{$player->id}}]" value={{ $player->statsInMatch($match->id)->pivot->goals }}>
                                </label>
                            @endforeach
                            <br>
                            <h3>Assists</h3>
                            @foreach($match->user as $player)
                                <label> {{ $player->name }}:
                                    <input type="text" name="assists[{{$player->id}}]" value={{ $player->statsInMatch($match->id)->pivot->assists }}>
                                </label>
                            @endforeach
                            <br>
                            <h3>Saves</h3>
                            @foreach($match->user as $player)
                                <label> {{ $player->name }}:
                                    <input type="text" name="saves[{{$player->id}}]" value={{ $player->statsInMatch($match->id)->pivot->saves }}>
                                </label>
                            @endforeach
                        </div>

                        <div><input type="submit" value="Save"></div>
                        <input type="hidden" name="match_id" value="{{ $match->id }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                @else
                    <div> Status // Location // Score</div>
                @foreach($matches as $match)
                        <div>
                           <a href="{{route('admin.matches', ['match' => $match->id])}}">
                               [{{ $match->status }}]
                               {{ $match->location }}&nbsp
                               {{ $match->score_home }} :
                               {{ $match->score_away }}
                           </a>
                       </div>
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