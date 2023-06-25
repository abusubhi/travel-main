<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travelers', function (Blueprint $table) {
            $table->id();
            $table->string('storage')->nullable();
            $table->string('weight')->nullable();
            $table->date('date_travel')->nullable();
            $table->string('form')->nullable();
            $table->string('to')->nullable();
            $table->float('price')->nullable();
            $table->float('total')->nullable()->default(10);
            $table->bigInteger('checkbox1')->nullable();
            $table->bigInteger('checkbox2')->nullable();
            $table->bigInteger('checkbox3')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('travelers');
    }
}
