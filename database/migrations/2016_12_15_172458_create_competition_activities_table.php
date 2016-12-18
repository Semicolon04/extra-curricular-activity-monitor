<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetitionActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = <<< SQL
CREATE TABLE competition_activities(
    activity_id INT NOT NULL,
    competition_name VARCHAR(100) NOT NULL,
    position VARCHAR(20),
    competition_organizer VARCHAR(50),
    FOREIGN KEY(activity_id) REFERENCES activities(id)
)
SQL;
        DB::statement($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP TABLE competition_activities");
    }
}
