<?php

use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('attribute')->count() < 1) {
            /* `cosmetic`.`attribute` */
            $attribute = array(
                array('id' => '1', 'name' => 'Khối lượng', 'slug' => 'khoi-luong', 'created_at' => '2019-11-18 09:38:27', 'updated_at' => '2019-11-18 09:38:27'),
                array('id' => '2', 'name' => 'Dung tích', 'slug' => 'dung-tich', 'created_at' => '2019-11-18 09:38:38', 'updated_at' => '2019-11-18 09:38:38'),
            );
            /* `cosmetic`.`attribute_value` */
            $attribute_value = array(
                array('id' => '1', 'attribute_id' => '2', 'name' => '100ml', 'slug' => '100ml', 'value' => null, 'created_at' => '2019-11-18 09:38:49', 'updated_at' => '2019-11-18 09:38:49'),
                array('id' => '2', 'attribute_id' => '2', 'name' => '200ml', 'slug' => '200ml', 'value' => null, 'created_at' => '2019-11-18 09:38:54', 'updated_at' => '2019-11-18 09:38:54'),
                array('id' => '3', 'attribute_id' => '1', 'name' => '100g', 'slug' => '100g', 'value' => null, 'created_at' => '2019-11-18 09:39:05', 'updated_at' => '2019-11-18 09:39:05'),
                array('id' => '4', 'attribute_id' => '1', 'name' => '200g', 'slug' => '200g', 'value' => null, 'created_at' => '2019-11-18 09:39:10', 'updated_at' => '2019-11-18 09:39:10'),
            );

            DB::table('attribute')->insert($attribute);
            DB::table('attribute_value')->insert($attribute_value);

        }
    }
}
