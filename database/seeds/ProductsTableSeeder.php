<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        Storage::disk('local')->delete(Storage::allFiles());

        //création de 20 pièces à partir de la factory
        factory(App\Product::class, 20)->create()->each(function($product){


            $category = App\category::find(rand(1,2));
            $product->category()->associate($category);
            $link = str_random(6) . '.jpg';
             $file = file_get_contents('https://placeimg.com/200/200/fashion');
           Storage::disk('local')->put($link, $file);
    $product->update([
        'url_image'=>$link
    ]);
    $product->save();       
    });
    }
}
