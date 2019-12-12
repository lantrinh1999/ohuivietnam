<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // if (DB::table('categories')->count() < 10000) {
        //     $faker = Faker\Factory::create();
        //     $data = [];
        //     for ($i = 0; $i < 10; $i++) {
        //         $data[] = [
        //             'name' => $faker->name,
        //             'slug' => str_slug($faker->name) . rand(1, 100),
        //             'parent_id' => 0,
        //             'description' => $faker->name,
        //         ];
        //     }
        //     DB::table('categories')->insert($data);
        // }
    }
}
