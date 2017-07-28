<?php


$factory->define(\Charlie\Purchase::class, function (Faker\Generator $faker){

    return [
        'custumers_id' => $faker->numberBetween(1,50),
        'amount' => $faker->randomFloat(2,15,500),
        'description' => $faker->company
    ];
});
