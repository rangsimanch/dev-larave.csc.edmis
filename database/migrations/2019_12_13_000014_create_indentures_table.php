<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndenturesTable extends Migration
{
    public function up()
    {
        Schema::create('indentures', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();

            $table->string('code')->nullable();

            $table->string('start_dk')->nullable();

            $table->string('destination_dk')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
