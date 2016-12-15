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
        $sql = "CREATE TABLE students (id VARCHAR(7) NOT NULL," .
            " name VARCHAR(50)) NOT NULL, batch VARCHAR(4), sex VARCHAR(6))";
        DB::statement($sql);    // Errors here
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
