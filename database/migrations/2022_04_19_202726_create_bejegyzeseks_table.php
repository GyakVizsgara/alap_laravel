<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBejegyzeseksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bejegyzeseks', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('tevekenyseg_id')->unsigned();
            $table->index('tevekenyseg_id');
            $table->foreign('tevekenyseg_id')->references('tevekenyseg_id')->on('tevekenysegs');
            $table->Integer('osztaly_id');
            // $table->index('osztaly_id');
            // $table->foreign('osztaly_id')->references('osztaly_id')->on('users');
            $table->boolean('allapot')->default(true);
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
        Schema::dropIfExists('bejegyzeseks');
    }
}
