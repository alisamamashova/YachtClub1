<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYachtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yachts', function (Blueprint $table)
        {
            $table->increments('id');//первичный ключ
            $table->string('model')->nullable();
            $table->string('mark')->nullable();
            $table->string('flag')->nullable();
            $table->string('portofregistry')->nullable();
            $table->string('type')->nullable();
            $table->string('displacement')->nullable();
            $table->decimal('price')->nullable();
            $table->boolean('status')->default('true');
            //внешний ключ к владельцам
            $table->integer('owner_id')->unsigned();
            $table->foreign('owner_id')->references('id')->on('owners');
            $table->unique(['id','owner_id']); //составной ключ
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
        Schema::dropIfExists('yachts');
    }
}
