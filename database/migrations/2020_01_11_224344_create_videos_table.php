<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('is_published')->default(false);
            $table->string('url', 512);
            $table->string('slug', 512);
            $table->string('title_pl', 512);
            $table->string('title_en', 512);
            $table->text('description_pl')->nullable();
            $table->text('description_en')->nullable();
            $table->double('lat', 9, 6)->default(0);
            $table->double('lng', 9, 6)->default(0);
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
        Schema::dropIfExists('videos');
    }
}
