<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('display_name');
        });
        DB::table('roles')->insert([
            'name' => '﻿yacht_admin',
            'display_name' => 'Администратор'
        ]);
        DB::table('roles')->insert([
            'name' => 'client',
            'display_name' => 'Клиент'
        ]);
    }
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
