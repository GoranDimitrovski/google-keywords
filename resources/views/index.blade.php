
@extends('layouts.master')

@section('content')

<div class="container">
    <div class="col-md-8 col-md-offset-2">

        <div class="page-header text-center">
            <h2>Get the links from Google for the specific keyword</h2>
        </div>
        <form class="form-horizontal" role="form" id="keyword_search">
            <div class="form-group">
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="keyword" name="keyword">
                </div>
                <button type="submit" class="btn btn-primary col-sm-2">Search</button>
            </div>
        </form>
        <h4 id="errors" class="hidden">An error has occurred</h4>
        <h4 class="text-center success hidden">The crawling has been successful</h4>
        <div class="loading-panel hidden text-center">
            <h4>Please wait while google is being crawled</h4>
            <img src="images/ajax-loader.gif"/>
        </div>

    </div>
</div>

@stop

