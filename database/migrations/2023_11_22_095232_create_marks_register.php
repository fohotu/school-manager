<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksRegister extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks_register', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->nullable()->default(null);
            $table->integer('exam_id')->nullable()->default(null);
            $table->integer('class_id')->nullable()->default(null);
            $table->integer('subject_id')->nullable()->default(null);
            $table->integer('class_work')->default(0);
            $table->integer('home_work')->default(0);
            $table->integer('test_work')->default(0);
            $table->integer('exam')->default(0);
            $table->integer('created_by')->nullable()->default(null);
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
        Schema::dropIfExists('marks_register');
    }
}
