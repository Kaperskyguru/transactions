<?php

use Faker\Generator as Faker;
use App\Transaction;

$factory->define(Transaction::class, function (Faker $faker) {
    $type = $faker->randomElement($array = array('credit', 'debit'));
    $status = $faker->randomElement($array = array(1,2,3));
    return [
        'user_id' => $faker->numberBetween(1,1),
        'type' => $type,
        'amount' => $faker->numberBetween(100, 1000000),
        'status' => $status
    ];
});
