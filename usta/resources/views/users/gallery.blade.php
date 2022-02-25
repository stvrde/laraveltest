@extends('layouts.master')
@section('navbar')
    <li><a href="{{ route('home') }}">Home</a></li>
    <li><a href="{{ route('events') }}">Events</a></li>
    <li><a href="{{ route('matches') }}">Matches</a></li>
    <li><a href="{{ route('records') }}">Records</a></li>
    <li><a href="{{ route('players') }}">Players</a></li>
    <li class="active"><a href="{{ route('gallery') }}">Gallery</a></li>
    @if(Auth::user()->isAdmin == 1)
        <li><a href="{{ route('admin.home') }}">Admin mode</a></li>
    @endif
    <li><a class="btn" href="{{ route('logout') }}">LOGOUT</a></li>
@endsection
@section('styles')
    <link rel="stylesheet" href="/css/gallery.css">
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



        <!-- Article main content -->
        <article class="col-md-8 maincontent">
            <header class="page-header">
                <h1 class="page-title">Gallery</h1>
            </header>
            <div class="bg-content">
                <div id="content"><div class="ic"></div>
                    <div class="container">
                        <div class="row">
                            <div class="clear"></div>
                                <div>
                                    @foreach ($images as $img)
                                    <!-- resize to 270x192 -->
                                    <div>
                                        <a href="{{ $img->path  }}" class="magnifier" ><img alt="" src="{{ $img->pathToThumb }}"  style="float: left; width: 30%; margin-right: 1%; margin-bottom: 0.5em;"></a>
                                    </div>
                                    @endforeach
                                </div>
                        </div>
                    </div>
                </div>
            </div>
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