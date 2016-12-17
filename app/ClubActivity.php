<?php

namespace App;

class ClubActivity extends Activity {
    private $clubName;
    private $position;

    public setClubName($clubName) {
        $this->clubName = $clubName;
    }
    public getClubName() {
        return $this->clubName;
    }
    public setPosition($position) {
        $this->position = $position;
    }
    public getPosition() {
        return $this->position;
    }

    public loadPojects() {
        // Make a database call
        $sql = "SELECT * FROM club_activities WHERE activity_id = "
            . $this->getID();
        $results = DB::select($sql);
        return [];
    }
}
