@extends('layouts.master')
@section('navbar')
    <li><a href="{{ route('home') }}">Home</a></li>
    <li class="active"><a href="{{ route('events') }}">Events</a></li>
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
                        <h4>EVENTS</h4>
                        @foreach($events as $openEvent)
                            <div><a href="{{ route('events', ['event_id' => $openEvent->id]) }}">Event: {{ $openEvent->location }}</a></div>
                            <div>Created: {{ $openEvent->created_at }}</div>
                            <div>Players: {{ $openEvent->user->count()."/".$openEvent->capacity }}</div>
                            <div>Start: {{ $openEvent->start }}</div>
                            <br>

                        @endforeach
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
                    @if ($event != null)
                        <h1 class="page-title"><a href="{{ route('events') }}"><i class="fa fa-chevron-left" aria-hidden="true"></i>
                            </a>Event ({{ $event->location }})</h1><a href="{{ route('events') }}"></a>
                    @else
                        <h1 class="page-title">Next Event - {{ $nextMatch->location }}</h1>
                        <div>{{ $nextMatch->start }}</div>
                    @endif
                </header>
                <form action="{{ route('events') }}" method="post">
                    Home:
                    @php($i=0)
                    @foreach ($home as $player)
                        {{ $player['name'] }}
                        @php($i+=$player['mmr'])
                    @endforeach
                    @if($i>1){{ "(avg: ".$i / (count($home)-1).")" }}@endif

                    <br>
                    Away:
                    @php($i=0)
                    @foreach ($away as $player)
                        {{ $player['name'] }}
                        @php($i+=$player['mmr'])
                    @endforeach
                    @if($i>1){{ "(avg: ".$i / (count($away)-1).")" }}@endif
                    <br><br>
                    @if ($event != null)
                        <div>
                            @php($i=1)
                            @foreach($event->user as $user)
                                <div>{{ $i." - ".$user->name." (".$user->mmr.")" }}</div>
                                @php($i++)
                            @endforeach
                        </div>
                        <div><input type="submit" value="Apply"></div>
                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                    @else
                        @php($i=1)
                        @foreach($nextMatch->user as $player)
                            <div>{{ $i." - ".$player->name." (".$player->mmr.")" }}</div>
                            @php($i++)
                        @endforeach
                        <input type="submit" value="Apply">
                        <input type="hidden" name="event_id" value="{{ $nextMatch->id }}">
                    @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
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