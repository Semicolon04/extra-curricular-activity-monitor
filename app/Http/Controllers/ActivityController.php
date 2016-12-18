<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    public function storeGenericActivity(Request $request) {
        $sql = "INSERT INTO activities"
            . " (title, description, year, student_id, activity_type)"
            . " VALUES ?, ?, ?, ?, ?";
        $values = [$request->input('title'), $request->input('description'),
            $request->input('year'), $request->input('student_id'),
            $request->input('activity_type')];
        $activity_id = DB::select("LAST_INSERT_ID()");
        $activity_type = $request->input('activity_type');

        if ($request->has('awards')) {
            for ($award in $request->input('awards')) {
                $sql = "INSERT INTO awards (activity_id, award_name, "
                    . "year, organization) VALUES (?, ?, ?, ?)";
                $values = [$activity_id, $award->award_name,
                    $award->year, $award->organization];
                DB::insert($sql, $values);
            }
        }
        if ($activity_type == 'club') {
            storeClubActivity($request, $activity_id);
        } else if ($activity_type == 'competition') {
            storeCompetitionActivity($request, $activity_id);
        } else if ($activity_type == 'sport') {
            storeSportsActivity($request, $activity_id);
        }
    }
    public function storeClubActivity($request, $activity_id) {
        $sql = "INSERT INTO club_activities (activity_id, club_name, position)"
            . " VALUES (?, ?, ?)";
        $values = [$activity_id, $request->input('club_name'),
            $request->input('position')];
        DB::insert($sql, $values);
    }
    public function storeCompetitionActivity($request, $activity_id) {
        $sql = "INSERT INTO competition_activities "
            . "(activity_id, competition_name, position, competition_organizer)"
            . " VALUES (?, ?, ?, ?)";
        $values = [$activity_id, $request->input('competition_name')
            $request->input('position'), $request->input('competition_organizer')];
        DB::insert($sql, $values);
    }
    public function storeSportsActivity($request, $activity_id) {
        $sql = "INSERT INTO sport_acvities (activity_id, sport_name, position)"
            . " VALUES (?, ?, ?)";
        $values = [$activity_id, $request->input('sport_name'),
            $request->input('position')];
        DB::insert($sql, $values);
    }
    public function validateActivity(Request $request, $activity_id) {

    }
}
