<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = <<< SQL
CREATE TABLE activity_types(

)
SQL;
        // DB::statement($sql);
        $sql2 = <<< SQL
CREATE TABLE staff_type(

)
SQL;
        // DB::statement($sql2);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // DB::statement("DROP TABLE activity_types");
        // DB::statement("DROP TABLE staff_type");
    }
}
