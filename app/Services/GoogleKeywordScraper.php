<?php

namespace App\Services;

use App\Interfaces\ScraperInterface;

class GoogleKeywordScraper implements ScraperInterface {

    private $url;

    public function __construct() {
        $this->url = 'http://google.com/search?num=100&q=';
    }

    public function getUrls($keyword) {

        $html = new \Htmldom($this->url . urlencode($keyword));

        $links = array();

        $rank = 1;
        foreach ($html->find('h3.r a') as $element) {

            $url = html_entity_decode(str_replace("/url?q=", "", $element->href));
            $urlArray = explode("&sa", $url);
            $links[] = array('rank' => $rank, 'value' => $urlArray[0]);
            $rank++;
        }

        return $links;
    }

}
