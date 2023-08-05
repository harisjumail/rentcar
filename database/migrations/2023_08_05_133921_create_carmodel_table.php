<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarmodelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carmodel', function (Blueprint $table) {
            $table->smallIncrements('cm_id')->unsigned();
            $table->string('cm_name', 100);
            $table->primary('cm_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('carmodel');
    }
}
