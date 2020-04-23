<?php

include("ReportDto.php");
class ReportDao
{

    private $table, $conn;

    public function __construct($conn, $table)
    {
        $this->conn = $conn;
        $this->table = $table;
    }

// add a Report Request//
    public function addReportRequest(ReporDto $newReportRequest)
    {
        if ($newReportRequest != null && $newReportRequest->getApproved() == 0) {
            $stmt = $this->conn->prepare("INSERT INTO " . $this->table . "(id, name, requester, requester_date, start_date, finish_date,
    max_age, min_age, male , female, disease) VALUES (? , ? , ? , ? , ? , ? , ? , ?, ?, ?, ? )");
            $stmt->execute([$newReportRequest->getid(), $newReportRequest->getname(), $newReportRequest->getrequester(), $newReportRequest->getrequester_date(),
                $newReportRequest->getstart_date(), $newReportRequest->getfinish_date(), $newReportRequest->getmax_age(), $newReportRequest->getapproved(),
                $newReportRequest->getmin_age(), $newReportRequest->getmale(), $newReportRequest->getfemale(), $newReportRequest->getdisease()]);
            return $newReportRequest;
        }
        return false;
    }

// find a ReportRequest//
    public function findAllReportRequest()
    {
        $query = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE approved != null");
        $query->execute();
        $ReportRequest = [];
        while ($row = $query->fetch()) {
            $ReportRequest = new ReportRequest($row["name"]);
            $ReportRequest->setId($row["id"]);
            $ReportRequest->setrequester($row["requester"]);
            $ReportRequest->setrequester_date($row["requester_date"]);
            $ReportRequest->setstart_date($row["start_date"]);
            $ReportRequest->setfinish_date($row["finish_date"]);
            $ReportRequest->setapproved($row["approved"]);
            $ReportRequest->setmax_age($row["max_age"]);
            $ReportRequest->setmin_age($row["min_age"]);
            $ReportRequest->setmale($row["male"]);
            $ReportRequest->setfemale($row["female"]);
            $ReportRequest->disease($row["disease"]);
            $ReportRequest[] = $ReportRequest;
        }
        return $ReportRequest;
    }

    //delete a report request//
    public function deleteReportRequest(ReportDto $deleteReportRequest)
    {
        $query = $this->conn->prepare("DELETE FROM " . $this->table . " WHERE id=? AND approved = 0 ");
        $query->execute([$deleteReportRequest->getid(), $deleteReportRequest->getapproved()]);
    }

// approve report request//
    public function approvedReportRequest(ReportDto $approvedReportRequest)
    {
        if ($approvedReportRequest != null && $approvedReportRequest->getApproved() == 0) {
            $stmt = $this->conn->prepare("UPDATE FROM " . $this->table . " WHERE approved=:approved");
            $stmt->execute([":approved" => $approvedReportRequest->getApproved()]);
            $stmt->execute($approvedReportRequest->getid(), $approvedReportRequest->getname(), $approvedReportRequest->getrequester(), $approvedReportRequest->getrequester_date(),
                $approvedReportRequest->getstart_date(), $approvedReportRequest->getfinish_date(), $approvedReportRequest->getapproved(), $approvedReportRequest->getmax_age(),
                $approvedReportRequest->getmin_age(), $approvedReportRequest->getmale(), $approvedReportRequest->getfemale(), $approvedReportRequest->getdisease()]);
                if ($approvedReportRequest->getApproved() == 1) {
                    return true;
                }
        return false;
        }
        return false;
    }

    // decline report request//
    public function declineReportRequest(ReportDto $declineReportRequest)
    {
        if ($declineReportRequest != null && $declineReportRequest->getApproved() == 0) {
            $stmt = $this->conn->prepare("UPDATE FROM " . $this->table . " WHERE approved=:approved");
            $stmt->execute([":approved" => $declineReportRequest->getApproved()]);
            $stmt->execute($declineReportRequest->getid(), $declineReportRequest->getname(), $declineReportRequest->getrequester(), $declineReportRequest->getrequester_date(),
                $declineReportRequest->getstart_date(), $declineReportRequest->getfinish_date(), $declineReportRequest->getapproved(), $declineReportRequest->getmax_age(),
                $declineReportRequest->getmin_age(), $declineReportRequest->getmale(), $declineReportRequest->getfemale(), $declineReportRequest->getdisease()]);
        }
        if ($declineReportRequest->getApproved() == 2) {
            return true;
        }
        return false
        }


//add a new a report//
    public function addReport(ReporDto $newReport)
    {
        $stmt = $this->conn->prepare("INSERT INTO " . $this->table . "(id, name, requester, requester_date, start_date, finish_date,
     approved, max_age, min_age, male , female, disease) VALUES (? , ? , ? , ? , ? , ? , ? , ? , ?, ?, ?, ? )");
        $stmt->execute([$newReport->getid(), $newReport->getname(), $newReport->getrequester(), $newReport->getrequester_date(),
            $newReport->getstart_date(), $newReport->getfinish_date(), $newReport->getapproved(), $newReport->getmax_age(),
            $newReport->getmin_age(), $newReport->getmale(), $newReport->getfemale(), $newReport->getdisease()]);
    }

//update a report//
    public function updateReport(ReportDto $updateReport)
    {
        $query = $this->conn->prepare("UPDATE " . $this->table . " SET name=?, WHERE ID=?,requester=?,
     requester_date=?, start_date=?, finish_date=?, approved=?, max_age=?, min_age=?, male=?, female=?, disease=?;");
        $query->execute([$updateReport->getid(), $updateReport->getname(), $updateReport->getrequester(), $updateReport->getrequester_date(),
            $updateReport->getstart_date(), $updateReport->getfinish_date(), $updateReport->getapproved(), $updateReport->getmax_age(),
            $updateReport->getmin_age(), $updateReport->getmale(), $updateReport->getfemale(), $updateReport->getdisease()]);
    }

//delete a report//
    public function deleteReport(ReportDto $deleteReport)
    {
        $query = $this->conn->prepare("DELETE FROM " . $this->table . " WHERE id=?");
        $query->execute([$deleteReport->getid()]);
        $count = $query->rowCount();
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

//find a single report by id//
    public function findReportById(ReportDto $findReportById)
    {
        $query = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE TRUE=TRUE");
        if ($findReportById->getId != null) {
            $query = $query + " AND id = ?";
        }
        $findReportById = $query->execute([$findReportById->getId()]);
        return $findReportById;
    }

//find all reports//
    public function findAllReport()
    {
        $query = $this->conn->prepare("SELECT * FROM " . $this->table);
        $query->execute();
        $Report = [];
        while ($row = $query->fetch()) {
            $Report = new Report($row["name"]);
            $Report->setId($row["id"]);
            $Report->setrequester($row["requester"]);
            $Report->setrequester_date($row["requester_date"]);
            $Report->setstart_date($row["start_date"]);
            $Report->setfinish_date($row["finish_date"]);
            $Report->setapproved($row["approved"]);
            $Report->setmax_age($row["max_age"]);
            $Report->setmin_age($row["min_age"]);
            $Report->setmale($row["male"]);
            $Report->setfemale($row["female"]);
            $Report->disease($row["disease"]);
            $Report[] = $Report;
        }
        return $Report;
    }
//find report by requester//
    public function findReportByRequester(ReportDto $findReportByRequester)
    {
        $query = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE TRUE=TRUE");
        if ($findReportByRequester->getRequester != null) {
            $query = $query + " AND requester = ?";
        }
        $findReportByRequester = $query->execute([$findReportByRequester->getRequester()]);
        return $findReportByRequester;
    }
    public function findByAwaitingApproval(ReportDto $approvalStatus){
            $query = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE approved= 0");
            $query->execute();
        $approvalStatus = [];
            while ($row = $query->fetch()) {
                $approvalStatus = new ReportRequest($row["name"]);
                $approvalStatus->setId($row["id"]);
                $approvalStatus->setrequester($row["requester"]);
                $approvalStatus->setrequester_date($row["requester_date"]);
                $approvalStatus->setstart_date($row["start_date"]);
                $approvalStatus->setfinish_date($row["finish_date"]);
                $approvalStatus->setapproved($row["approved"]);
                $approvalStatus->setmax_age($row["max_age"]);
                $approvalStatus->setmin_age($row["min_age"]);
                $approvalStatus->setmale($row["male"]);
                $approvalStatus->setfemale($row["female"]);
                $approvalStatus->disease($row["disease"]);
                $approvalStatus[] = $approvalStatus;
            }
            return $approvalStatus;
        }
    public function findByDeclined(ReportDto $approvalStatus){
        $query = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE approved= 1");
        $query->execute();
        $approvalStatus = [];
        while ($row = $query->fetch()) {
            $approvalStatus = new ReportRequest($row["name"]);
            $approvalStatus->setId($row["id"]);
            $approvalStatus->setrequester($row["requester"]);
            $approvalStatus->setrequester_date($row["requester_date"]);
            $approvalStatus->setstart_date($row["start_date"]);
            $approvalStatus->setfinish_date($row["finish_date"]);
            $approvalStatus->setapproved($row["approved"]);
            $approvalStatus->setmax_age($row["max_age"]);
            $approvalStatus->setmin_age($row["min_age"]);
            $approvalStatus->setmale($row["male"]);
            $approvalStatus->setfemale($row["female"]);
            $approvalStatus->disease($row["disease"]);
            $approvalStatus[] = $approvalStatus;
        }
        return $approvalStatus;
    }
    public function findByApproved(ReportDto $approvalStatus){
        $query = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE approved= 2");
        $query->execute();
        $approvalStatus = [];
        while ($row = $query->fetch()) {
            $approvalStatus = new ReportRequest($row["name"]);
            $approvalStatus->setId($row["id"]);
            $approvalStatus->setrequester($row["requester"]);
            $approvalStatus->setrequester_date($row["requester_date"]);
            $approvalStatus->setstart_date($row["start_date"]);
            $approvalStatus->setfinish_date($row["finish_date"]);
            $approvalStatus->setapproved($row["approved"]);
            $approvalStatus->setmax_age($row["max_age"]);
            $approvalStatus->setmin_age($row["min_age"]);
            $approvalStatus->setmale($row["male"]);
            $approvalStatus->setfemale($row["female"]);
            $approvalStatus->disease($row["disease"]);
            $approvalStatus[] = $approvalStatus;
        }
        return $approvalStatus;
    }
}

?>