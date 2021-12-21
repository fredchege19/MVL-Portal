<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllowances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allowances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('department');
            $table->string('user_id');
            $table->string('amount');
            $table->string('item')->nullable();
            $table->string('activity_id')->nullable();
            $table->string('edited')->nullable();
            $table->string('editedReason')->nullable();
            $table->string('rejectReason')->nullable();
            $table->string('payeePhone')->nullable();
            $table->string('approval1')->default('0');
            $table->string('approval2')->default('0');
            $table->string('approval3')->default('0');
            $table->string('reason')->nullable();
            $table->string('status')->default('0');
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
        Schema::dropIfExists('allowances');
    }
}
