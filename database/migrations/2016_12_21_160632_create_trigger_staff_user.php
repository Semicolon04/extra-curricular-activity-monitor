<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerStaffUser extends Migration
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
//           CREATE TRIGGER staff_user after insert on staff
//            FOR EACH ROW
//            BEGIN
//            if new.id not in (select id from users) then
//             INSERT INTO users (id,password,type)
//             values(new.id,"qwerty","staff");
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
//        DB::unprepared('DROP TRIGGER staff_user');
    }
}
