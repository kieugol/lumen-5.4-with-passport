<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->unique()->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('first_name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->string('age')->nullable();
            $table->tinyInteger('active')->default('1')->nullable(true);
            $table->integer('created_by')->default('0')->nullable(true);
            $table->dateTime('created_date')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable(true);
            $table->integer('updated_by')->default('0')->nullable(true);
            $table->dateTime('updated_date')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
