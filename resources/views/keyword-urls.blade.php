@extends('layouts.master')

@section('head')
@parent
<script type="text/javascript" src="{{ URL::asset('js/urls.js') }}"></script>
@stop

@section('content')

<div class="col-md-8 col-md-offset-2">
    <div class="page-header text-center">
        <h2>List of urls by keyword</h2>
    </div>
    <div class="row">

        <form class="form-inline" role="form" id="keyword_search">
            <div class="controls">     
                <label for="keywords">Keyword </label>

                <select name="keywords" id="keywords" class="form-control">
                    <option>Select a keyword</option>
                    @foreach ($keywords as $keyword)
                    <option>{{ $keyword->value }}</option>
                    @endforeach
                </select>

            </div>
        </form>
    </div>
    <div class="row">
        <h4 id="errors" class="hidden">An error has occurred</h4>
    </div>
    <br/>
    <div class="row">
        <div id="urls_list_container">

        </div>
    </div>
</div>

@stop

