<!DOCTYPE html>
<html lang="en">
    <head>
        @section('head')
        @include('layouts.header')   
        @show
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav">
                        <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Search</a></li>
                        <li class="{{ Request::is('urls') ? 'active' : '' }}"><a href="/urls">Crawled Keywords</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
