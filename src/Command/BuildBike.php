<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Question\ChoiceQuestion;

// custom defined classes
use App\Entity\Bicycle;
use App\Entity\Frame;
use App\Entity\HandleBar;
use App\Entity\Wheel;
use App\Entity\Seat;
use App\Entity\Pedal;
use App\Entity\Brake;
use App\Entity\Material;

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
        'wheel' => 'What is the diameter of your bicycle\'s wheel in inches? ',
        'pedalLength' => 'What is the length of the pedal in inches? ',
        'pedalWidth' => 'What is the width of the pedal in inches? ',
        'seat' => 'Does your bike require a male or female seat? ',
        'brake' => 'What type of brakes would you like for your bike? '
    );

    // array of bikes created by user in current session
    protected $bikes = array();


    /**
     * configure BuildBike command with help text
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
        $question = 'What would you like to do?';
        $choices = 
            array (
                'Build a new bike', 
                'See my current bikes', 
                'Quit'
            );
        $userAction = null;

        while($userAction !== 'Quit')
        {
            $userAction = 
                $helper->ask(
                    $input, 
                    $output,
                    new ChoiceQuestion($question, $choices)
                );
        
            switch($userAction) 
            {
                case 'Build a new bike':
                    $components = array();
                    try {
                        $newBicycle = $this->buildBicycle($input, $output, $helper, $components);
                        $name = $helper->ask($input, $output, new Question('What is the name of your new bicycle? '));
                        $this->bikes[$name] = $newBicycle;
                        
                    } catch (\Exception $e) {
                        $output->writeln('Building that bike didn\'t work. Try giving it another shot.\n');
                    }
                    break;
                    
                case 'See my current bikes':
                    if(count($this->bikes) == 0) {
                        $output->writeln('You have not created any bikes yet.');

                    } else {
                        foreach($this->bikes as $bikeName => $bike) {
                            $output->writeln(PHP_EOL . $bikeName);
                            $output->writeln('-----------------------');
                            $output->writeln($bike->toString());
                        }
                    }
                    
                    break;
                
                case 'Quit':
                    return static::SUCCESS;
                
                default:
                    throw new \InvalidArgumentException('Unrecognized option of ' . $userAction . ' provided');
                    break;
            }
        }
    }


    /**
     * function to guide user through bike creation; can accept partially filled array of bike parts as an argument;
     * the consecutive "if" statements allow for the user to continue where they left off
     * should an error occur
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @param QuestionHelper $helper
     * @param array $components 
     * @return Bicycle
     */
    protected function buildBicycle(InputInterface $input, OutputInterface $output, QuestionHelper $helper, array $components): Bicycle
    {   
        // choose your frame
        if(!array_key_exists('frame', $components)) {
            $components['frame'] = $this->chooseFrame($input, $output, $helper);
        }

        // choose your handle bar
        if(!array_key_exists('handleBar', $components)) {
            $components['handleBar'] = $this->chooseHandleBar($input, $output, $helper);
        }

        // choose your wheels
        if(!array_key_exists('wheel', $components)) {
            $components['wheel'] = $this->chooseWheel($input, $output, $helper);
        }
        
        // choose your pedals
        if(!array_key_exists('pedal', $components)) {
            $components['pedal'] = $this->choosePedal($input, $output, $helper);
        }

        // choose your seat
        if(!array_key_exists('seat', $components)) {
            $components['seat'] = $this->chooseSeat($input, $output, $helper);
        }

        // choose your brakes
        if(!array_key_exists('brake', $components)) {
            $components['brake'] = $this->chooseBrake($input, $output, $helper);
        }

        // create bicycle from components
        $bicycle = 
            new Bicycle(
                $components['frame'],
                $components['handleBar'],
                $components['wheel'],
                $components['pedal'],
                $components['brake'],
                $components['seat']
            );

        $components = array(); // clear components array if bike creation successful
        
        return $bicycle;
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
        $output->writeln('=================== Customize Your Frame ====================');
        $bikePartSpecs = $this->specifyPart($input, $output, $helper);
        $frameMaterial = $this->specifyMaterial($input, $output, $helper);

        return new Frame(
            $frameMaterial,
            $bikePartSpecs['color'],
            $bikePartSpecs['weight']
        );
    }

    
    /**
     * user can specify handle bar
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @param QuestionHelper $helper
     * @return HandleBar
     */
    protected function chooseHandleBar(InputInterface $input, OutputInterface $output, QuestionHelper $helper): HandleBar
    {
        $output->writeln('=================== Customize Your Handle Bar ====================');
        $bikePartSpecs = $this->specifyPart($input, $output, $helper);
        $handleBarMaterial = $this->specifyMaterial($input, $output, $helper);

        return new HandleBar(
            $handleBarMaterial,
            $bikePartSpecs['color'],
            $bikePartSpecs['weight']
        );
    }

    
    /**
     * user can specify wheel 
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @param QuestionHelper $helper
     * @return Wheel
     */
    protected function chooseWheel(InputInterface $input, OutputInterface $output, QuestionHelper $helper): Wheel
    {
        $output->writeln('=================== Customize Your Wheels ====================');
        $bikePartSpecs = $this->specifyPart($input, $output, $helper);
        $diameter = 
            $helper->ask(
                $input,
                $output,
                new Question(static::$questionBag['wheel'])
            );

        return new Wheel (
            $diameter,
            $bikePartSpecs['color'],
            $bikePartSpecs['weight']
        );
    }


    /**
     * user can specify pedal
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @param QuestionHelper $helper
     * @return Pedal
     */
    protected function choosePedal(InputInterface $input, OutputInterface $output, QuestionHelper $helper): Pedal 
    {
        $output->writeln('=================== Customize Your Pedals ====================');
        $bikePartSpecs = $this->specifyPart($input, $output, $helper);
        $length = 
            $helper->ask(
                $input, 
                $output, 
                new Question(static::$questionBag['pedalLength'])
            );
        $width = 
            $helper->ask(
                $input,
                $output,
                new Question(static::$questionBag['pedalWidth'])
            );
        
            return new Pedal(
                $length,
                $width,
                $bikePartSpecs['color'],
                $bikePartSpecs['weight']
            );
    }


    /**
     * user can specify seat
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @param QuestionHelper $helper
     * @return Seat
     */
    protected function chooseSeat(InputInterface $input, OutputInterface $output, QuestionHelper $helper): Seat
    {
        $output->writeln('=================== Customize Your Seat ====================');
        $bikePartSpecs = $this->specifyPart($input, $output, $helper);
        $seatGender = 
            $helper->ask(
                $input,
                $output,
                new ChoiceQuestion(
                    static::$questionBag['seat'], 
                    array(
                        0 => 'female', 
                        1 => 'male'
                    )
                )
            );
        
        return new Seat(
            $seatGender,
            $bikePartSpecs['color'],
            $bikePartSpecs['weight']
        );
    }


    /**
     * user can specify brakes
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @param QuestionHelper $helper
     * @return Brake
     */
    protected function chooseBrake(InputInterface $input, OutputInterface $output, QuestionHelper $helper): Brake
    {
        $output->writeln('=================== Customize Your Brakes ====================');
        $bikePartSpecs = $this->specifyPart($input, $output, $helper);
        $type = 
            $helper->ask(
                $input,
                $output,
                new ChoiceQuestion(static::$questionBag['brake'], Brake::BRAKE_TYPES)
            );
        
        return new Brake(
            $type,
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
        $question = new ChoiceQuestion(static::$questionBag['material'], Material::ALLOWED_MATERIALS);
        return $helper->ask($input, $output, $question);
    }
}