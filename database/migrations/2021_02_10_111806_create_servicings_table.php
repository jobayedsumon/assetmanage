<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained();
            $table->text('problem');
            $table->text('solution')->nullable();
            $table->integer('cost')->nullable();
            $table->date('given_date');
            $table->date('received_date')->nullable();
            $table->string('document')->nullable();
            $table->string('phone_number');
            $table->string('location');
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
        Schema::dropIfExists('servicings');
    }
}
