<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql =  <<<SQL
CREATE TABLE staff(
  id VARCHAR(10) PRIMARY KEY NOT NULL,
  name VARCHAR(50) NOT NULL,
  job_title VARCHAR(20),
  email VARCHAR(50)
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
        DB::statement("DROP TABLE staff");
    }
}
