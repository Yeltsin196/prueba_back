<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;
$factory->define(App\Productos::class, function (Faker $faker) {
    return [
        //
        'nombre' => Str::random(10),
            'cantidad' =>rand(1,10),
            'precio' => rand(100,1000)/1.4,
    ];
});
