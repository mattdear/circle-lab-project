<?php

class AppointmentDto
{
    private $id, $description, $patient, $staff_member, $date_time, $location, $duration, $isactive;

    public function __construct($id, $description, $patient, $staff_member, $date_time, $location, $duration, $isactive)
    {

        $this->id = $id;
        $this->description = $description;
        $this->patient = $patient;
        $this->staff_member = $staff_member;
        $this->date_time = $date_time;
        $this->location = $location;
        $this->duration = $duration;
        $this->isactive = $isactive;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getPatient()
    {
        return $this->patient;
    }

    public function setPatient($patient)
    {
        $this->patient = $patient;
    }

    public function getStaffMember()
    {
        return $this->staff_member;
    }

    public function setStaffMember($staff_member)
    {
        $this->staff_member = $staff_member;
    }

    public function getDateTime()
    {
        return $this->date_time;
    }

    public function setDateTime($date_time)
    {
        $this->date_time = $date_time;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    public function getIsactive()
    {
        return $this->isactive;
    }

    public function setIsactive($isactive)
    {
        $this->isactive = $isactive;
    }

    function toString()
    {
        $string = " " . $this->id . " " . $this->description . " " . $this->patient . " " . $this->staff_member . " " . $this->date_time . " " . $this->location . " " . $this->duration . " " . $this->isactive . " ";
        return $string;
    }
}

?>