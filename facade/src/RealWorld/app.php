<?php

use Faker\Factory;
use Patterns\Facade\RealWorld\User;
use Patterns\Facade\RealWorld\ValidatorFacade;

$faker = Factory::create('en');

$facade = new ValidatorFacade(new User(
    $faker->name,
    $faker->safeEmail,
    $faker->jobTitle,
));
