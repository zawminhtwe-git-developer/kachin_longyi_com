<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutZawMinHtwesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_zaw_min_htwes', function (Blueprint $table) {
            //people post for all user table
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->longText('description');
            $table->text('excerpt');
            $table->string('cover');  //cover_photo
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('about_zaw_min_htwes');
    }
}
