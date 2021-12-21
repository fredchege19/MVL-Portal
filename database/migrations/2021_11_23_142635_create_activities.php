<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('supervisor')->nullable();
            $table->string('technician')->nullable();
            $table->string('activity_type')->nullable();
            $table->string('region')->nullable();
            $table->string('county')->nullable();
            $table->string('road')->nullable();
            $table->string('site')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('remarks')->nullable();
            $table->string('status')->nullable();
            $table->string('reason_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
