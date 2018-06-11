<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table)
        {
            $table->increments('rent_id'); //первычный ключ
            //внешний ключ к таблице Клиентов
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            //внешний ключ к таблице яхт
            $table->integer('yacht_id')->unsigned();
            $table->foreign('yacht_id')->references('id')->on('yachts')->onDelete('cascade');
            $table->string('paymentmethod')->nullable();
            $table->date('rent_start')->nullable();
            $table->date('rent_finish')->nullable();
            $table->unique(['yacht_id','client_id','rent_start','rent_finish']);//составной ключ
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
        Schema::dropIfExists('rents');
    }
}
