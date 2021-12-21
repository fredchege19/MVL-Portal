<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePettys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pettys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item');
            $table->string('user_id');
            $table->string('amount');
            $table->string('project');
            $table->string('department');
            $table->text('narration');
            $table->string('payee');
            $table->string('payeePhone')->nullable();
            $table->string('accounted_date')->nullable();
            $table->string('edited')->nullable();
            $table->string('editedReason')->nullable();
            $table->string('rejectReason')->nullable();
            $table->string('reason')->nullable();
            $table->string('receipts')->default('0');
            $table->string('approval1')->default('0');
            $table->string('approval2')->default('0');
            $table->string('approval3')->default('0');
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
