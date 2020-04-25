<?php
include("AppointmentDto.php");

class AppointmentDao
{
    private $table, $conn;

    public function __construct($conn, $table)
    {
        $this->conn = $conn;
        $this->table = $table;
    }

//add a new Appointment//
    public function AddAppointment($newAppointment)
    {
        if ($newAppointment != null && $newAppointment->getId() == null && $newAppointment->getdescription() != null &&
            $newAppointment->getpatient() != null && $newAppointment->getstaff_member() != null && $newAppointment->getdate_time() != null &&
            $newAppointment->getlocation() != null && $newAppointment->getIsactive() != null) {
            $stmt = $this->conn->prepare("INSERT INTO " . $this->table . "( description, patient, staff_member, date_time, location,
                duration, isactive) VALUES (?,?,?,?,?,?,?)");
            $stmt->execute([$newAppointment->getdescription(), $newAppointment->getpatient(), $newAppointment->getstaff_member(),
                $newAppointment->getdate_time(), $newAppointment->getlocation(), $newAppointment->getIsactive()]);
            $id = (int)$this->conn->lastInsertId();
            $newAppointment->setId($id);
            return $newAppointment;
        }
        return null;
    }

    //find all Appointment List//
    public function FindAllAppointment()
    {
        if ($Appointment->getId() != null && $Appointment->getdescription() != null && $Appointment->getpatient() != null
            && $Appointment->getstaff_member() != null && $Appointment->getdate_time() != null &&
            $Appointment->getlocation() != null && $Appointment->getIsactive() != null) {
            $stmt = $this->conn->prepare("SELECT * FROM " . $this->table);
            $Appointment = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($people, new AppointmentDto($row["id"], $row["description"], $row["patient"],
                    $row["patient"], $row["staff_member"], $row["date_time"], $row["location"], $row["duration"], $row["isactive"]));
            }
            return $Appointment;
        }
        return null;
    }

    public function FindAllAppointmentByPatient($findAllAppointmentByPatient)
    {
        if ($Appointment->getId() != null) {
            $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE patient= id");
            $stmt->execute(["id" => $findAllAppointmentByPatient->getId()]);
            $Appointment = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($people, new AppointmentDto($row["id"], $row["description"], $row["patient"],
                    $row["patient"], $row["staff_member"], $row["date_time"], $row["location"], $row["duration"], $row["isactive"]));
            }
            return $Appointment;
        } 
        else
        {
            return null;
        }
    }

    //delete an Appointment//
    public function DeleteAppointment($deleteAppointment)
    {
        if ($deleteAppointment != null && $deleteAppointment->getId() != null) {
            $stmt = $this->conn->prepare("DELETE FROM " . $this->table . " WHERE id= id");
            $stmt->execute([":id" => $deleteAppointment->getId()]);
            $stmt = null;
            $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE id= id");
            $stmt->execute([":id" => $deleteAppointment->getId()]);
            $count = $stmt->rowCount();
            if ($count == 0) {
                return true;
            }
            return false;
        }
        return false;
    }

//Modify an Appointment//
    public function UpdateAppointment($OldAppointment, $updatedAppointment)
    {
        if ($updatedAppointment->getId() != null && $updatedAppointment->getdescription() != null &&
            $updatedAppointment->getpatient() != null && $updatedAppointment->getstaff_member() != null &&
            $updatedAppointment->getdate_time() != null && $updatedAppointment->getlocation() != null && $updatedAppointment->getIsactive() != null) {
            $stmt = $this->conn->prepare("UPDATE " . $this->table . " SET patient=?, WHERE ID=?,description=?,
     staff_member=?, date_time=?, location=?;");
            $stmt->execute([$updatedAppointment->getid(), $updatedAppointment->getdescription(), $updatedAppointment->getpatient(), $updatedAppointment->getstaff_member(),
                $updatedAppointment->getdate_time(), $updatedAppointment->getlocation(), $updatedAppointment->getIsactive(),
                $OldAppointment->getid(), $OldAppointment->getdescription(), $OldAppointment->getpatient(), $OldAppointment->getstaff_member(),
                $OldAppointment->getdate_time(), $OldAppointment->getlocation(), $OldAppointment->getIsactive()]);
        }
        return null;
    }

    //find appointmentDTO by id //
    public function FindAppointmentById($id)
    {
        if ($id != null) {
            $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE id=: id");
            $stmt->execute(["id" => $id->getId()]);
            $Appointment = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($people, new AppointmentDto($row["id"], $row["description"], $row["patient"],
                    $row["patient"], $row["staff_member"], $row["date_time"], $row["location"], $row["duration"], $row["isactive"]));
            }
            return $Appointment;
        }
        return null;
    }

// findAppointment(appointmentDTO)//
    public function FindAppointment($findAppointment)
    {
        if ($findAppointment != null) {
            if ($findAppointment->getId() != null) {
                $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE id=:id");
                $stmt->execute([":id" => $findAppointment->getId()]);
                $Appointment = [];
                $count = $stmt->rowCount();
                if ($count == 1) {
                    ($row = $stmt->fetch(PDO::FETCH_ASSOC));
                    return new AppointmentDto($row["id"], $row["description"], $row["patient"], $row["staff_member"], $row["date_time"]
                        , $row["location"], $row["duration"], $row["isactive"]);
                }
                return $Appointment;
            }
            return null;
        }
        return null;
    }

}

?>
