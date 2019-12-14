<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndentureUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('indenture_user', function (Blueprint $table) {
            $table->unsignedInteger('user_id');

            $table->foreign('user_id', 'user_id_fk_726029')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedInteger('indenture_id');

            $table->foreign('indenture_id', 'indenture_id_fk_726029')->references('id')->on('indentures')->onDelete('cascade');
        });
    }
}
