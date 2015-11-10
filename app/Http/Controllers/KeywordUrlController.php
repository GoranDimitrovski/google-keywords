<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use Response;
use View;
use App\Link;
use App\Keyword;
use App\Interfaces\ScraperInterface;
use Validator;

class KeywordUrlController extends Controller {

    /**
     * 
     * @return type
     */
    public function index() {
        $keywords = Keyword::all();
        return view('keyword-urls', ['keywords' => $keywords]);
    }

    /**
     * 
     * @return type
     */
    public function saveUrls(ScraperInterface $scrapper) {
        $keyword = Request::input('keyword');

        if ($keyword == '') {
            return Response::json(array('success' => false, 'error' => 'Please enter a keyword'), 400);
        }

        $links = $scrapper->getUrls($keyword);

        if (count($links) === 0) {
            return Response::json(array('success' => false, 'error' => 'There were no urls found...'), 400);
        }

        $k = Keyword::where('value', '=', $keyword)->first();

        if ($k === null) {

            $keywordValidator = Validator::make(['value' => $keyword], ['value' => 'required|unique:keywords']);

            if (!$keywordValidator->fails()) {
                $k = Keyword::create(['value' => $keyword]);
            } else {
                return Response::json(array('success' => false, 'error' => 'Error has occurred...'), 400);
            }
        }

        foreach ($links as $link) {

            $LinkValidator = Validator::make(
                            ['keyword_id' => $k->id, 'rank' => $link['rank'], 'value' => $link['value']], 
                            ['keyword_id' => 'required|numeric', 'rank' => 'required|numeric', 'value' => 'required|url']
            );

            if (!$LinkValidator->fails()) {
                Link::create(array(
                    'keyword_id' => $k->id,
                    'rank' => $link['rank'],
                    'value' => $link['value'],
                ));
            }
        }

        return Response::json(array('success' => true));
    }

    /**
     * 
     * @return type
     */
    public function getUrls() {

        $keyword = Request::input('keyword');

        if ($keyword == '') {
            return Response::json(array('success' => false, 'error' => 'Please enter a keyword'), 400);
        }

        $keyword = Keyword::where('value', '=', $keyword)->first();

        if ($keyword == '') {
            return Response::json(array('success' => false, 'error' => 'No urls found for the keyword'), 400);
        }

        $urls = Link::where('keyword_id', '=', $keyword->id)->paginate(10);

        if (Request::ajax()) {
            return Response::json(View::make('partials.url-list', array('urls' => $urls))->render());
        }
    }

}
