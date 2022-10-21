<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string ("estado");
	        $table->string ("trabalhore");
	        $table->string ("area");
	        $table->string ("titulo");
            $table->string("obs");
	        $table->text("descricao");
            $table->date("datainicio");
	        $table->time("hora");
            $table->string("parecer");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendas');
    }
}
