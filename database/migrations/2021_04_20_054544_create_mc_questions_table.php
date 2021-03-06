<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMcQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mc_questions', function (Blueprint $table) {
            $table->id();
            $table->integer('exam_id');
            $table->longText('question_name');
            $table->integer('question_number');
            $table->longText('A');
            $table->longText('B');
            $table->longText('C');
            $table->longText('D');
            $table->string('answer');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('mc_questions');
    }
}
