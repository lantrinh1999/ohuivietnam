<?php

use Illuminate\Database\Seeder;

class SeedStatusTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('status')->count() <= 0) {
            $status = array(
                array('id' => '1','name' => 'Chờ xác nhận đơn hàng','created_at' => NULL,'updated_at' => NULL),
                array('id' => '2','name' => 'Đang giao hàng','created_at' => NULL,'updated_at' => NULL),
                array('id' => '3','name' => 'Đơn hàng bị hủy','created_at' => NULL,'updated_at' => NULL),
                array('id' => '4','name' => 'Hoàn thành đơn hàng','created_at' => NULL,'updated_at' => NULL)
            );
            DB::table('status')->insert($status);
        }
       

    }
}
