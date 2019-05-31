<?php


namespace App\Forecast\Fluctuation;
use App\Forecast\ForecastInterface;
use App\Utils\Scraper;

class Fluctuation implements ForecastInterface
{
    public $temp= [];

    /**
     * @return array|mixed
     */
    public function getMinTemperatures()
    {
        $url = "https://www.idokep.hu/elorejelzes/P%C3%A9cs";
        $temperatures = new Scraper($url);
        $this->temp=$temperatures->executeExtractFromHtml(".min-homerseklet-default", "min_temperature");
        return $this->temp;


    }

    /**
     * @return array|mixed
     */
    public function getMaxTemperatures()
    {
        $url = "https://www.idokep.hu/elorejelzes/P%C3%A9cs";
        $temperatures = new Scraper($url);
        $this->temp=$temperatures->executeExtractFromHtml(".max-homerseklet-default", "max_temperature");
        return $this->temp;
    }

    /**
     * @return array|mixed
     */
    public function calculateValues()
    {
        $this->getMaxTemperatures();
        $this->getMinTemperatures();
//        $min_temperature=0;
//        $max_temperature=0;
        $fluctuations = [];
        foreach ($this->temp as $day) {
            $max_temperature = array_values($day)[0];
            $min_temperature = array_values($day)[1];
            $fluctuations[] = $max_temperature - $min_temperature;
        }
        return $fluctuations;

    }
}

