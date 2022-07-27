<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_a_s', function (Blueprint $table) {
            $table->id();
            $table->float('suhu_object', 5, 2);
            $table->float('suhu_lingkungan', 5, 2);
            $table->float('konsentrasi_ozon', 5, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_a_s');
    }
}
