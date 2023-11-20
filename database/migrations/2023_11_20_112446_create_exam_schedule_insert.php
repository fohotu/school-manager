<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamScheduleInsert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_schedule_insert', function (Blueprint $table) {
            

            $table->id();
            $table->integer('exam_id');
            $table->integer('class_id');
            $table->integer('subject_id');
            $table->date('exam_date')->nullable()->default(null);
            $table->string('start_time',25)->nullable()->default(null);
            $table->string('end_time',25)->nullable()->default(null);
            $table->string('room_number',25)->nullable()->default(null);
            $table->string('full_marks',25)->nullable()->default(null);
            $table->string('passing_mark',25)->nullable()->default(null);
            $table->integer('created_by');

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
        Schema::dropIfExists('exam_schedule_insert');
    }
}
