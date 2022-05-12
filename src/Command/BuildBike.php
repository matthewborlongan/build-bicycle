<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Question\Question;

// custom defined classes
use App\Entity\Bicycle;
use App\Entity\Frame;
use Symfony\Component\Console\Helper\Helper;


class BuildBike extends Command
{
    // configuration
    protected static $defaultName = 'app:build-bike';
    protected static $defaultDescription = 'This Symfony Command is a small program where you can specify your dream bike. Just follow the prompts.';

    // array to hold questions that can be asked user
    protected static $questionBag = array(
        'color' => 'What color do you want this part to be? ',
        'weight' => 'How heavy is this part in lbs? ',
        'material' => 'What material is this part made of? ',
    );

    // array of bikes created by user in current session
    protected static $bikes = array();


    /**
     * configure command with help text
     *
     * @return void
     */
    protected function configure(): void
    {
        $this->setHelp('Answer the questions prompted to you on the console to build your bike.');
    }


    /**
     * main running logic; walks user through bike building process
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return integer
     */
    protected function execute(InputInterface $input, OutputInterface $output): int 
    {
        $helper = $this->getHelper('question');
        $this->buildBicycle($input, $output, $helper);

        return static::SUCCESS;
    }


    protected function buildBicycle(InputInterface $input, OutputInterface $output, QuestionHelper $helper): Bicycle
    {
        $components = array();
        
        try {

        // choose your frame
        $components['frame'] = $this->chooseFrame($input, $output, $helper);
        print_r($components);

        // chose your handle bar

        // choose your tires

        // choose your wheels

        // choose your pedals

        // choose your seat

        // choose your breaks

            
        } catch (\Exception $e) {
            $output->writeln('There was a problem with the value you entered. Please try again.');
            print_r($components);
            print_r($components['frame']);
        }
    }


    /**
     * user can specify frame
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return Frame
     */
    protected function chooseFrame(InputInterface $input, OutputInterface $output, QuestionHelper $helper): Frame
    {
        $bikePartSpecs = $this->specifyPart($input, $output, $helper);
        $frameMaterial = $this->specifyMaterial($input, $output, $helper);

        return new Frame(
            $frameMaterial,
            $bikePartSpecs['color'],
            $bikePartSpecs['weight']
        );
    }


    /**
     * user can specify the bike part (used in most other bike part functions)
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     */
    protected function specifyPart(InputInterface $input, OutputInterface $output, QuestionHelper $helper): array
    {
        $answers = array(
            'color' => null,
            'weight' => null
        );

        $question = new Question(static::$questionBag['color']);
        $answers['color'] = $helper->ask($input, $output, $question);

        $question = new Question(static::$questionBag['weight']);
        $answers['weight'] = $helper->ask($input, $output, $question);

        return $answers;
    }


    /**
     * specifies the bike part's construction material
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @param QuestionHelper $helper
     * @return string
     */
    protected function specifyMaterial(InputInterface $input, OutputInterface $output, QuestionHelper $helper): string 
    {
        $question = new Question(static::$questionBag['material']);
        return $helper->ask($input, $output, $question);
    }
}