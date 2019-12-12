<?php

use Illuminate\Database\Seeder;

class OptionTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = array(
            array('id' => '1','name' => 'Điểm thưởng khi nhập mã giới thiệu','key' => 'point_introduce','value' => '500','created_at' => NULL,'updated_at' => NULL),
            array('id' => '2','name' => 'Email admin','key' => 'email_admin','value' => 'luongnd2286@gmail.com','created_at' => NULL,'updated_at' => NULL),
            array('id' => '3','name' => 'Điểm thưởng khi mua đơn hàng','key' => 'point_bonus','value' => '1','created_at' => NULL,'updated_at' => NULL)
        );
        
        if (DB::table('options')->count() <= 0) {
            DB::table('options')->insert($options);
        }
    }
}
