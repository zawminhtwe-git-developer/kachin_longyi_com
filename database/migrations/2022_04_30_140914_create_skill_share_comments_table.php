<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillShareCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_share_comments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id");
            $table->bigInteger("share_skills_id");
            $table->string("comment");
            $table->integer("like")->default(1);
            $table->integer("share")->default(1);
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
        Schema::dropIfExists('skill_share_comments');
    }
}
