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
    id INT PRIMARY KEY NOT NULL,
    activity_type VARCHAR(20) NOT NULL
)
SQL;
        DB::statement($sql);

        $sql2 = <<< SQL
INSERT INTO activity_types VALUES
(1, 'club'), (2, 'competition'), (3, 'sport')
SQL;
        DB::statement($sql2);
        $sql3 = <<< SQL
CREATE TABLE staff_type(
    staff_id VARCHAR(10) NOT NULL,
    type_id INT NOT NULL,
    FOREIGN KEY(staff_id) REFERENCES staff(id),
    FOREIGN KEY(type_id) REFERENCES activity_types(id)
)
SQL;
        DB::statement($sql3);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP TABLE staff_type");
        DB::statement("DROP TABLE activity_types");

    }
}
