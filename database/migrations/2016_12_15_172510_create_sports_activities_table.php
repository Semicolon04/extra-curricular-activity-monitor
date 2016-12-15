<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSportsActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = <<< SQL
CREATE TABLE sports_activities(

)
SQL;
        DB::statement($sql);
        $sql2 = <<< SQL
CREATE TABLE sport_events(

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
        DB::statement("DROP TABLE sports_activities");
        DB::statement("DROP TABLE sport_events");
    }
}
