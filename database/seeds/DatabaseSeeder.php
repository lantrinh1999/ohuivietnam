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
        $this->call([
            CategoryTableSeeder::class,
            UserTableSeeder::class,
            AccountTableSeeder::class,
            AttributeSeeder::class,
            CategoriesTableSeeder::class,
            OptionTableSeed::class,
            SeedStatusTable::class,
            Option2Seeder::class,
        ]);

    }
}
