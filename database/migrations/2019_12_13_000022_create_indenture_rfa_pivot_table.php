<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndentureRfaPivotTable extends Migration
{
    public function up()
    {
        Schema::create('indenture_rfa', function (Blueprint $table) {
            $table->unsignedInteger('rfa_id');

            $table->foreign('rfa_id', 'rfa_id_fk_726053')->references('id')->on('rfas')->onDelete('cascade');

            $table->unsignedInteger('indenture_id');

            $table->foreign('indenture_id', 'indenture_id_fk_726053')->references('id')->on('indentures')->onDelete('cascade');
        });
    }
}
