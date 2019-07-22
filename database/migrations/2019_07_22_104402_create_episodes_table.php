<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('course_id');
            $table->string('title');
            $table->string('type',10);
            $table->string('slug');
            $table->text('description');
            $table->text('body');
            $table->string('price',50)->default('0');
            $table->string('videoUrl');
            $table->string('tags');
            $table->string('time',15)->default('00:00:00');
            $table->bigInteger('viewCount')->default(0);
            $table->bigInteger('commentCount')->default(0);
            $table->bigInteger('downloadCount')->default(0);
            $table->integer('number');
            $table->foreign('course_id')->references('id')->on('courses')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('episodes');
    }
}
