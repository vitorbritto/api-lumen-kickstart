<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Entities\User::class, function (Faker\Generator $faker) {

    $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
    $faker->addProvider(new Faker\Provider\pt_BR\PhoneNumber($faker));

    return [
        'cpf'            => $faker->cpf(false),
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => $faker->password,
        'remember_token' => str_random(10),
        'phone'          => $faker->phone,
        'birth'          => $faker->date($format = 'Y-m-d', $max = 'now'),
        'gender'         => '',
        'notes'          => '',
        'status'         => 'A',
        'permission'     => 'user'
    ];
});
