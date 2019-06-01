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
            'fluctuation' . "\n" .
            'max_fluctuation' . "\n" .
            'min_fluctuation' . "\n" .
            'avr_fluctuation' . "\n" .
            'median' . "\n" .
            'modus'  . "\n"  .
            'deviation'  . "\n"  . "\n"
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
            $output->write(var_dump($foreCast->getMinTemperatures()));
        } elseif ($input->getArgument("forecast_type") === "fluctuation") {
            $foreCast = new \App\Forecast\Fluctuation\Fluctuation();
            $output -> write(var_dump($foreCast->calculateValues()));
        } elseif ($input->getArgument("forecast_type") === "max_fluctuation") {
            $foreCast = new \App\Forecast\Fluctuation\MaxFluctuation();
            $output -> write(var_dump($foreCast->getMaxFluctuation()));
        }  elseif ($input->getArgument("forecast_type") === "min_fluctuation") {
            $foreCast = new \App\Forecast\Fluctuation\MinFluctuation();
            $output -> write(var_dump($foreCast->getMinFluctuation()));
        }  elseif ($input->getArgument("forecast_type") === "avr_fluctuation") {
            $foreCast = new \App\Forecast\Fluctuation\AvrFluctuation();
            $output -> write(var_dump($foreCast->getAverageFluctuation()));
        }  elseif ($input->getArgument("forecast_type") === "median") {
            $foreCast = new \App\Forecast\Fluctuation\Median();
            $output -> write(var_dump($foreCast->getMedian()));
        }  elseif ($input->getArgument("forecast_type") === "modus") {
            $foreCast = new \App\Forecast\Fluctuation\Modus();
            $output -> write(var_dump($foreCast->getModus()));
        }  elseif ($input->getArgument("forecast_type") === "deviation") {
            $foreCast = new \App\Forecast\Fluctuation\Deviation();
            $output -> write(var_dump($foreCast->getStand_Deviation()));
        } else {
            $output -> write("type -h for help");
        }
    }
}