<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Entity\Bicycle;
use App\Entity;

class BuildBike extends Command
{
    protected static $defaultName = 'app:build-bike';
    protected static $bikes = array();
    protected static $lengthUnits = 'inches';

    protected function execute(InputInterface $input, OutputInterface $output): int 
    {
        $bicycle = new Bicycle(1,2,3,4);
        $bicycle->setFrontWheel(new Entity\Wheel(10));
        $bicycle->test();
        print_r($bicycle);
        return 0;
    }
}