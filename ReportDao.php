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
    public function AddReportRequest($newReportRequest)
    {
        if ($newReportRequest != null && $newReportRequest->getApproved() == 0) {
            $stmt = $this->conn->prepare("INSERT INTO " . $this->table . "(id, name, requester, requester_date, start_date, finish_date,
    max_age, min_age, male , female, disease, Isactive) VALUES (? , ? , ? , ? , ? , ? , ? , ?, ?, ?, ?, ?)");
            $stmt->execute([$newReportRequest->getname(), $newReportRequest->getrequester(), $newReportRequest->getRequestDate(),
                $newReportRequest->getStartDate(), $newReportRequest->getFinishDate(), $newReportRequest->getApproved(), $newReportRequest->getMaxAge(),
                $newReportRequest->getMinAge(), $newReportRequest->getMale(), $newReportRequest->getFemale(), $newReportRequest->getDisease(), $newReportRequest->getIsactive()]);
            $id = (int)$this->conn->lastInsertId();
            $newReportRequest->setId($id);
        }
    }

// find a ReportRequest//
    public function FindAllReportRequest($newReportRequest)
    {
        if($newReportRequest->getApproved() = 0 && $newReportRequest->getId() != null)
            {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE approved != null");
        $stmt->execute(["approved"=>$newReportRequest->getApproved()]);
        $newReportRequest = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
        {
            array_push($newReportRequest, new ReporDto($row["id"], $row["name"], $row["requester"],
                $row["start_date"], $row["finish_date"], $row["max_age"], $row["min_age"], $row["male"], $row["female"], $row["disease"],$row["isactive"]));
        }
                 return $newReportRequest;
             }
        else
        {
	    return null;
		}
    }
        
        
    public function DeleteReportRequest($deleteReportRequest)
    {
        if($deleteReportRequest != null && $deleteReportRequest->getId() != null)
        {
            $stmt = $this->conn->prepare("DELETE FROM " .  $this->table .  " WHERE id= id");
            $stmt->execute([":id"=>$deleteReportRequest->getId()]);
            $stmt = null;
            $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE id= id");
            $stmt->execute([":id"=>$deleteReportRequest->getId()]);
            $count = $stmt->rowCount();
            if($count == 0)
            {
                return true;
            }
            return false;
        }
        return false;
    }

// approve report request//
    public function ApproveReportRequest($ReportRequest, $ApproveReportRequest)
    {
        if ($ReportRequest != null && $ReportRequest->getApproved() == 0) {
            $stmt = $this->conn->prepare("UPDATE FROM " . $this->table . " SET approved = ? WHERE id = ?, name = ?, requester = ?, request_date = ?, start_date = ?, finish_date = ?, max_age = ?, min_age = ?, male = ?, female = ?, disease = ?, isactive = ?");
            $stmt->execute([$ReportRequest->getname(), $ReportRequest->getrequester(), $ReportRequest->getRequestDate(),
                $ReportRequest->getStartDate(), $ReportRequest->getFinishDate(), $ReportRequest->getApproved(), $ReportRequest->getMaxAge(),
                $ReportRequest->getMinAge(), $ReportRequest->getMale(), $ReportRequest->getFemale(), $ReportRequest->getDisease(), $ReportRequest->getIsactive(),
                $ApproveReportRequest->getname(), $ApproveReportRequest->getrequester(), $ApproveReportRequest->getRequestDate(),
                $ApproveReportRequest->getStartDate(), $ApproveReportRequest->getFinishDate(), $ApproveReportRequest->getApproved(), $ApproveReportRequest->getMaxAge(),
                $ApproveReportRequest->getMinAge(), $ApproveReportRequest->getMale(), $ApproveReportRequest->getFemale(), $ApproveReportRequest->getDisease(), $ApproveReportRequest->getIsactive()]);
             if ($ApproveReportRequest->getApproved() == 1) {
                    return true;
                }
        return false;
        }
        return false;
    }

    // decline report request//
    public function DeclineReportRequest($ReportRequest, $DeclineReportRequest)
    {
        if ($ReportRequest != null && $ReportRequest->getApproved() == 0) {
            $stmt = $this->conn->prepare("UPDATE FROM " . $this->table . " SET approved = ? WHERE id = ?, name = ?, requester = ?, request_date = ?, start_date = ?, finish_date = ?, max_age = ?, min_age = ?, male = ?, female = ?, disease = ?, isactive = ?");
            $stmt->execute([$ReportRequest->getname(), $ReportRequest->getrequester(), $ReportRequest->getRequestDate(),
                $ReportRequest->getStartDate(), $ReportRequest->getFinishDate(), $ReportRequest->getApproved(), $ReportRequest->getMaxAge(),
                $ReportRequest->getMinAge(), $ReportRequest->getMale(), $ReportRequest->getFemale(), $ReportRequest->getDisease(), $ReportRequest->getIsactive(),
                $DeclineReportRequest->getname(), $DeclineReportRequest->getrequester(), $DeclineReportRequest->getRequestDate(),
                $DeclineReportRequest->getStartDate(), $DeclineReportRequest->getFinishDate(), $DeclineReportRequest->getApproved(), $DeclineReportRequest->getMaxAge(),
                $DeclineReportRequest->getMinAge(), $DeclineReportRequest->getMale(), $DeclineReportRequest->getFemale(), $DeclineReportRequest->getDisease(), $DeclineReportRequest->getIsactive()]);
            if ($DeclineReportRequest->getApproved() == 2) {
                return true;
            }
            return false;
        }
        return false;
    }


//add a new a report//
    public function AddReport($newReport)
    {
        if ($newReport != null) {
            $stmt = $this->conn->prepare("INSERT INTO " . $this->table . "(id, name, requester, requester_date, start_date, finish_date,
    max_age, min_age, male , female, disease, Isactive) VALUES (? , ? , ? , ? , ? , ? , ? , ?, ?, ?, ?, ?)");
            $stmt->execute([$newReport->getname(), $newReport->getrequester(), $newReport->getRequestDate(),
                $newReport->getStartDate(), $newReport->getFinishDate(), $newReport->getApproved(), $newReport->getMaxAge(),
                $newReport->getMinAge(), $newReport->getMale(), $newReport->getFemale(), $newReport->getDisease(), $newReport->getIsactive()]);
            $id = (int)$this->conn->lastInsertId();
            $newReport->setId($id);
        }
    }

//update a report//
public function UpdateReport($oldReport, $updateReport)
{
        $stmt = $this->conn->prepare("UPDATE FROM " . $this->table . "  WHERE id = ?, name = ?, requester = ?, request_date = ?, start_date = ?, finish_date = ?, approved = ?, max_age = ?, min_age = ?, male = ?, female = ?, disease = ?, isactive = ?");
        $stmt->execute([$updateReport->getname(), $updateReport->getrequester(), $updateReport->getRequestDate(),$updateReport->getStartDate(), $updateReport->getFinishDate(), $updateReport->getApproved(),$updateReport->getMaxAge(), $updateReport->getMinAge(), $updateReport->getMale(), $updateReport->getFemale(),$updateReport->getDisease(),$updateReport->getIsactive(),
        $oldReport->getname(), $oldReport->getrequester(), $oldReport->getRequestDate(), $oldReport->getStartDate(),$oldReport->getFinishDate(), $oldReport->getApproved(), $oldReport->getMaxAge(), $oldReport->getMinAge(),$oldReport->getMale(), $oldReport->getFemale(), $oldReport->getDisease(), $oldReport->getIsactive()]);
}

//find report by id//
    public function FindReportById($id)
        {
        if ($id != null) {
            $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . "  WHERE id = ?");
            $stmt->execute(["id"=>$id->getId()]);
            $count = $stmt->rowCount();
            $Report = [];
		$stmt = $this->conn->prepare("INSERT INTO " .  $this->table .  " (name) VALUES (:name)");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC));
                new ReporDto($row["id"], $row["name"], $row["requester"],
                    $row["start_date"], $row["finish_date"], $row["max_age"], $row["min_age"], $row["male"], $row["female"], $row["disease"],$row["isactive"]));
        }
            return $Report;
        }
	return null;
}
//find report by requester//
    public function FindReportByRequester($findReportByRequester)
    {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE requester=:requester");
        $stmt->execute(["requester"=>$findReportByRequester->getRequester()]);
        $count = $stmt->rowCount();
        if($count == 1)
        {
            ($row = $stmt->fetch(PDO::FETCH_ASSOC));
            new ReporDto($row["id"], $row["name"], $row["requester"],
                $row["start_date"], $row["finish_date"], $row["max_age"], $row["min_age"], $row["male"], $row["female"], $row["disease"],$row["isactive"]));
        }
        return new ReporDto;
    }
    //find all//
    public function FindAllReport(ReportDto){
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table);
        $Report = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($Report, new ReporDto($row["id"], $row["name"], $row["requester"],
                $row["start_date"], $row["finish_date"], $row["max_age"], $row["min_age"], $row["male"], $row["female"], $row["disease"], $row["isactive"]));
        }
        return $Report;
    }
    //find by approval status.
    public function FindByApproveStatus(ReportDto $findByApproveStatus)
    {
        $stmt = $this->conn->prepare("SELECT * FROM ". $this->table . " WHERE approved=: 1 AND 2");
        $stmt->execute(["approved"=>$findByApproveStatus->getApproved()]);
        $Report = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($Report, new ReportDto($row["id"], $row["description"], $row["patient"],
                $row["patient"], $row["staff_member"], $row["date_time"], $row["location"], $row["duration"], $row["isactive"]));
        }
        return $Report;
    }
    public function FindByDeclined(ReportDto $declined)
        {
            $stmt = $this->conn->prepare("SELECT * FROM ". $this->table . " WHERE approved=: 2");
            $stmt->execute(["approved"=>$declined->getApproved()]);
            $Report = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($Report, new ReportDto($row["id"], $row["description"], $row["patient"],
                    $row["patient"], $row["staff_member"], $row["date_time"], $row["location"], $row["duration"], $row["isactive"]));
            }
            return $Report;
        }
    public function FindByApproved(ReportDto $approved)
    {
        $stmt = $this->conn->prepare("SELECT * FROM ". $this->table . " WHERE approved=: 1");
        $stmt->execute(["approved"=>$approved->getApproved()]);
        $Report = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($Report, new ReportDto($row["id"], $row["description"], $row["patient"],
                $row["patient"], $row["staff_member"], $row["date_time"], $row["location"], $row["duration"], $row["isactive"]));
        }
        return $Report;
    }

?>
