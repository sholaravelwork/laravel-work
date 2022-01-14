<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdministratorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('administrators')->delete();
        
        \DB::table('administrators')->insert(array (
            0 => 
            array (
                'id' => 7,
                'name' => '山田　太郎',
                'email' => 'yamada-test-sample572@gmail.com',
                'password' => '$2y$10$X/925NSXSDbTcXCYEM5U5.PXMWd0NsOrjdyKGSv1it6Ay6T5miCpm',
            ),
            1 => 
            array (
                'id' => 9,
                'name' => 'SHO ODA',
                'email' => 'sgsege@gmail.com',
                'password' => '$2y$10$mi1y36WuVJ7qzWeFCKQz2u5KWVVmmuabNI0JWmmIeI1u3OahSmJ2C',
            ),
            2 => 
            array (
                'id' => 10,
                'name' => 'SHO ODA',
                'email' => 'sgsege@gmail.com',
                'password' => '$2y$10$YQs3E79s2Zou0REa/WXbDe1zsimUkDoR3n3ji6FrjFvvAVmYMwV4u',
            ),
        ));
        
        
    }
}