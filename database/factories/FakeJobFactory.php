<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Fake_jobs;
use Faker\Generator as Faker;

$factory->define(Fake_jobs::class, function (Faker $faker) {
    return [
        //
        'title' =>$faker->text(50),
        'description'=>$faker->text(200),
        'contact_person'=>$faker->text(50),
        'city' =>$faker->text(50),
    ];
});
