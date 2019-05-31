<?php


namespace App\Forecast\Fluctuation;
use App\Forecast\ForecastInterface;
use App\Utils\Scraper;

class Fluctuation implements ForecastInterface
{
    /**
     * @return array|mixed
     */
    public function getMinTemperatures()
    {
        $url = "https://www.idokep.hu/elorejelzes/P%C3%A9cs";
        $temperatures = new Scraper($url);
        return $temperatures->executeExtractFromHtml(".min-homerseklet-default", "min_temperature");
    }

    /**
     * @return array|mixed
     */
    public function getMaxTemperatures()
    {
        $url = "https://www.idokep.hu/elorejelzes/P%C3%A9cs";
        $temperatures = new Scraper($url);
        return $temperatures->executeExtractFromHtml(".max-homerseklet-default", "max_temperature");
    }

    /**
     * @return array|mixed
     */
    public function calculateValues()
    {
        $maxTemp = $this->getMaxTemperatures();
        $minTemp = $this->getMinTemperatures();

        $days = [];

for ($i = 1; $i <= 7; $i++) {
    $days[$i] = [$maxTemp["day_".$i], $minTemp["day_".$i]];
}

        $fluctuations = [];
        foreach ($days as $key => $day) {

            $fluctuations[$key]=$day[0]["max_temperature"]-$day[1]["min_temperature"];
        }
        return $fluctuations;

    }
}

