<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndentureTaskPivotTable extends Migration
{
    public function up()
    {
        Schema::create('indenture_task', function (Blueprint $table) {
            $table->unsignedInteger('task_id');

            $table->foreign('task_id', 'task_id_fk_726010')->references('id')->on('tasks')->onDelete('cascade');

            $table->unsignedInteger('indenture_id');

            $table->foreign('indenture_id', 'indenture_id_fk_726010')->references('id')->on('indentures')->onDelete('cascade');
        });
    }
}
