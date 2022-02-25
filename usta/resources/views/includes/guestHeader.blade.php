<!-- Fixed navbar -->
<div class="navbar navbar-inverse navbar-fixed-top headroom" >
    <div class="container">
        <div class="navbar-header">
            <!-- Button for smallest screens -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand" href="{{ route('guestHome') }}"><img src="/images/logo.png" alt="U S T A ..."></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav pull-right">

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
<!-- /.navbar -->

<!-- Header -->

<header id="head">
    <div class="container">
        @yield('errors')
        @if(Session::has('fail'))
            <section class="info-box fail">
                {{ Session::get('fail') }}
            </section>
        @endif
        @if(Session::has('success'))
            <section class="info-box success">
                {{ Session::get('success') }}
            </section>
        @endif
        <div class="row">
            @yield('form')
        </div>
    </div>
</header>