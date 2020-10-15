<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auctions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('video_url')->default('')->nullable();
            $table->integer('rooms')->default(0);
            $table->integer('washrooms')->default(0);
            $table->integer('car_parking')->default(0);
            $table->string('category');
            $table->date('bidding_start_date');
            $table->date('bidding_end_date');
            $table->string('status')->default('');
            $table->integer('city_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('country_id')->nullable();
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
        Schema::dropIfExists('auctions');
    }
}
