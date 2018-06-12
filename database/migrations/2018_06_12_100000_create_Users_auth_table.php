<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersAuthTable extends Migration
{
        public function up()
    {
        Schema::connection('pgsqlAuth')->create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('role_id');
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
        });
        //DB::connection('pgsqlAuth')->statement('grant select on users to login;');
        //DB::connection('pgsqlAuth')->statement('grant select on roles to login;');
        // DB::connection('pgsqlAuth')->statement('GRANT ALL ON DATABASE salary_auth TO admin;');
        // DB::connection('pgsqlAuth')->statement('GRANT ALL ON ALL SEQUENCES IN SCHEMA public TO admin;');
        // DB::connection('pgsqlAuth')->statement('GRANT ALL ON ALL TABLES IN SCHEMA public TO admin;');
        // DB::connection('pgsqlAuth')->table('users')->insert([
        //     'email' => env('USER_INITIAL_EMAIL'),
        //     'password' => hash('sha512', env('USER_INITIAL_PASSWORD')),
        //     'role_id' => 1
        // ]);
    }
        public function down()
    {
        Schema::connection('pgsqlAuth')->dropIfExists('users');
    }
}
