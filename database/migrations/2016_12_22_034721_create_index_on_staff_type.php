<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndexOnStaffType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("create index staff_id_on_staff_type ON staff_type(staff_id)");
        DB::statement("create index type_id_on_staff_type ON staff_type(type_id)")
        DB::statement("create index activity_id_on_club ON club_activities(activity_id)")
        DB::statement("create index activity_id_on_competition ON sports_activities(activity_id)")
        DB::statement("create index activity_id_on_sports ON competition_activities(activity_id)")
        DB::statement("create index activity_id_on_sport_events ON sport_events(activity_id)")
        DB::statement("create index activity_id_on_club_projects ON club_activity_projects(activity_id)")
        DB::statement("create index activity_id_on_awards ON awards(activity_id)")
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
