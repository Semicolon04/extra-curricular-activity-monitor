<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = <<< SQL
CREATE TABLE club_activities(

)
SQL;
        DB::statement($sql);
        $sql2 = <<< SQL
CREATE TABLE club_activity_projects(

)
SQL;
        DB::statement($sql2);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP TABLE club_activities");
        DB::statement("DROP TABLE club_activity_projects");
    }
}
