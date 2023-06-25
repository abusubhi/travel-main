<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->morphs('notifiable');
            $table->text('data');
            $table->string('number')->nullable();
            $table->string('name')->nullable();
            $table->string('rating')->nullable();
            $table->string('update')->nullable();
            $table->bigInteger('product_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('type_exploit_id')->nullable();
            $table->bigInteger('rating_exploit_id')->nullable();
            $table->timestamp('read_at')->nullable();
            $table->timestamp('sent_mail')->nullable();
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
        Schema::dropIfExists('notifications');
    }
}
