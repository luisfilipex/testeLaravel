<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNomeToVeiculosTable extends Migration
{
    public function up()
{
    Schema::table('veiculos', function (Blueprint $table) {
        $table->string('modelo');
    });
}

public function down()
{
    Schema::table('veiculos', function (Blueprint $table) {
        $table->dropColumn('modelo');
    });
}
}

