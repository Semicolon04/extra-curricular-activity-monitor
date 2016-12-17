<?php

namespace App;

class SportsActivity extends Activity {
    private $sportName;
    private $position;

    public setSportName($sportName) {
        $this->sportName = $sportName;
    }
    public getSportName() {
        return $this->sportName;
    }
    public setPosition($position) {
        $this->position = $position;
    }
    public getPosition() {
        return $this->position;
    }

    public loadEventsInformation() {
        $sql = "SELECT * FROM sport_events WHERE activity_id = "
            . $this->getId();
        $results = DB::select($sql):
        return [];
    }
}
