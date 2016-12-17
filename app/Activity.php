<?php

namespace App;

class Activity {
    private $id;
    private $title;
    private $description;
    private $validatorId;
    private $studentId;

    public setId($id) {
        $this->id = $id;
    }
    public getId() {
        return $this->id;
    }
    public setTitle($title) {
        $this->title = $title;
    }
    public getTitle() {
        return $this->title;
    }
    public setDescription($description) {
        $this->description = $description;
    }
    public getDescription() {
        return $this->description;
    }
    public setStudentId($studentId) {
        $this->studentId = $studentId;
    }
    public setValidatorId($validatorId) {
        $this->validatorId = $validatorId;
    }

    public loadAwards() {
        // Make database request here
        $sql = "SELECT * FROM awards WHERE activity_id = " . $this->getId();
        $results = DB::select($sql);

        return [];
    }
    public loadValidatorDetails() {
        // Make database request here
        $sql = "SELECT * FROM staff WHERE id = " . $this->$validatorId;
        $result = DB::select($sql);
        return ['staff_id' => 'staff_id', 'staff_name' => 'staff_name'];
    }
    public loadStudentDetails() {
        // Make a database request
        $sql = "SELECT * FROM students WHERE id = " . $this->studentId;
        $result = DB::select($sql);
        return ['student_id' => 'student_id', 'student_name' => 'student_name'];
    }

}
