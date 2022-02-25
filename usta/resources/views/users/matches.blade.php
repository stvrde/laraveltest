@extends('layouts.master')
@section('navbar')
    <li><a href="{{ route('home') }}">Home</a></li>
    <li><a href="{{ route('events') }}">Events</a></li>
    <li class="active"><a href="{{ route('matches') }}">Matches</a></li>
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
                        <h4>Matches</h4>
                        <p>
                            @foreach ($matches as $game)
                            <div>{{$game->start}}</div>
                            <div><a href="{{ route('matches', ['match_id' => $game->id]) }}">{{ $game->location }} {{ "[".$game->score_home." - ".$game->score_away."]" }}</a></div>
                            <br/>
                            @endforeach
                    </div>
                </div>
                <div class="row widget">
                    <div class="col-xs-12">
                        <h4>Lorem ipsum dolor sit</h4>
                        <p><img src="/images/slika2.jpg" alt=""></p>
                    </div>
                </div>
            </aside>
            <!-- /Sidebar -->

            <!-- Article main content -->
            <article class="col-md-8 maincontent">
                <header class="page-header">
                    <h1 class="page-title">{{ $title }}</h1>
                </header>
                @if($match != null)
                    <h2><div><b>{{ $match->location }}</b></div>
                    <div>White {{ $match->score_home }} - {{ $match->score_away }} Blue</div></h2>
                    <br>
                    <table cellpadding="0" valign="top" >
                        <tr>
                            <td>
                                <table cellpadding="5">
                                    <tr>
                                        <td colspan="3" align="middle"><h3>White</h3></td>
                                        <td align="right" bgcolor="#f5f5f5"><h3>{{ $match->score_home }} <i class="fa fa-user-o"  aria-hidden="true"></i></h3></td>
                                    </tr>
                                    <tr align="middle">
                                        <td><h4>NAME</h4></td>
                                        <td><h4>GOALS</h4></td>
                                        <td><h4>ASSISTS</h4></td>
                                        <td><h4>SAVES</h4></td>
                                    </tr>
                                    @foreach($home as $player)
                                        <tr>
                                            <td><i class="fa fa-user-o" aria-hidden="true"></i>
                                                {{ $player->name }}</td>
                                            <td>
                                                @for ($i = 0; $i < $player->statsInMatch($match->id)->pivot->goals; $i++)
                                                    <i class="fa fa-futbol-o" aria-hidden="true"></i>
                                                @endfor
                                            </td>
                                            <td>
                                                @for ($i = 0; $i < $player->statsInMatch($match->id)->pivot->assists; $i++)
                                                    <i class="fa fa-share" aria-hidden="true"></i>
                                                @endfor
                                            </td>
                                            <td>
                                                @for ($i = 0; $i < $player->statsInMatch($match->id)->pivot->saves; $i++)
                                                    <i class="fa fa-hand-paper-o" aria-hidden="true"></i>
                                                @endfor
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if (sizeof($away) - sizeof($home) > 0)
                                        @for($i=0;$i<sizeof($away) - sizeof($home);$i++)
                                            <tr>
                                                <td>&nbsp</td>
                                            </tr>
                                        @endfor
                                    @endif
                                </table>
                            </td>
                            <td>
                                <table cellpadding="5" valign="top">
                                    <tr>
                                        <td align="left" bgcolor="#f5f5f5"><h3><i class="fa fa-user" aria-hidden="true"></i> {{ $match->score_away }}</h3></td>
                                        <td colspan="3" align="middle"><h3>Blue</h3></td>
                                    </tr>
                                    <tr bgcolor="" align="middle">
                                        <td><h4>NAME</h4></td>
                                        <td><h4>GOALS</h4></td>
                                        <td><h4>ASSISTS</h4></td>
                                        <td><h4>SAVES</h4></td>
                                    </tr>
                                    @foreach($away as $player)
                                        <tr>
                                            <td><i class="fa fa-user" aria-hidden="true"></i>
                                                {{ $player->name }}</td>
                                            <td>
                                                @for ($i = 0; $i < $player->statsInMatch($match->id)->pivot->goals; $i++)
                                                    <i class="fa fa-futbol-o" aria-hidden="true"></i>
                                                @endfor
                                            </td>
                                            <td>
                                                @for ($i = 0; $i < $player->statsInMatch($match->id)->pivot->assists; $i++)
                                                    <i class="fa fa-share" aria-hidden="true"></i>
                                                @endfor
                                            </td>
                                            <td>
                                                @for ($i = 0; $i < $player->statsInMatch($match->id)->pivot->saves; $i++)
                                                    <i class="fa fa-hand-paper-o" aria-hidden="true"></i>
                                                @endfor
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if (sizeof($home) - sizeof($away) > 0)
                                        @for($i=0;$i<sizeof($home) - sizeof($away);$i++)
                                            <tr>
                                                <td>&nbsp</td>
                                            </tr>
                                        @endfor
                                    @endif
                                </table>
                            </td>
                        </tr>
                    </table>

                @endif
                <header class="page-header">
                    <h1 class="page-title">Comments</h1>
                </header>
                @foreach($match->comments as $comment)
                   <div>
                       <i class="fa fa-calendar" aria-hidden="true"></i> {{ $comment->created_at }} | <i class="fa fa-user" aria-hidden="true"></i>
                        {{ $comment->user->name }}
                   </div> {{ $comment->content }}
                    <br><br>
                @endforeach
                <form action="{{ route('matches') }}" method="post">

                    <div><textarea name="comment" cols="50" rows="5"></textarea></div>
                    <input type="submit" value="Add comment">
                    <input type="hidden" name="match_id" value="{{ $match->id }}">
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