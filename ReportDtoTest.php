<?php

include ("ReportDto.php");
use PHPUnit\Framework\TestCase;
class ReportDtoTest extends PHPUnit\Framework\TestCase
{
 public function testConstruct()
 {
  $Report = new ReportDTO(1, "Broken Ankle Men Only", 9 , "2020-04-03" , "2020-07-18", "2020-07-19", 1, 80, 10, 1, 2, 3, 4);

  $this->assertIsInt($Report->getId(), $message = "testConstruct, test 1");
  $this->assertIsString($Report->getName(), $message = "testConstruct, test 2");
  $this->assertIsInt($Report->getRequester(), $message = "testConstruct, test 3");
  $this->assertIsString($Report->getRequestDate(), $message = "testConstruct, test 4");
  $this->assertIsString($Report->getStartDate(), $message = "testConstruct, test 5");
  $this->assertIsString($Report->getFinishDate(), $message = "testConstruct, test 6");
  $this->assertIsInt($Report->getApproved(), $message = "testConstruct, test 7");
  $this->assertIsInt($Report->getMaxAge(), $message = "testConstruct, test 8");
  $this->assertIsInt($Report->getMinAge(), $message = "testConstruct, test 9");
  $this->assertIsInt($Report->getMale(), $message = "testConstruct, test 10")
        $this->assertIsInt($Report->getFemale(), $message = "testConstruct, test 11");
        $this->assertIsInt($Report->getDisease(), $message = "testConstruct, test 12");
        $this->assertIsInt($Report->getIsactive(), $message = "testConstruct, test 13");
        $this->assertEquals(1, $Report->getId(), $message = "testConstruct, test 14");
        $this->assertEquals("Broken Ankle Men Only", $Report->getName(), $message = "testConstruct, test 10");
        $this->assertEquals(9, $Report->getRequester(), $message = "testConstruct, test 11");
        $this->assertEquals("2020-04-03", $Report->getRequestDate(), $message = "testConstruct, test 12");
        $this->assertEquals("2020-07-18", $Report->getStartDate(), $message = "testConstruct, test 13");
        $this->assertEquals("2020-07-19", $Report->getFinishDate(), $message = "testConstruct, test14");
        $this->assertEquals(1, $Report->getApproved(), $message = "testConstruct, test15");
        $this->assertEquals(80, $Report->getMaxAge(), $message = "testConstruct, test16");
        $this->assertEquals(10, $Report->getMinAge(), $message = "testConstruct, test17");
        $this->assertEquals(1, $Report->getMale(), $message = "testConstruct, test18");
        $this->assertEquals(2, $Report->getFemale(), $message = "testConstruct, test19");
        $this->assertEquals(3, $Report->getDisease(), $message = "testConstruct, test20");
        $this->assertEquals(4, $Report->getIsactive(), $message = "testConstruct, test21");
        $this->assertNotEquals(XXX, $Report->getId(), $message = "testConstruct, test 22");
        $this->assertNotEquals(xxx, $Report->getName(), $message = "testConstruct, test 23");
        $this->assertNotEquals(xxx, $Report->getRequester(), $message = "testConstruct, test 24");
        $this->assertNotEquals(xxx, $Report->getRequestDate(), $message = "testConstruct, test 25");
        $this->assertNotEquals(xxx, $Report->getStartDate(), $message = "testConstruct, test 26");
        $this->assertNotEquals(xxx, $Report->getFinishDate(), $message = "testConstruct, test 27");
        $this->assertNotEquals(xxx, $Report->getMaxAge(), $message = "testConstruct, test 28");
        $this->assertNotEquals(xxx, $Report->getMinAge(), $message = "testConstruct, test 29");
        $this->assertNotEquals(xxx, $Report->getMale(), $message = "testConstruct, test 30");
        $this->assertNotEquals(xxx, $Report->getFemale(), $message = "testConstruct, test 31");
        $this->assertNotEquals(xxx, $Report->getDisease(), $message = "testConstruct, test 32");
        $this->assertNotEquals(xxx, $Report->getIsactive(), $message = "testConstruct, test 33");
        $this->assertNotEquals(xxx, $Report->getApproved(), $message = "testConstruct, test 34");

    }
 public function testGetId()
 {
  $Report = new ReportDto(1, "Broken Ankle Men Only", 9 , "2020-04-03" , "2020-07-18", "2020-07-19", 1, 80, 10, 1, 2, 3, 4);

  $this->assertIsInt($Report->getId(), $message = "testGetId, test 1");
  $this->assertEquals(1, $Report->getId(), $message = "testGetId, test 2");
  $this->assertNotEquals(2, $Report->getId(), $message = "testGetId, test 3");
 }
 public function testSetId()
 {
  $id=2;
  $Appointment = new ReportDto(null, null, null, null, null, null, null, null, null, null, null, null,null);

  $this->assertEquals(null, $Report->getId(), $message = "testSetId, test 1");
  $this->assertNotEquals(1, $Report->getId(), $message = "testSetId, test 2");

  $Appointment->setId($id);

  $this->assertEquals(2, $Report->getId(), $message = "testSetId, test 3");
  $this->assertNotEquals(null, $Report->getId(), $message = "testSetId, test 4");
  $this->assertIsInt($Report->getId(), $message = "testSetId, test 5");
 }
 public function testgetName()
 {
  $Appointment = new AppointmentDto(1, "GP appointment", 2 , 10, "2020-05-01 09:00:00", 4, 5, 6 );

  $this->assertIsString($Appointment->getDescription(), $message = "testGetDescription, test 1");
  $this->assertEquals("GP appointment", $Appointment->getDescription(), $message = "testGetDescription, test 2");
  $this->assertNotEquals("GP appointment", $Appointment->getDescription(), $message = "testGetDescription, test 3");
 }
 public function testSetDescription()
 {
  $description="nurse appointment";
  $Appointment = new AppointmentDto(null, null, null, null, null, null, null,null);

  $this->assertEquals(null, $Appointment->getDescription(), $message = "testSetDescription, test 1");
  $this->assertNotEquals("nurse appointment", $Appointment->getDescription(), $message = "testSetDescription, test 2");

  $Appointment->setDescription($description);

  $this->assertEquals("nurse appointment", $Appointment->getDescription(), $message = "testSetDescription, test 3");
  $this->assertNotEquals(null, $Appointment->getDescription(), $message = "testSetDescription, test 4");
  $this->assertIsInt($Appointment->getDescription(), $message = "testSetDescription, test 5");
 }
 public function testGetPatient()
 {
  $Appointment = new AppointmentDto(1, "GP appointment", 2 , 10, "2020-05-01 09:00:00", 4, 5, 6 );

  $this->assertIsInt($Appointment->getPatient(), $message = "testGetPatient, test 1");
  $this->assertEquals(2, $Appointment->getPatient(), $message = "testGetPatient, test 2");
  $this->assertNotEquals(null, $Appointment->getPatient(), $message = "testGetPatient, test 3");
 }
 public function testSetPatient()
 {
  $patient=2;
  $Appointment = new AppointmentDto(null, null, null, null, null, null, null, null);

  $this->assertEquals(null, $Appointment->getPatient(), $message = "testSetPatient, test 1");
  $this->assertNotEquals(2, $Appointment->getPatient(), $message = "testSetPatient, test 2");

  $Appointment->setPatient($patient);

  $this->assertEquals(2, $Appointment->getPatient(), $message = "testSetPatient, test 3");
  $this->assertNotEquals(null, $Appointment->getPatient(), $message = "testSetPatient, test 4");
  $this->assertIsInt($Appointment->getPatient(), $message = "testSetPatient, test 5");

 }
 public function testGetStaff_member()
 {
  $Appointment = new AppointmentDto(1, "GP appointment", 2 , 10, "2020-05-01 09:00:00", 4, 5, 6 );

  $this->assertIsInt($Appointment->getStaffMember(), $message = "getStaff_member test 1");
  $this->assertEquals(10, $Appointment->getStaffMember(), $message = "getStaff_member, test 2");
  $this->assertNotEquals(null, $Appointment->getStaffMember(), $message = "getStaff_member, test 3");
 }
 public function testSetStaff_member()
 {
  $staff_member=10;
  $Appointment = new AppointmentDto(null, null, null, null, null, null, null, null);

  $this->assertEquals(null, $Appointment->getStaffMember(), $message = "testSetStaff_member, test 1");
  $this->assertNotEquals(10, $Appointment->getStaffMember(), $message = "testSetStaff_member, test 2");

  $Appointment->setStaffMember($staff_member);

  $this->assertEquals(10, $Appointment->getStaffMember(), $message = "testSetStaff_member, test 3");
  $this->assertNotEquals(null, $Appointment->getStaffMember(), $message = "testSetStaff_member, test 4");
  $this->assertIsInt($Appointment->getStaffMember(), $message = "testSetStaff_member, test 5");

 }
 public function testgetDate_time()
 {
  $Appointment = new AppointmentDto(1, "GP appointment", 2 , 10, "2020-05-01 09:00:00", 4, 5, 6 );

  $this->assertIsString($Appointment->getDateTime(), $message = "getDate_time test 1");
  $this->assertEquals("2020-05-01 09:00:00", $Appointment->getDateTime(), $message = "getDate_time, test 2");
  $this->assertNotEquals("1111-11-11 11:11:11", $Appointment->getDateTime(), $message = "getDate_time, test 3");
 }
 public function testSetDate_time()
 {
  $date_time="2020-05-01 09:00:00";
  $Appointment = new AppointmentDto(null, null, null, null, null, null, null, null);

  $this->assertEquals(null, $Appointment->getDateTime(), $message = "testSetDate_time, test 1");
  $this->assertNotEquals("2020-05-01 09:00:00", $Appointment->getDateTime(), $message = "testSetDate_time, test 2");

  $Appointment->setDateTime($date_time);

  $this->assertEquals("2020-05-01 09:00:00", $Appointment->getDateTime(), $message = "testSetDate_time, test 3");
  $this->assertNotEquals(null, $Appointment->getDateTime(), $message = "testSetDate_time, test 4");
  $this->assertIsString($Appointment->getDateTime(), $message = "testSetDate_time, test 5");
 }
 public function testGetLocation()
 {
  $Appointment = new AppointmentDto(1, "GP appointment", 2 , 10, "2020-05-01 09:00:00", 4, 5, 6 );

  $this->assertIsInt($Appointment->getLocation(), $message = "getLocation test 1");
  $this->assertEquals(4, $Appointment->getLocation(), $message = "getLocation, test 2");
  $this->assertNotEquals(null, $Appointment->getLocation(), $message = "getLocation, test 3");
 }
 public function testSetLocation()
 {
  $location= 4;
  $Appointment = new AppointmentDto(null, null, null, null, null, null, null,null);

  $this->assertEquals(null, $Appointment->getLocation(), $message = "testSetLocation, test 1");
  $this->assertNotEquals(4, $Appointment->getLocation(), $message = "testSetLocation, test 2");

  $Appointment->setLocation($location);

  $this->assertEquals(4, $Appointment->getLocation(), $message = "testSetLocation, test 3");
  $this->assertNotEquals(null, $Appointment->getLocation(), $message = "testSetLocation, test 4");
  $this->assertIsInt($Appointment->getLocation(), $message = "testSetLocation, test 5");
 }
 public function testGetDuration()
 {
  $Appointment = new AppointmentDto(1, "GP appointment", 2 , 10, "2020-05-01 09:00:00", 4, 5, 6 );

  $this->assertIsInt($Appointment->getDuration(), $message = "testGetId, test 1");
  $this->assertEquals(5, $Appointment->getDuration(), $message = "testGetId, test 2");
  $this->assertNotEquals(null, $Appointment->getDuration(), $message = "testGetId, test 3");
 }
 public function testSetDuration()
 {
  $duration=5;
  $Appointment = new AppointmentDto(null, null, null, null, null, null, null,null);

  $this->assertEquals(null, $Appointment->getDuration(), $message = "testSetDuration, test 1");
  $this->assertNotEquals(5, $Appointment->getDuration(), $message = "testSetDuration, test 2");

  $Appointment->SetDuration($duration);

  $this->assertEquals(5, $Appointment->getDuration(), $message = "testSetDuration, test 3");
  $this->assertNotEquals(null, $Appointment->getDuration(), $message = "testSetDuration, test 4");
  $this->assertIsInt($Appointment->getDuration(), $message = "testSetDuration, test 5");
 }
 public function testToString()
 {
  $Appointment = new AppointmentDto(1, "GP appointment",2 ,10 ,"2020-05-01 09:00:00", 4, 5, 6 );

  $this->assertIsString($Appointment->toString(), $message = "testToString, test 1");
  $this->assertEquals(" 1 GP appointment 2 10 2020-05-01 09:00:00 4 5 6 ", $Appointment->toString(), $message = "testToString, test 2");
  $this->assertNotEquals(" 2, Nurse appointment, 3 , 4, 1111-11-11 11:11:11, null, null, null ", $Appointment->toString(), $message = "testToString, test 3");
 }
}
?>