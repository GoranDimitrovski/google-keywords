<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use JonnyW\PhantomJs\Client;
use Request;
use Response;
use App\Link;
use App\Keyword;


class SearchController extends Controller {

    public function index() {
        return view('index');
    }

}
