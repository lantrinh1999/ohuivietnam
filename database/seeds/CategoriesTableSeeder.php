<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('categories')->count() < 1) {
            /* `cosmetic`.`categories` */
            $categories = array(
                array('id' => '11', 'name' => 'Môi', 'slug' => 'moi', 'parent_id' => '0', 'description' => null, 'created_at' => '2019-11-19 17:13:19', 'updated_at' => '2019-11-19 17:13:19'),
                array('id' => '12', 'name' => 'Son dưỡng', 'slug' => 'son-duong', 'parent_id' => '11', 'description' => null, 'created_at' => '2019-11-19 17:13:31', 'updated_at' => '2019-11-19 17:13:31'),
                array('id' => '13', 'name' => 'Son thỏi', 'slug' => 'son-thoi', 'parent_id' => '11', 'description' => null, 'created_at' => '2019-11-19 17:13:45', 'updated_at' => '2019-11-19 17:13:45'),
                array('id' => '14', 'name' => 'Son lỳ', 'slug' => 'son-ly', 'parent_id' => '11', 'description' => null, 'created_at' => '2019-11-19 17:13:54', 'updated_at' => '2019-11-19 17:13:54'),
                array('id' => '15', 'name' => 'Mặt', 'slug' => 'mat', 'parent_id' => '0', 'description' => null, 'created_at' => '2019-11-19 17:14:03', 'updated_at' => '2019-11-19 17:14:03'),
                array('id' => '16', 'name' => 'Phấn nền', 'slug' => 'phan-nen', 'parent_id' => '15', 'description' => null, 'created_at' => '2019-11-19 17:14:12', 'updated_at' => '2019-11-19 17:14:12'),
                array('id' => '17', 'name' => 'Phấn trang điểm', 'slug' => 'phan-trang-diem', 'parent_id' => '15', 'description' => null, 'created_at' => '2019-11-19 17:14:22', 'updated_at' => '2019-11-19 17:14:22'),
            );
            DB::table('categories')->insert($categories);

        }
    }
}
