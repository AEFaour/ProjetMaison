<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        //seeders pours les produits
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        //Ici, on appel des autres seeders : Categories et Product....
    }
}
