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
  id VARCHAR(7) PRIMARY KEY NOT NULL,
  title VARCHAR(30) NOT NULL,
  description VARCHAR(300),
  validatorId VARCHAR(7),
  studentId VARCHAR(7),
  FOREIGN KEY(studentId) REFERENCES students(id),
  FOREIGN KEY(validatorId) REFERENCES staff(id)
)
SQL;
        //DB::statement($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //DB::statement('DROP TABLE activities');
    }
}
