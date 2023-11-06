<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->tinyInteger('user_type')->comment('1:admin,2:teacher,3:student,4:parent');
            $table->tinyInteger('is_delete');
            
            $table->string('admission_number',50)->nullable();
            $table->string('roll_number',50)->nullable();
            $table->integer('class_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender',50)->nullable();
            $table->date('date_of_birth');
            $table->string('caste',50);
            $table->string('religion',50)->nullable();
            $table->string('mobile_number',15)->nullable();
            $table->date('admission_date');
            $table->string('profile_photo',100)->nullable();
            $table->string('blood_group',10)->nullable();
            $table->string('height',10)->nullable();
            $table->string('weight',10)->nullable();
            $table->string('occupation')->nullable();
            $table->string('address')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0:active,1:inactive');

        });

    }
/*

alter table users add column admission_number varchar(50) SET DEFAULT NULL add column rull_number varchar(50) SET DEFAULT NULL add column class_id int SET DEFAULT NULL add column first_name varchar(255) add column last_name varchar(255) NOT NULL add column gender varchar(50) SET DEFAULT NULL add column date_of_birth date SET DEFAULT NULL add column caste varchar(50) SET DEFAULT NULL add column religion varchar(50) SET DEFAULT NULL add column mobile_number varchar(15) SET DEFAULT NULL add column admission_date date add column profile_photo varchar(100) SET DEFAULT NULL add column blood_group varchar(10) SET DEFAULT NULL add column height varchar(10) SET DEFAULT NULL add column height weight(10) SET DEFAULT NULL add column status int(1) SET DEFAULT 0


insert users(name,email,password,user_type,is_delete,first_name,last_name,date_of_birth,caste,admission_date) 
values ('Parent','parent@mail.com',"$2y$10$32iLstSMMAf3jRSuNLweLuc7qPlW.eC1Dc0oGtdwg7g/Doq9YZ5b2",4,0,'Parent','Parent','2000-01-01','21','2023-01-01');

*/
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::dropIfExists('users');
    }
    
}
