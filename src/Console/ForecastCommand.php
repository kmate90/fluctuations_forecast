<?php


namespace App\Console;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ForecastCommand extends SymfonyCommand
{
    public function __construct()
    {
        parent::__construct();
    }
    public function configure()
    {
        $help =
            "\n" . "\n" .
            '======***** Forecast  commands *****======' . "\n" .
            '==========================================' . "\n" . "\n" .
            'max_temperatures' . "\n" .
            'min_temperatures' . "\n" .
            'max_fluctuation' . "\n" .
            'min_fluctuation' . "\n" .
            'avr_fluctuation' . "\n" .
            'median' . "\n" .
            'modus'  . "\n"  . "\n"
        ;
        $this -> setName('forecast')
            -> setDescription('Get forecasts of the next 7 days' . $help)
            -> addArgument('forecast_type', InputArgument::REQUIRED, 'Forecast type.');
    }
    public function execute(InputInterface $input, OutputInterface $output)
    {
        if ($input->getArgument("forecast_type") === "max_temperatures") {
            $foreCast = new \App\Forecast\Fluctuation\Fluctuation();
        $output -> write(var_dump($foreCast->getMaxTemperatures()));
        } elseif ($input->getArgument("forecast_type") === "min_temperatures") {
            $foreCast = new \App\Forecast\Fluctuation\Fluctuation();
            $output -> write(var_dump($foreCast->calculateValues()));
        } elseif ($input->getArgument("forecast_type") === "highest_fluctuation") {
            $foreCast = new \App\Forecast\Fluctuation\MaxFluctuation();
            $output -> write(var_dump($foreCast->getMaxFluctuation()));
        }  elseif ($input->getArgument("forecast_type") === "lowest_fluctuation") {
            $foreCast = new \App\Forecast\Fluctuation\MinFluctuation();
            $output -> write(var_dump($foreCast->getMinFluctuation()));
        }  elseif ($input->getArgument("forecast_type") === "average_fluctuation") {
            $foreCast = new \App\Forecast\Fluctuation\AvrFluctuation();
            $output -> write(var_dump($foreCast->getAverageFluctuation()));
//        }  elseif ($input->getArgument("forecast_type") === "median") {
//            $output -> write(var_dump($foreCast->getMedian()));
//        }  elseif ($input->getArgument("forecast_type") === "modus") {
//            $output -> write(var_dump($foreCast->getModus()));
        } else {
            $output -> write("type -h for help");
        }
    }
}