<?php

use Illuminate\Database\Seeder;

class Option2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* `ohuivietnam`.`options` */
        $options = array(
            array('id' => '1', 'name' => 'Điểm thưởng khi nhập mã giới thiệu', 'key' => 'point_introduce', 'value' => '500', 'created_at' => null, 'updated_at' => null),
            array('id' => '2', 'name' => 'Email admin', 'key' => 'email_admin', 'value' => 'luongnd2286@gmail.com', 'created_at' => null, 'updated_at' => null),
            array('id' => '3', 'name' => 'Điểm thưởng khi mua đơn hàng', 'key' => 'point_bonus', 'value' => '10000', 'created_at' => null, 'updated_at' => null),
            array('id' => '12', 'name' => 'Logo', 'key' => 'logo', 'value' => 'http://cosmetic.linhlatin.com/userfiles/images/1.jpg', 'created_at' => '2019-12-08 13:51:07', 'updated_at' => '2019-12-08 15:13:31'),
            array('id' => '15', 'name' => 'slide', 'key' => 'slide', 'value' => '[{"title":"M\\u1ef9 ph\\u1ea9m ch\\u00ednh h\\u00e3ng gi\\u00e1 t\\u1ed1t","content":null,"link":"#","image":"https:\\/\\/bizweb.dktcdn.net\\/100\\/341\\/018\\/themes\\/714660\\/assets\\/banner2a.jpg"},{"title":"M\\u1ef9 ph\\u1ea9m ch\\u00ednh h\\u00e3ng gi\\u00e1 t\\u1ed1t","content":null,"link":"#","image":"https:\\/\\/bizweb.dktcdn.net\\/100\\/341\\/018\\/themes\\/714660\\/assets\\/banner2a.jpg"},{"title":"M\\u1ef9 ph\\u1ea9m ch\\u00ednh h\\u00e3ng gi\\u00e1 t\\u1ed1t","content":null,"link":"#","image":"https:\\/\\/bizweb.dktcdn.net\\/100\\/341\\/018\\/themes\\/714660\\/assets\\/banner2a.jpg"}]', 'created_at' => '2019-12-08 14:47:40', 'updated_at' => '2019-12-08 15:38:00'),
        );

        if (DB::table('options')->count() <= 0) {
            DB::table('options')->insert($options);
        }

    }
}
