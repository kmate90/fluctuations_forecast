<?php


namespace App\Utils;

use Symfony\Component\DomCrawler\Crawler;
use App\Utils\WebCrawler;

class Scraper
{
    public $url;
    public $temperatures = [];

    public function __construct($url)
    {
        $this->url = new WebCrawler($url);
    }

    private function extractFromHtml($filter, $valueType)
    {
        $html = $this->url->executeCrawl();
        $crawler = new Crawler($html);
        $temperatureValues = $crawler->filter($filter);

        foreach ($temperatureValues as $key => $value) {
            $this->temperatures["day_" . $key][$valueType] = preg_replace("/(\n|\t)/", '', $value->firstChild->textContent);
        }


        return $this->temperatures;
    }

    public function executeExtractFromHtml($filter, $valueType)
    {
        return $this->extractFromHtml($filter, $valueType);
    }

}
