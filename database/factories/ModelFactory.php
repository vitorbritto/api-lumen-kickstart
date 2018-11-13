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

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {

    $faker->addProvider(new Faker\Provider\pt_BR\Person($faker));
    $faker->addProvider(new Faker\Provider\pt_BR\PhoneNumber($faker));

    return [
        'uid'            => str_random(32),
        'cpf'            => $faker->cpf(false),
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => \Illuminate\Support\Facades\Hash::make('123456'),
        'address'        => $faker->address,
        'zipcode'        => $faker->postcode,
        'city'           => $faker->city,
        'state'          => $faker->state,
        'country'        => $faker->country,
        'phone'          => $faker->phoneNumber(false),
        'mobile'         => $faker->phoneNumber(false),
        'birth'          => $faker->date($format = 'Y-m-d', $max = 'now'),
        'gender'         => '',
        'avatar'         => $faker->imageUrl('100'),
        'remember_token' => str_random(10),
        'role'           => \App\Models\User::BASIC_ROLE,
        'status'         => rand(0,1),
    ];
});