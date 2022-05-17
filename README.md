## Application Overview
This is a simple application to demonstrate my knowledge of object-oriented programming (OOP). It makes use of many OOP principles such as inheritance, composition, and interface implementation.

This is a command line application that allows the user to customize a bicycle through a series of prompts. The user can then print the bicycles that he or she has created to the console.

## Technologies
The application was developed using Symfony 6 and PHP 8.1.5. It uses Symfony's Command class to generate the CLI. In an actual application, I would have used Doctrine ORM and stored data in some back end database like MySQL or MongoDB. To minimize complexity and to ensure compatibility with all platforms, I opted to just use the CLI and vanilla PHP objects in lieu of Doctrine entities.

## Running the Program
To run this program, enter the project root directory and run "php bin/console app:build-bike"

Then simply follow the prompts. If the code is having issue, you may need to run "composer install" or run "symfony check:requirements" for any missing dependencies. 

If composer install returns an error try running "php bin/console app:build-bike" anyway. The dependencies still should be resolved.
