<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vacation_leave');
            $table->integer('sick_leave');
            $table->integer('paternity_leave');
            $table->integer('maternity_leave');
            $table->integer('authorized_absence');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employee_settings');
    }
}
