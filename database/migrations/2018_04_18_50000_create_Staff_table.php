<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table)
        {
            $table->increments('id'); //первичный ключ
            $table->string('fullname')->nullable();
            $table->string('sex')->nullable();
            $table->string('passport')->nullable();
            $table->date('databirth')->nullable();
            $table->unique(['id', 'fullname', 'passport']); //составной ключ
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('staff');
    }
}
