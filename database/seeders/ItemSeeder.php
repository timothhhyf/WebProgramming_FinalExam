<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('en_US');
        for($i=1; $i<=12; $i++){
            DB::table('items')->insert([
                'item_name' => 'Vegetable '.$i,
                'item_desc' => $faker->sentence(15),
                'price' => $faker->numberBetween(100000, 500000)
            ]);
        }
    }
}
