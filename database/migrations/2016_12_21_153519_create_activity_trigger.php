<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::unprepared('
        CREATE TRIGGER activity_delete before DELETE on `activities` 
            FOR EACH ROW
            BEGIN 
            if old.ID in (select activity_id from club_activities) then
            DELETE FROM club_activities
                  WHERE club_activities.activity_id= old.ID;
            elseif old.ID in (select activity_id from competition_activities) then
            DELETE FROM competition_activities
                  WHERE competition_activities.activity_id= old.ID;
            elseif old.ID in (select activity_id from sports_activities) then
            DELETE FROM sports_activities
                  WHERE sports_activities.activity_id= old.ID;
            end if;
            if old.ID in (select activity_id from club_activity_projects) then
            DELETE FROM club_activity_projects
                  WHERE club_activity_projects.activity_id= old.ID;
            end if;
             if old.ID in (select activity_id from sport_events) then
            DELETE FROM sports_events
                  WHERE sports_events.activity_id= old.ID;
            end if;
            if old.ID in (select activity_id from awards) then
            DELETE FROM awards
                  WHERE awards.activity_id= old.ID;
            end if;
            
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        DB::unprepared('DROP TRIGGER activity_delete');
    }
}
