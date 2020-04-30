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
    public function addAppointment($appointment)
    {
      if($appointment != null && $appointment->getId() == null && $appointment->getDescription() != null &&
          $appointment->getPatient() != null && $appointment->getStaffmember() != null && $appointment->getDateTime() != null &&
          $appointment->getLocation() != null && $appointment->getDuration() != null && ($appointment->getIsactive() === 1 || $appointment->getIsactive() === 0))
      {
        $stmt = $this->conn->prepare("INSERT INTO " . $this->table . " (desciption, patient, staff_member, date_time, location, duration, isactive) VALUES (?,?,?,?,?,?,?)");
        $stmt->execute([$appointment->getDescription(), $appointment->getPatient(), $appointment->getStaffmember(), $appointment->getDateTime(), $appointment->getLocation(), $appointment->getDuration(), $appointment->getIsactive()]);
        $id = (int)$this->conn->lastInsertId();
        $appointment->setId($id);
        return $appointment;
      }
      return null;
    }

    //find all Appointment List//
    public function findAllAppointments()
    {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " ORDER BY id");
        $stmt->execute();
        $appointments;
        while ($row = $stmt->fetch()) {
            $appointment = new AppointmentDto($row["id"], $row["desciption"], $row["patient"], $row["staff_member"], $row["date_time"], $row["location"], $row["duration"], $row["isactive"]);
            $appointments[] = $appointment;
        }
        return $appointments;
    }

    public function findAllAppointmentByPatient($id)
    {
      if ($id != null)
      {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE patient = :id ORDER BY id");
        $stmt->execute([":id" => $id]);
        $appointments;
        while ($row = $stmt->fetch()) {
            $appointment = new AppointmentDto($row["id"], $row["desciption"], $row["patient"], $row["staff_member"], $row["date_time"], $row["location"], $row["duration"], $row["isactive"]);
            $appointments[] = $appointment;
        }
        return $appointments;
      }
    }

    //delete an Appointment//
    public function deleteAppointment($AppointmentObj)
    {
        if ($AppointmentObj != null && $AppointmentObj->getId() != null) {
            $stmt = $this->conn->prepare("DELETE FROM " . $this->table . " WHERE id=:id");
            $stmt->execute([":id" => $AppointmentObj->getId()]);
            $stmt = null;
            $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE id=:id");
            $stmt->execute([":id" => $AppointmentObj->getId()]);
            $count = $stmt->rowCount();
            if ($count == 0) {
                return true;
            }
            return false;
        }
        return false;
    }

//Modify an Appointment//
    public function modifyAppointment($appointment)
    {
      if($appointment != null && $appointment->getId() != null && $appointment->getDescription() != null &&
          $appointment->getPatient() != null && $appointment->getStaffmember() != null && $appointment->getDateTime() != null &&
          $appointment->getLocation() != null && $appointment->getDuration() != null && ($appointment->getIsactive() === 1 || $appointment->getIsactive() === 0))
      {
          $stmt = $this->conn->prepare("UPDATE " . $this->table . " SET desciption=?, patient=?, staff_member=?, date_time=?, location=?, duration=?, isactive=? WHERE id=?");
          $stmt->execute([$appointment->getDescription(), $appointment->getPatient(), $appointment->getStaffmember(),
          $appointment->getDateTime(), $appointment->getLocation(), $appointment->getDuration(), $appointment->getIsactive(), $appointment->getId()]);
        }
        return null;
    }

    //find appointmentDTO by id //
    public function findAppointmentById($id)
    {
      if ($id != null)
      {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE id=:id");
        $stmt->execute([":id" => $id]);
        $count = $stmt->rowCount();
        if ($count == 1)
        {
          $row = $stmt->fetch();
          return new AppointmentDto($row["id"], $row["desciption"], $row["patient"], $row["staff_member"], $row["date_time"], $row["location"], $row["duration"], $row["isactive"]);
        }
        return null;
      }
      return null;
    }
}

?>
