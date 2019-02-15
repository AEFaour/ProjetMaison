<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'title'=> $faker->word(),
        'description'=> $faker->paragraph(),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 29.99, $max = 999.99),
        'url_image'=> $faker->imageURL($width=200, $heith= 200, 'fashion'),
        'status'=>$faker->randomElement($array= array('published', 'draft')),
        'code'=>$faker->randomElement($array= array('sale','new')),
        'reference' => $faker->isbn10()
    ];
});
