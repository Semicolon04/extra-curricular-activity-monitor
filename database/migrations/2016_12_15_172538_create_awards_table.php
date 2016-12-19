<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = <<< SQL
CREATE TABLE awards(
    activity_id INT NOT NULL,
    award_name VARCHAR(20),
    year VARCHAR(4),
    organization VARCHAR(20),
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
        DB::statement("DROP TABLE awards");
    }
}
