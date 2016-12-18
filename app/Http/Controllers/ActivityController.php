<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    public function storeActivity(Request $request) {
        $input_data = $request->json()->all();
        var_dump($input_data['ob']['ofd']);
        $sql = "INSERT INTO activities"
            . " (title, description, year, student_id, activity_type)"
            . " VALUES (?, ?, ?, ?, ?)";
        $values = [$input_data['title'], $input_data['description'],
            $input_data['year'], $input_data['student_id'],
            $input_data['activity_type']];
        DB::insert($sql, $values);
        $activity_id = DB::select("SELECT LAST_INSERT_ID()");
        $activity_type = $input_data['activity_type'];

        foreach ($input_data['awards'] as $award) {
            $sql = "INSERT INTO awards (activity_id, award_name, year,"
                . " organization) VALUES (?, ?, ?, ?)";
            $values = [$activity_id, $award['award_name'], $award['year'],
                $award['organization']];
            DB::insert($sql, $values);
        }
        if ($activity_type == 'club') {
            $sql = "INSERT INTO club_activities (activity_id, club_name," .
                " position) VALUES (?, ?, ?)";
            $values = [$activity_id, $input_data['club_name'],
                $input_data['position']];
            DB::insert($sql, $values);
        } else if ($activity_type == 'competition') {
            $sql = "INSERT INTO competition_activities (activity_id, "
                . "competition_name, position, competition_organizer)"
                . " VALUES (?, ?, ?, ?)";
            $values = [$activity_id, $input_data['competition_name'],
                $input_data['position'], $input_data['competition_organizer']];
            DB::insert($sql, $values);
        } else if ($activity_type == 'sport') {
            $sql = "INSERT INTO sport_acvities (activity_id, sport_name,"
                . " position) VALUES (?, ?, ?)";
            $values = [$activity_id, $input_data['sport_name']),
                $input_data['position']];
            DB::insert($sql, $values);
        }
    }
    public function updateActivity(Request $request, $activity_id) {

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

    }
}
