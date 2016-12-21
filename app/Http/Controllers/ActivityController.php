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
        $this->validate($request, [
            'title' => 'required',
            'year' => 'required|size:4',
            'description' => 'required',
            'student_id' => 'required|size:7',
            'activity_type'=> 'required',
            'awards.*.year'=>'size:4'
        ]);
        DB::beginTransaction();
        try{
        $sql = "INSERT INTO activities"
            . " (title, description, year, student_id, activity_type)"
            . " VALUES (?, ?, ?, ?, ?)";
        $values = [$input_data['title'], $input_data['description'],
            $input_data['year'], $input_data['student_id'],
            $input_data['activity_type']];
        DB::insert($sql, $values);

        $activity_id = json_decode(json_encode(DB::select("SELECT id FROM activities ORDER BY id DESC LIMIT 1;")), True)[0]['id'];
        $activity_type = $input_data['activity_type'];
        foreach ($input_data['awards'] as $award) {
            $sql = "INSERT INTO awards (activity_id, award_name, year,"
                . " organization) VALUES (?, ?, ?, ?)";
            $values = [$activity_id,$award['award_name'], $award['year'],
                $award['organization']];
            DB::insert($sql, $values);
        }

        if ($activity_type == 'club')
        {
            $sql = "INSERT INTO club_activities (activity_id, club_name," .
                " post) VALUES (?, ?, ?)";
            $values = [$activity_id, $input_data['club_name'],
                $input_data['post']];
            DB::insert($sql, $values);
            // insert values to club_projects
            foreach($input_data['projects'] as $club_activity) {
                $sql = "INSERT INTO club_activity_projects "
                    . "(activity_id, project_name, contribution_description) "
                    . " VALUES (?, ?, ?)";
                $values = [$activity_id, $club_activity['project_name'],
                    $club_activity['contribution_description']];
                DB::insert($sql, $values);
            }
        }
        else if ($activity_type == 'competition')
        {
            $sql = "INSERT INTO competition_activities (activity_id, "
                . "competition_name, position, competition_organizer)"
                . " VALUES (?, ?, ?, ?)";
            $values = [$activity_id, $input_data['competition_name'],
                $input_data['position'], $input_data['competition_organizer']];
            DB::insert($sql, $values);
        }
        else if ($activity_type == 'sport')
        {
            $sql = "INSERT INTO sports_activities (activity_id, sport_name,"
                . " position) VALUES (?, ?, ?)";
            $values = [$activity_id, $input_data['sport_name'],
                $input_data['position']];
            DB::insert($sql, $values);
            // insert values to sport evetns
            foreach($input_data['events'] as $event) {
                $sql = "INSERT INTO sport_events "
                    . "(activity_id, event_name, place) VALUES (?, ?, ?)";
                $values = [$activity_id, $event['event_name'], $event['place']];
                DB::insert($sql, $values);
            }
        }
        DB::commit();
        } catch (Exception $e) {
          DB::rollback();
          // something went wrong
        }
        return response()->json(['message' => 'updated sucessfully']);
    }
    public function updateActivity(Request $request, $activity_id) {
        $input_data = $request->json()->all();

        $this->validate($request, [
            'title' => 'required',
            'year' => 'required|size:4',
            'description' => 'required',
            'student_id' => 'required|size:7',
            'activity_type'=> 'required',
            'awards.*.year'=>'size:4'
        ]);


        DB::beginTransaction();

        try {

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
            DB::delete("DELETE FROM club_activity_projects WHERE activity_id = ?",
                [$activity_id]);
            foreach($input_data['projects'] as $club_activity) {
                $sql = "INSERT INTO club_activity_projects "
                    . "(activity_id, project_name, contribution_description) "
                    . " VALUES (?, ?, ?)";
                $values = [$activity_id, $club_activity['project_name'],
                    $club_activity['contribution_description']];
                DB::insert($sql, $values);
            }
        } else if ($activity_type == 'competition') {
            $sql = "UPDATE competition_activities SET competition_name = ?, "
                . "position = ?, competition_organizer = ?"
                . " WHERE activity_id = ?";
            $values = [$input_data['competition_name'], $input_data['position'],
                $input_data['competition_organizer'], $activity_id];
            DB::update($sql, $values);
        } else if ($activity_type == 'sport') {
            $sql = "UPDATE sports_activities SET sport_name = ?, position = ? "
                . "WHERE activity_id = ?";
            $values = [$input_data['sport_name'], $input_data['position'],
                $activity_id];
            DB::update($sql, $values);
            // update sport evetns
            DB::delete("DELETE FROM sport_events WHERE activity_id = ?",
                [$activity_id]);
            foreach($input_data['events'] as $event) {
                $sql = "INSERT INTO sport_events "
                    . "(activity_id, event_name, place) VALUES (?, ?, ?)";
                $values = [$activity_id, $event['event_name'], $event['place']];
                DB::insert($sql, $values);
            }

            DB::commit();
        }
      } catch (Exception $e) {
        DB::rollback();
      }
    }
    public function deleteActivity($activity_id) {
        DB::beginTransaction();
        DB::delete("DELETE FROM awards WHERE activity_id = ?",
            [$activity_id]);
        DB::delete("DELETE FROM club_activities WHERE activity_id = ?",
            [$activity_id]);
        DB::delete("DELETE FROM club_activity_projects WHERE activity_id = ?",
            [$activity_id]);
        DB::delete("DELETE FROM competition_activities WHERE activity_id = ?",
            [$activity_id]);
        DB::delete("DELETE FROM sports_activities WHERE activity_id = ?",
            [$activity_id]);
        DB::delete("DELETE FROM sport_events WHERE activity_id = ?",
            [$activity_id]);
        DB::delete("DELETE FROM activities WHERE id = ?", [$activity_id]);
        DB::commit();
        return response()->json(['message' => 'deleted sucessfully']);
    }

    public function getStudentsActivities($student_id) {
        $data = DB::select("SELECT * FROM activities WHERE student_id = ?",
            [$student_id]);
        return response()->json($data);
    }
    public function getCompleteActivityDetails($activity_id) {
        $result = [];
        $activity = DB::select('SELECT * FROM activities WHERE id = ?', [$activity_id])[0];
        $result['title'] = $activity->title;
        $result['description'] = $activity->description;
        $result['year'] = $activity->year;
        $result['points'] = $activity->points;
        $result['activity_type'] = $activity->activity_type;
        $result['student_id'] = $activity->student_id;
        $result['id'] = $activity->id;
        if ($activity->activity_type == 'club') {
            $extra = DB::select("SELECT * FROM club_activities WHERE activity_id = ? ", [$activity_id])[0];
            $result['club_name'] = $extra->club_name;
            $result['post'] = $extra->post;
            $sql = "SELECT project_name, contribution_description FROM "
                . "club_activity_projects WHERE activity_id = ?";
            $result['projects'] = DB::select($sql, [$activity_id]);
        } else if ($activity->activity_type == 'competition') {
            $extra = DB::select("SELECT * FROM competition_activities WHERE activity_id = ? ", [$activity_id])[0];
            $result['competition_name'] = $extra->competition_name;
            $result['competition_organizer'] = $extra->competition_organizer;
            $result['position'] = $extra->position;
        } else if ($activity->activity_type == 'sport') {
            $extra = DB::select("SELECT * FROM sports_activities WHERE activity_id = ? ", [$activity_id])[0];
            $result['sport_name'] = $extra->sport_name;
            $result['position'] = $extra->position;
            $sql = "SELECT event_name, place FROM "
                . "sport_events WHERE activity_id = ?";
            $result['events'] = DB::select($sql, [$activity_id]);
        }
        $sql = "SELECT award_name, organization, year FROM awards WHERE activity_id = ?";
        $result['awards'] = DB::select($sql, [$activity_id]);
        return response()->json($result);
    }

    public function validateActivity(Request $request, $activity_id) {
        $input_data = $request->json()->all();
        $sql = "UPDATE activities SET validated_by = ?, points = ?"
            . " WHERE id = ?";
        $values = [$input_data['validated_by'], $input_data['points'], $activity_id];

        DB::beginTransaction();
        $n = DB::update($sql, $values);
        DB::commit();
        if ($n == 1) {
            return response()->json(['message' => 'updated']);
        } else {
            return response()->json(['message' => 'update failed']);
        }
    }
    public function getUnvalidatedActivities($types) {
        $types = explode(',', $types);
        $types = array_map(function($s) {return "'" . $s . "'";}, $types);
        $types = implode(',', $types);
        $sql = "SELECT * FROM activities WHERE validated_by IS NULL AND activity_type IN ($types)";
        $data = DB::select($sql);
        return response()->json($data);
    }
    public function getTotalPoints($student_id) {
        $sql = "SELECT SUM(points) as total_points FROM activities WHERE student_id = ? GROUP BY student_id";
        $response = DB::select($sql, [$student_id])[0];
        return response()->json($response);
    }
    public function search(Request $request) {
        $input_data = $request->json()->all();
        $categories = $input_data['categories'];
        $categories = explode(',', $categories);
        $categories = array_map(function($c) { return "'" . $c . "'"; }, $categories);
        $categories = implode(',', $categories);
        $year = $input_data['year'];
        $title = $input_data['title'];
        $sql = "SELECT a.id, a.points, a.title, a.activity_type, a.year, s.name "
            . "FROM activities AS a JOIN students AS s "
            . "ON a.student_id = s.id "
            . "WHERE a.title like '%$title%' "
            . "AND a.year like '%$year%' "
            . "AND a.activity_type in ($categories)";
        $results = DB::select($sql);
        return response()->json($results);
    }
}
