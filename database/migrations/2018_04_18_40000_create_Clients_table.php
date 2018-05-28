<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table)
        {
            $table->increments('id'); //первичный ключ
            $table->string('fullname')->nullable();
            $table->string('passport')->nullable();
            $table->string('phone_number')->nullable();
            $table->unique(['id', 'fullname','passport']); //составной первичный ключ

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
        Schema::dropIfExists('clients');
    }
}
