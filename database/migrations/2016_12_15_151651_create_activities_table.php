<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = <<< SQL
CREATE TABLE activities (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  title VARCHAR(100) NOT NULL,
  description TEXT,
  year VARCHAR(4),
  student_id VARCHAR(7) NOT NULL,
  validated_by VARCHAR(10),
  points INT,
  activity_type VARCHAR(20),
  FOREIGN KEY(student_id) REFERENCES students(id),
  FOREIGN KEY(validated_by) REFERENCES staff(id)
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
        DB::statement('DROP TABLE activities');
    }
}
