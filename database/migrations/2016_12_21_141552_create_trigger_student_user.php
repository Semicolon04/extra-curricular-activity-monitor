<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerStudentUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
//        DB::unprepared('
//           CREATE TRIGGER student_user after insert on students
//            FOR EACH ROW
//            BEGIN
//            if new.id not in (select id from users) then
//             INSERT INTO users (id,password,type)
//             values(new.id,"qwerty","students");
//             end if;
//            END	 
//        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
//        DB::unprepared('DROP TRIGGER student_user');
    }
}
