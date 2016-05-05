<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApproverCampaignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approver_campaign', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('approver_id');
            $table->integer('campaign_id');
            $table->integer('rank');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('approver_campaign');
    }
}
