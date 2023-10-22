<?php

// php artisan make:factory SiteContactFactory --model=SiteContact


/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SiteContact;
use Faker\Generator as Faker;


// https://github.com/fzaninotto/faker
$factory->define(SiteContact::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone' =>  $faker->numberBetween(200000000, 1000000000),
        'email' => $faker->unique()->email,
        'contact_reason_id' => $faker->numberBetween(1,3),
        'message' => $faker->text(200),

    ];
});
