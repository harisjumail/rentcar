<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarbrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carbrand', function (Blueprint $table) {
            $table->smallIncrements('cb_id')->unsigned();
            $table->string('cb_name', 100);
            $table->primary(['cb_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('carbrand');
    }
}
