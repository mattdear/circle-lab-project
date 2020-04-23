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
    public function addAppointment(AppointmentDto $newAppointment)
    {
        $stmt = $this->conn->prepare("INSERT INTO " . $this->table . "(id, description, patient, staff_member, date_time, location,
     duration, isactive) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->execute([$newAppointment->getid(), $newAppointment->getdescription(), $newAppointment->getpatient(), $newAppointment->getstaff_member(),
            $newAppointment->getdate_time(), $newAppointment->getlocation(), $newAppointment->getIsactive()]);
    }

    //find all Appointment List//
    public function findAllAppointment(AppointmentDto $findAppointment)
    {
        $query = $this->conn->prepare("SELECT * FROM " . $this->table);
        $query->execute();
        $Appointment = [];
        while ($row = $query->fetch()) {
            $Appointment = new $Appointment ($row["Appointment"]);
            $Appointment->setId ($row["id"]);
            $Appointment->setdescription($row["description"]);
            $Appointment->setpatient($row["patient"]);
            $Appointment->setstaff_member($row["staff_member"]);
            $Appointment->setdate_time($row["date_time"]);
            $Appointment->setlocation($row["location"]);
            $Appointment->setduration($row["duration"]);
            $Appointment->setIsactive($row["isactive"]);
            $Appointment[] = $Appointment;
        }
        return $Appointment;
    }

    //delete an Appointment//
    public function deleteAppointment(AppointmentDto $deleteAppointment)
    {
        if($deleteAppointment != null && $deleteAppointment->getId() != null)
        {
            $stmt = $this->conn->prepare("DELETE FROM " .  $this->table .  " WHERE id= id");
            $stmt->execute([":id"=>$deleteAppointment->getId()]);
            $stmt = null;
            $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE id= id");
            $stmt->execute([":id"=>$deleteAppointment->getId()]);
            $count = $stmt->rowCount();
            if($count == 0)
            {
                return true;
            }
            return false;
        }
        return false;
    }

//Modify an Appointment//
    public function updateAppointment(AppointmentDto $updateAppointment)
    {
        $query = $this->conn->prepare("UPDATE " . $this->table . " SET patient=?, WHERE ID=?,description=?,
     staff_member=?, date_time=?, location=?;");
        $query->execute([$updateAppointment->getid(), $updateAppointment->getdescription(), $updateAppointment->getpatient(), $updateAppointment->getstaff_member(),
            $updateAppointment->getdate_time(), $updateAppointment->getlocation(), $updateAppointment->getIsactive()])

    }


//find all Appointment by patient//
    public function findAllAppointmentByPatient(AppointmentDto $findAllAppointmentByPatient)
    {
        $query = $this->conn->prepare("SELECT * FROM " . $this->table.  " WHERE patient= id");
        $query->execute(["id"=>$findAllAppointmentByPatient->getId()]);
        $Appointment = [];
        while ($row = $query->fetch()) {
            $Appointment = new $Appointment ($row["Appointment"]);
            $Appointment->setId ($row["id"]);
            $Appointment->setdescription($row["description"]);
            $Appointment->setpatient($row["patient"]);
            $Appointment->setstaff_member($row["staff_member"]);
            $Appointment->setdate_time($row["date_time"]);
            $Appointment->setlocation($row["location"]);
            $Appointment->setduration($row["duration"]);
            $Appointment->setIsactive($row["isactive"]);
            $Appointment[] = $Appointment;
        }
        return $Appointment;
    }

    //find appointmentDTO by id //
    public function findAppointmentById($id)
  {
      if($id != null)
      {
          $stmt = $this->conn->prepare("SELECT * FROM " .  $this->table .  " WHERE id=:id");
          $stmt->execute(["id"=>$id]);
          $count = $stmt->rowCount();
          if($count == 1)
          {
              $row = $stmt->fetch();
              return new AppointmentDto($row["id"], $row["description"],$row["patient"],$row["staff_member"],$row["date_time"]
                  ,$row["location"],$row["duration"],$row["isactive"]);
          }
          return null;
      }
      return null;
  }
// findAppointment(appointmentDTO)//
public function findAppointment(AppointmentDto $findAppointment)
{
    if($findAppointment != null)
    {
        if($findAppointment->getId() != null)
        {
            $stmt = $this->conn->prepare("SELECT * FROM " .  $this->table .  " WHERE id=:id");
            $stmt->execute([":id"=>$findAppointment->getId()]);
            $count = $stmt->rowCount();
            if($count == 1)
            {
                $row = $stmt->fetch();
                return new AppointmentDto($row["id"], $row["description"],$row["patient"],$row["staff_member"],$row["date_time"]
                    ,$row["location"],$row["duration"],$row["isactive"]);
            }
            return null;
        }
        return null;
    }
    return null;
}

}

?>