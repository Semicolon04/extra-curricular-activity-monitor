<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Log;

class ActivityController extends Controller
{
    public function storeActivity(Request $request) {
        $input_data = $request->json()->all();
        Log::info($input_data);
        $sql = "INSERT INTO activities"
            . " (title, description, year, student_id, activity_type)"
            . " VALUES (?, ?, ?, ?, ?)";
        $values = [$input_data['title'], $input_data['description'],
            $input_data['year'], $input_data['student_id'],
            $input_data['activity_type']];
        // var_dump($values);
        DB::insert($sql, $values);

        $activity_id = DB::select("SELECT id FROM activities ORDER BY id DESC LIMIT 1;");
        $array = json_decode(json_encode($activity_id), True);
        // var_dump($array[0]['id']);
        $activity_type = $input_data['activity_type'];
        foreach ($input_data['awards'] as $award) {
            $sql = "INSERT INTO awards (activity_id, award_name, year,"
                . " organization) VALUES (?, ?, ?, ?)";
            $values = [$array[0]['id'],$award['award_name'], $award['year'],
                $award['organization']];
              // var_dump($values);
            DB::insert($sql, $values);
        }

        if ($activity_type == 'club')
        {
            $sql = "INSERT INTO club_activities (activity_id, club_name," .
                " post) VALUES (?, ?, ?)";
            $values = [$array[0]['id'], $input_data['club_name'],
                $input_data['post']];
            DB::insert($sql, $values);
            // insert values to club_projects
            foreach($input_data['projects'] as $club_activity) {
                $sql = "INSERT INTO club_activity_projects "
                    . "(activity_id, project_name, contribution_description) "
                    . " VALUES (?, ?, ?)";
                $values = [$array[0]['id'], $club_activity['project_name'],
                    $club_activity['contribution_description']];
                DB::insert($sql, $values);
            }
        }
        else if ($activity_type == 'competition')
        {
            $sql = "INSERT INTO competition_activities (activity_id, "
                . "competition_name, position, competition_organizer)"
                . " VALUES (?, ?, ?, ?)";
            $values = [$array[0]['id'], $input_data['competition_name'],
                $input_data['position'], $input_data['competition_organizer']];
            DB::insert($sql, $values);
        }
        else if ($activity_type == 'sport')
        {
            $sql = "INSERT INTO sports_activities (activity_id, sport_name,"
                . " position) VALUES (?, ?, ?)";
            $values = [$array[0]['id'], $input_data['sport_name'],
                $input_data['position']];
            DB::insert($sql, $values);
            // insert values to sport evetns
            foreach($input_data['events'] as $event) {
                $sql = "INSERT INTO sport_events "
                    . "(activity_id, event_name, place) VALUES (?, ?, ?)";
                $values = [$array[0]['id'], $event['event_name'], $event['place']];
                DB::insert($sql, $values);
            }
        }
    }
    public function updateActivity(Request $request, $activity_id) {
        $input_data = $request->json()->all();

        $sql = "UPDATE activities SET title = ?, description = ?, year = ?, "
            . "validated_by = NULL, points = NULL WHERE id = ?";
        $values = [$input_data['title'], $input_data['description'],
            $input_data['year'], $activity_id];
        DB::update($sql, $values);

        $activity_type = $input_data['activity_type'];

        DB::delete("DELETE FROM awards WHERE activity_id = ?", [$activity_id]);
        foreach ($input_data['awards'] as $award) {
            $sql = "INSERT INTO awards (activity_id, award_name, year,"
                . " organization) VALUES (?, ?, ?, ?)";
            $values = [$activity_id, $award['award_name'], $award['year'],
                $award['organization']];
            DB::insert($sql, $values);
        }
        if ($activity_type == 'club') {
            $sql = "UPDATE club_activities SET club_name = ?, position = ?"
                . " WhERE activity_id = ?";
            $values = [$input_data['club_name'], $input_data['position'],
                $activity_id];
            DB::update($sql, $values);
            // update values to club_projects
        } else if ($activity_type == 'competition') {
            $sql = "UPDATE competition_activities SET competition_name = ?, "
                . "position = ?, competition_organizer = ?"
                . " WHERE activity_id = ?";
            $values = [$input_data['competition_name'], $input_data['position'],
                $input_data['competition_organizer'], $activity_id];
            DB::update($sql, $values);
        } else if ($activity_type == 'sport') {
            $sql = "UPDATE sport_acvities SET sport_name = ?, position = ? "
                . "WHERE activity_id = ?";
            $values = [$input_data['sport_name'], $input_data['position'],
                $activity_id];
            DB::update($sql, $values);
            // update sport evetns
        }
    }
    public function deleteActivity($activity_id) {
        DB::delete("DELETE FROM activities WHERE $id = ?", [$activity_id]);
        DB::delete("DELETE FROM awards WHERE $activity_id = ?",
            [$activity_id]);
        DB::delete("DELETE FROM club_activities WHERE $activity_id = ?",
            [$activity_id]);
        DB::delete("DELETE FROM competition_activities WHERE $activity_id = ?",
            [$activity_id]);
        DB::delete("DELETE FROM sport_acvities WHERE $activity_id = ?",
            [$activity_id]);
    }
    public function validateActivity(Request $request, $activity_id) {
        $input_data = $request->json()->all();
        $sql = "UPDATE activities SET validated_by = ?, points = ?";
        $values = [$input_data['validated_by'], $input_data['points']];
        // TODO: get validated_by from logged in user
        DB::update($sql, $values);
    }

    public function getStudentsActivities($student_id) {
        $data = DB::select("SELECT * FROM activities WHERE student_id = ?",
            [$student_id]);
    }
}
