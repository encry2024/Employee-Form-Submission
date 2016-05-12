<?php

use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('forms')->insert(
            array(
                array(
                    'name'          => 'Leave Form',
                ),
                array(
                    'name'          => 'Schedule Form',
                )
            )
        );
    }
}
