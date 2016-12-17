<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = <<<SQL
CREATE TABLE students (
    id VARCHAR(7) PRIMARY KEY NOT NULL,
    name VARCHAR(50) NOT NULL,
    batch VARCHAR(4),
    sex VARCHAR(6),
    email VARCHAR(50),
    address VARCHAR(100)
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
        DB::statement('DROP TABLE students');
    }
}
