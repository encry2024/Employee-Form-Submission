<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            array(
                array(
                    'email'         => 'christan.jake2025@yahoo.com',
                    'name'          => 'Jake Gatchalian',
                    'password'      => Hash::make('jake2024'),
                    'type'          => 'admin',
                    'created_at'    => date('Y-m-d H:i:s'),
                    'updated_at'    => date('Y-m-d H:i:s'),
                    'employee_id'   => '724CJG2014'
                )
            )
        );
    }
}
