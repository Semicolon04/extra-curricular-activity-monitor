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
    activity_id INT NOT NULL,
    sport_name VARCHAR(20) NOT NULL,
    position VARCHAR(40),
    FOREIGN KEY(activity_id) REFERENCES activities(id)
)
SQL;
        DB::statement($sql);
        $sql2 = <<< SQL
CREATE TABLE sport_events(
    activity_id INT NOT NULL,
    event_name VARCHAR(40) NOT NULL,
    place VARCHAR(10),
    FOREIGN KEY(activity_id) REFERENCES activities(id)
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
