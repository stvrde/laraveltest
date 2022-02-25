@extends('layouts.master')
@section('navbar')
    <li><a href="{{ route('admin.home') }}">Home</a></li>
    <li><a href="{{ route('admin.matches') }}">Matches</a></li>
    <li><a href="{{ route('admin.players') }}">Players</a></li>
    <li class="active"><a href="{{ route('admin.gallery') }}">Gallery</a></li>
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
                    <h1 class="page-title">Gallery</h1>
                </header>
                <form action="{{route('admin.gallery')}}" method="post">
                    @foreach($images as $img)
                        <img width="150"  src="{{$img->path}}" alt="">
                        <input type="checkbox" name="delete[]" value="{{ $img->id }}">
                    @endforeach
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    <input type="hidden" name="action" value="delete">
                    <br>
                    <input type="submit" value="Delete">
                </form>
                <br><br>
                <form action="{{route('admin.gallery')}}" enctype="multipart/form-data" method="post">
                        <div class="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="file" name="image" />
                                </div>
                            </div>
                        </div>
                        <div class="post">
                            <input type="submit" value="Submit" />
                            <input type="hidden" name="action" value="upload">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        </div>
                </form>
           </article>
            <!-- /Article -->

        </div>
    </div>
    <!-- /container -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="/js/headroom.min.js"></script>
    <script src="/js/jQuery.headroom.min.js"></script>
    <script src="/js/template.js"></script>
    </body>
@endsection