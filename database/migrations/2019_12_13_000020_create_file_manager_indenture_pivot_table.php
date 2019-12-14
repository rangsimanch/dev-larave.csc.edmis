<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileManagerIndenturePivotTable extends Migration
{
    public function up()
    {
        Schema::create('file_manager_indenture', function (Blueprint $table) {
            $table->unsignedInteger('file_manager_id');

            $table->foreign('file_manager_id', 'file_manager_id_fk_726008')->references('id')->on('file_managers')->onDelete('cascade');

            $table->unsignedInteger('indenture_id');

            $table->foreign('indenture_id', 'indenture_id_fk_726008')->references('id')->on('indentures')->onDelete('cascade');
        });
    }
}
