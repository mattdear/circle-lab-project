<?php


class ReportDto
{
    private $id, $name, $requester, $request_date, $start_date, $finish_date, $approved, $max_age, $min_age, $male, $female, $disease, $isactive;

    public function __construct($id, $name, $requester, $request_date, $start_date, $finish_date, $approved, $max_age, $min_age, $male, $female, $disease, $isactive)
    {
        $this->id = $id;
        $this->name = $name;
        $this->requester = $requester;
        $this->request_date = $request_date;
        $this->start_date = $start_date;
        $this->finish_date = $finish_date;
        $this->approved = $approved;
        $this->max_age = $max_age;
        $this->min_age = $min_age;
        $this->male = $male;
        $this->female = $female;
        $this->disease = $disease;
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

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getRequester()
    {
        return $this->requester;
    }

    public function setRequester($requester)
    {
        $this->requester = $requester;
    }

    public function getRequestDate()
    {
        return $this->request_date;
    }

    public function setRequestDate($request_date)
    {
        $this->request_date = $request_date;
    }

    public function getStartDate()
    {
        return $this->start_date;
    }

    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;
    }

    public function getFinishDate()
    {
        return $this->finish_date;
    }

    public function setFinishDate($finish_date)
    {
        $this->finish_date = $finish_date;
    }

    public function getApproved()
    {
        return $this->approved;
    }

    public function setApproved($approved)
    {
        $this->approved = $approved;
    }

    public function getMaxAge()
    {
        return $this->max_age;
    }

    public function setMaxAge($max_age)
    {
        $this->max_age = $max_age;
    }

    public function getMinAge()
    {
        return $this->min_age;
    }

    public function setMinAge($min_age)
    {
        $this->min_age = $min_age;
    }

    public function getMale()
    {
        return $this->male;
    }

    public function setMale($male)
    {
        $this->male = $male;
    }

    public function getFemale()
    {
        return $this->female;
    }

    public function setFemale($female)
    {
        $this->female = $female;
    }

    public function getDisease()
    {
        return $this->disease;
    }

    public function setDisease($disease)
    {
        $this->disease = $disease;
    }

    public function getIsactive()
    {
        return $this->isactive;
    }

    public function setIsactive($isactive)
    {
        $this->isactive = $isactive;
    }

    public function toString()
    {
        $string = " " . $this->id . " " . $this->name . " " . $this->requester . " " . $this->request_date . " " . $this->start_date . " " . $this->finish_date . " " . $this->approved . " " . $this->max_age . " " . $this->min_age . " " . $this->male . " " . $this->female . " " . $this->disease . " " . $this->isactive . " ";
        return $string;
    }

}

?>