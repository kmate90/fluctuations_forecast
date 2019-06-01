<?php


namespace App\Utils;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;



class WebCrawler
{
    public $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    private function crawl()
    {
        $url=$this->url;
        $client = new \GuzzleHttp\Client();
        try {
            $response = $client->get($url);
            return $response->getBody()->getContents();
        } catch (RequestException $e) {
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
        }
    }

    /**
     * @return string
     */
    public function executeCrawl(){
        return $this->crawl();
    }
}

