<?php

namespace App;

class CompetitionActivity extends Activity {
    private $competitionName;
    private $competitionOrganizer;
    private $position;

    public setCompetitionName($competitionName) {
        $this->competitionName = $competitionName;
    }
    public getCompetitionName() {
        return $this->competitionName;
    }
    public setCompetitionOrganizer($competitionOrganizer) {
        $this->competitionOrganizer = $competitionOrganizer;
    }
    public getCompetitionOrganizer() {
        return $this->competitionOrganizer;
    }
    public setPosition($position) {
        $this->position = $position;
    }
    public getPosition() {
        return $this->position;
    }
}
