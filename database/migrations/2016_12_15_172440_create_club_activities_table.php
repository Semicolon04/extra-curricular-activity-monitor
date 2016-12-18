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
    activity_id INT NOT NULL,
    club_name VARCHAR(50) NOT NULL,
    post VARCHAR(30),
    FOREIGN KEY(activity_id) REFERENCES activities(id)
)
SQL;
        DB::statement($sql);
        $sql2 = <<< SQL
CREATE TABLE club_activity_projects(
    activity_id INT NOT NULL,
    project_name VARCHAR(100) NOT NULL,
    contribution_description TEXT,
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
        DB::statement("DROP TABLE club_activities");
        DB::statement("DROP TABLE club_activity_projects");
    }
}
