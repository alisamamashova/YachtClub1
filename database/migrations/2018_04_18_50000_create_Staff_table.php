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
        Schema::create('staff_Yachts',function (Blueprint $table)
        {
            //внешний ключ к экипажу
            $table->integer('staff_id')->unsigned();
            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');
            //внешний ключ к Яхтам
            $table->integer('yacht_id')->unsigned();
            $table->foreign('yacht_id')->references('id')->on('yachts')->onDelete('cascade');
           $table->date('finish_work')->nullable();
           $table->date('start_work')->nullable();
           $table->string('position')->nullable();
           $table->integer('salary');
           $table->unique(['staff_id','yacht_id','start_work','finish_work','position']);//составной ключ
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
    }
}
