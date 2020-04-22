<?php

include ("AppointmentDTO.php");
use PHPUnit\Framework\TestCase;
class AppointmentDtoTest extends PHPUnit\Framework\TestCase
{
    public function testConstruct()
    {
        $Appointment = new AppointmentDto(1, "GP appointment", 2 , 10, "2020-05-01 09:00:00", 4, 5, 6 );

        $this->assertIsInt($Appointment->getId(), $message = "testConstruct, test 1");
        $this->assertIsString($Appointment->getDescription(), $message = "testConstruct, test 2");
        $this->assertIsInt($Appointment->getPatient(), $message = "testConstruct, test 3");
        $this->assertIsInt($Appointment->getStaffMember(), $message = "testConstruct, test 4");
        $this->assertIsString($Appointment->getDateTime(), $message = "testConstruct, test 5");
        $this->assertIsInt($Appointment->getLocation(), $message = "testConstruct, test 6");
        $this->assertIsInt($Appointment->getDuration(), $message = "testConstruct, test 7");
        $this->assertIsInt($Appointment->getIsactive(), $message = "testConstruct, test 8");
        $this->assertEquals(1, $Appointment->getId(), $message = "testConstruct, test 9");
        $this->assertEquals("GP appointment", $Appointment->getDescription(), $message = "testConstruct, test 10");
        $this->assertEquals(2, $Appointment->getPatient(), $message = "testConstruct, test 11");
        $this->assertEquals(10, $Appointment->getStaffMember(), $message = "testConstruct, test 12");
        $this->assertEquals("2020-05-01 09:00:00", $Appointment->getDateTime(), $message = "testConstruct, test 13");
        $this->assertEquals(4, $Appointment->getLocation(), $message = "testConstruct, test14");
        $this->assertEquals(5, $Appointment->getDuration(), $message = "testConstruct, test15");
        $this->assertEquals(6, $Appointment->getIsactive(), $message = "testConstruct, test16");
    }
    public function testGetId()
    {
        $Appointment = new AppointmentDto(1, "GP appointment", 2 , 10, "2020-05-01 09:00:00", 4, 5, 6 );

        $this->assertIsInt($Appointment->getId(), $message = "testGetId, test 1");
        $this->assertEquals(1, $Appointment->getId(), $message = "testGetId, test 2");
        $this->assertNotEquals(2, $Appointment->getId(), $message = "testGetId, test 3");
    }
    public function testSetId()
    {
        $id=2;
        $Appointment = new AppointmentDto(null, null, null, null, null, null, null,null);

        $this->assertEquals(null, $Appointment->getId(), $message = "testSetId, test 1");
        $this->assertNotEquals(1, $Appointment->getId(), $message = "testSetId, test 2");

        $Appointment->setId($id);

        $this->assertEquals(2, $Appointment->getId(), $message = "testSetId, test 3");
        $this->assertNotEquals(null, $Appointment->getId(), $message = "testSetId, test 4");
        $this->assertIsInt($Appointment->getId(), $message = "testSetId, test 5");
    }
    public function testGetDescription()
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
