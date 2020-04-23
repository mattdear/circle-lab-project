<?php

include ("ReportDto.php");
use PHPUnit\Framework\TestCase;
class ReportDtoTest extends PHPUnit\Framework\TestCase
{
    public function testConstruct()
    {
        $Report = new ReportDTO(null, "Broken Ankle Men Only", 9 , "2020-04-03" , "2020-07-18", "2020-07-19", 1, 80, 10, 1, 2, 3, 4);

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
        $this->assertEquals(null, $Report->getId(), $message = "testConstruct, test 14");
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
        $this->assertNotEquals(22, $Report->getId(), $message = "testConstruct, test 22");
        $this->assertNotEquals(21, $Report->getName(), $message = "testConstruct, test 23");
        $this->assertNotEquals(20, $Report->getRequester(), $message = "testConstruct, test 24");
        $this->assertNotEquals(19, $Report->getRequestDate(), $message = "testConstruct, test 25");
        $this->assertNotEquals(18, $Report->getStartDate(), $message = "testConstruct, test 26");
        $this->assertNotEquals(17, $Report->getFinishDate(), $message = "testConstruct, test 27");
        $this->assertNotEquals(16, $Report->getMaxAge(), $message = "testConstruct, test 28");
        $this->assertNotEquals(15, $Report->getMinAge(), $message = "testConstruct, test 29");
        $this->assertNotEquals(14, $Report->getMale(), $message = "testConstruct, test 30");
        $this->assertNotEquals(13, $Report->getFemale(), $message = "testConstruct, test 31");
        $this->assertNotEquals(12, $Report->getDisease(), $message = "testConstruct, test 32");
        $this->assertNotEquals(11, $Report->getIsactive(), $message = "testConstruct, test 33");
        $this->assertNotEquals(10, $Report->getApproved(), $message = "testConstruct, test 34");

    }
    public function testGetId()
    {
        $Report = new ReportDto(null, "Broken Ankle Men Only", 9 , "2020-04-03" , "2020-07-18", "2020-07-19", 1, 80, 10, 1, 2, 3, 4);

        $this->assertIsInt($Report->getId(), $message = "testGetId, test 1");
        $this->assertEquals(1, $Report->getId(), $message = "testGetId, test 2");
        $this->assertNotEquals(2, $Report->getId(), $message = "testGetId, test 3");
    }
    public function testSetId()
    {
        $id=2;
        $Report = new ReportDto(null, null, null, null, null, null, null, null, null, null, null, null,null);

        $this->assertEquals(null, $Report->getId(), $message = "testSetId, test 1");
        $this->assertNotEquals(1, $Report->getId(), $message = "testSetId, test 2");

        $Report->setId($id);

        $this->assertEquals(2, $Report->getId(), $message = "testSetId, test 3");
        $this->assertNotEquals(null, $Report->getId(), $message = "testSetId, test 4");
        $this->assertIsInt($Report->getId(), $message = "testSetId, test 5");
    }
    public function testGetName()
    {
        $Report = new ReportDto(null, "Broken Ankle Men Only", 9 , "2020-04-03" , "2020-07-18", "2020-07-19", 1, 80, 10, 1, 2, 3, 4);

        $this->assertIsString($Report->getName(), $message = "testgetName, test 1");
        $this->assertEquals("Broken Ankle Men Only", $Report->getName(), $message = "testgetName, test 2");
        $this->assertNotEquals("Broken Ankle Men Only", $Report->getName(), $message = "testgetName, test 3");
    }
    public function testSetName()
    {
        $name="Broken Ankle Men Only";
        $Report = new ReportDto(null, null, null, null, null, null, null,null,null, null, null, null, null);

        $this->assertEquals(null, $Report->getName(), $message = "testSetName, test 1");
        $this->assertNotEquals("Broken Ankle Men Only", $Report->getName(), $message = "testSetName, test 2");

        $Report->setName($name);

        $this->assertEquals("Broken Ankle Men Only", $Report->getName(), $message = "testSetName, test 3");
        $this->assertNotEquals(null, $Report->getName(), $message = "testSetName, test 4");
        $this->assertIsString($Report->getName(), $message = "testSetName, test 5");
    }
    public function testGetRequester()
    {
        $Report = new ReportDto(null, "Broken Ankle Men Only", 9 , "2020-04-03" , "2020-07-18", "2020-07-19", 1, 80, 10, 1, 2, 3, 4);

        $this->assertIsInt($Report->getRequester(), $message = "testGetRequester, test 1");
        $this->assertEquals(9, $Report->getRequester(), $message = "testGetRequester, test 2");
        $this->assertNotEquals(null, $Report->getRequester(), $message = "testGetRequester, test 3");
    }
    public function testSetRequester()
    {
        $requester=9;
        $Report = new ReportDto(null, null, null, null, null, null, null,null,null, null, null, null, null);

        $this->assertEquals(null, $Report->getRequester(), $message = "testSetRequester, test 1");
        $this->assertNotEquals(9, $Report->getRequester(), $message = "testSetRequester, test 2");

        $Report->setRequester($requester);

        $this->assertEquals(9, $Report->getRequester(), $message = "testSetRequester, test 3");
        $this->assertNotEquals(null, $Report->getRequester(), $message = "testSetRequester, test 4");
        $this->assertIsInt($Report->getRequester(), $message = "testSetRequester, test 5");

}
    public function testGetRequestDate()
    {
        $Report = new ReportDto(null, "Broken Ankle Men Only", 9 , "2020-04-03" , "2020-07-18", "2020-07-19", 1, 80, 10, 1, 2, 3, 4);

        $this->assertIsString($Report->getRequestDate(), $message = "testGetRequestDate test 1");
        $this->assertEquals("2020-04-03", $Report->getRequestDate(), $message = "testGetRequestDate, test 2");
        $this->assertNotEquals(null, $Report->getRequestDate(), $message = "testGetRequestDate, test 3");
    }
    public function testSetRequestDate()
    {
        $request_date="2020-04-03";
        $Report = new ReportDto(null, null, null, null, null, null, null,null,null, null, null, null, null);

        $this->assertEquals(null, $Report->getRequestDate(), $message = "testSetRequestDate, test 1");
        $this->assertNotEquals(10, $Report->getRequestDate(), $message = "testSetRequestDate, test 2");

        $Report->setRequestDate($request_date);

        $this->assertEquals("2020-04-03", $Report->getRequestDate(), $message = "testSetRequestDate, test 3");
        $this->assertNotEquals("0000-00-00", $Report->getRequestDate(), $message = "testSetRequestDate, test 4");
        $this->assertIsString($Report->getRequestDate(), $message = "testSetRequestDate, test 5");

}
    public function testGetStartDate()
    {
        $Report = new ReportDto(null, "Broken Ankle Men Only", 9 , "2020-04-03" , "2020-07-18", "2020-07-19", 1, 80, 10, 1, 2, 3, 4);

        $this->assertIsString($Report->getStartDate(), $message = "testGetStartDate test 1");
        $this->assertEquals("2020-07-18", $Report->getStartDate(), $message = "testGetStartDate, test 2");
        $this->assertNotEquals("0000-00-00", $Report->getStartDate(), $message = "testGetStartDate, test 3");
    }
    public function testSetStartDate()
    {
        $start_date="2020-07-18";
        $Report = new ReportDto(null, null, null, null, null, null, null,null,null, null, null, null, null);

        $this->assertEquals(null, $Report->getStartDate(), $message = "testSetStartDate, test 1");
        $this->assertNotEquals("2020-05-01 09:00:00", $Report->getStartDate(), $message = "testSetStartDate, test 2");

        $Report->setStartDate($start_date);

        $this->assertEquals("2020-07-18", $Report->getStartDate(), $message = "testSetStartDate, test 3");
        $this->assertNotEquals(null, $Report->getStartDate(), $message = "testSetStartDate, test 4");
        $this->assertIsString($Report->getStartDate(), $message = "testSetStartDate, test 5");
    }
    public function testGetFinishDate()
    {
        $Report = new ReportDto(null, "Broken Ankle Men Only", 9 , "2020-04-03" , "2020-07-18", "2020-07-19", 1, 80, 10, 1, 2, 3, 4);

        $this->assertIsString($Report->getFinishDate(), $message = "testGetFinishDate test 1");
        $this->assertEquals("2020-07-19", $Report->getFinishDate(), $message = "testGetFinishDate, test 2");
        $this->assertNotEquals(null, $Report->getFinishDate(), $message = "testGetFinishDate, test 3");
    }
    public function testSetFinishDate()
    {
        $finish_date= "2020-07-19";
        $Report = new ReportDto(null, null, null, null, null, null, null,null,null, null, null, null, null);

        $this->assertEquals(null, $Report->getFinishDate(), $message = "testSetFinishDate, test 1");
        $this->assertNotEquals("2020-07-19", $Report->getFinishDate(), $message = "testSetFinishDate, test 2");

        $Report->setFinishDate($finish_date);

        $this->assertEquals("2020-07-19", $Report->getFinishDate(), $message = "testSetFinishDate, test 3");
        $this->assertNotEquals(null, $Report->getFinishDate(), $message = "testSetFinishDate, test 4");
        $this->assertIsString($Report->getFinishDate(), $message = "testSetFinishDate, test 5");
    }
    public function testGetApproved()
    {
        $Report = new ReportDto(null, "Broken Ankle Men Only", 9 , "2020-04-03" , "2020-07-18", "2020-07-19", 1, 80, 10, 1, 2, 3, 4);

        $this->assertIsInt($Report->getApproved(), $message = "testGetApproved, test 1");
        $this->assertEquals(1, $Report->getApproved(), $message = "testGetApproved, test 2");
        $this->assertNotEquals(null, $Report->getApproved(), $message = "testGetApproved, test 3");
    }
    public function testSetApproved()
    {
        $approved=1;
        $Report = new ReportDto(null, null, null, null, null, null, null,null,null, null, null, null, null);

        $this->assertEquals(null, $Report->getApproved(), $message = "testSetApproved, test 1");
        $this->assertNotEquals(1, $Report->getApproved(), $message = "testSetApproved, test 2");

        $Report->setApproved($approved);

        $this->assertEquals(1, $Report->getApproved(), $message = "testSetApproved, test 3");
        $this->assertNotEquals(null, $Report->getApproved(), $message = "testSetApproved, test 4");
        $this->assertIsInt($Report->getApproved(), $message = "testSetApproved, test 5");
    }
    public function TestGetMaxAge()
    {
        $Report = new ReportDto(null, "Broken Ankle Men Only", 9 , "2020-04-03" , "2020-07-18", "2020-07-19", 1, 80, 10, 1, 2, 3, 4);

        $this->assertIsInt($Report->getMaxAge(), $message = "TestGetMaxAge, test 1");
        $this->assertEquals(80, $Report->getMaxAge(), $message = "TestGetMaxAge, test 2");
        $this->assertNotEquals(null, $Report->getMaxAge(), $message = "TestGetMaxAge, test 3");
    }
    public function testSetMaxAge()
    {
        $max_age=80;
        $Report = new ReportDto(null, null, null, null, null, null, null,null,null, null, null, null, null);

        $this->assertEquals(null, $Report->getApproved(), $message = "testSetMaxAge, test 1");
        $this->assertNotEquals(1, $Report->getApproved(), $message = "testSetMaxAge, test 2");

        $Report->setMaxAge($max_age);

        $this->assertEquals(80, $Report->getApproved(), $message = "testSetMaxAge, test 3");
        $this->assertNotEquals(null, $Report->getApproved(), $message = "testSetMaxAge, test 4");
        $this->assertIsInt($Report->getApproved(), $message = "testSetMaxAge, test 5");
    }
public function TestGetMinAge()
    {
        $Report = new ReportDto(null, "Broken Ankle Men Only", 9 , "2020-04-03" , "2020-07-18", "2020-07-19", 1, 80, 10, 1, 2, 3, 4);

        $this->assertIsInt($Report->getMinAge(), $message = "TestGetMinAge, test 1");
        $this->assertEquals(10, $Report->getMinAge(), $message = "TestGetMinAge, test 2");
        $this->assertNotEquals(null, $Report->getMinAge(), $message = "TestGetMinAge, test 3");
    }
    public function testSetMinAge()
    {
        $min_age = 10;
        $Report = new ReportDto(null, null, null, null, null, null, null, null, null, null, null, null, null);

        $this->assertEquals(null, $Report->getMinAge(), $message = "testSetMinAge, test 1");
        $this->assertNotEquals(1, $Report->getMinAge(), $message = "testSetMinAge, test 2");

        $Report->setMinAge($min_age);

        $this->assertEquals(10, $Report->getMinAge(), $message = "testSetMinAge, test 3");
        $this->assertNotEquals(null, $Report->getMinAge(), $message = "testSetMinAge, test 4");
        $this->assertIsInt($Report->getMinAge(), $message = "testSetMinAge, test 5");
    }
    public function TestGetMale()
    {
        $Report = new ReportDto(null, "Broken Ankle Men Only", 9 , "2020-04-03" , "2020-07-18", "2020-07-19", 1, 80, 10, 1, 2, 3, 4);

        $this->assertIsInt($Report->getMale(), $message = "TestGetMale, test 1");
        $this->assertEquals(1, $Report->getMale(), $message = "TestGetMale, test 2");
        $this->assertNotEquals(null, $Report->getMale(), $message = "TestGetMale, test 3");
    }
    public function testSetMale()
    {
        $male = 1;
        $Report = new ReportDto(null, null, null, null, null, null, null, null, null, null, null, null, null);

        $this->assertEquals(null, $Report->getMale(), $message = "testSetMale, test 1");
        $this->assertNotEquals(1, $Report->getMale(), $message = "testSetMale, test 2");

        $Report->setMale($male);

        $this->assertEquals(1, $Report->getMale(), $message = "testSetMale, test 3");
        $this->assertNotEquals(null, $Report->getMale(), $message = "testSetMale, test 4");
        $this->assertIsInt($Report->getMale(), $message = "testSetMale, test 5");
    }
    public function TestGetFemale()
    {
        $Report = new ReportDto(null, "Broken Ankle Men Only", 9 , "2020-04-03" , "2020-07-18", "2020-07-19", 1, 80, 10, 1, 2, 3, 4);

        $this->assertIsInt($Report->getFemale(), $message = "TestGetFemale, test 1");
        $this->assertEquals(2, $Report->getFemale(), $message = "TestGetFemale, test 2");
        $this->assertNotEquals(null, $Report->getFemale(), $message = "TestGetFemale, test 3");
    }
    public function testSetFemale()
    {
        $female = 2;
        $Report = new ReportDto(null, null, null, null, null, null, null, null, null, null, null, null, null);

        $this->assertEquals(null, $Report->getFemale(), $message = "testSetFemale, test 1");
        $this->assertNotEquals(2, $Report->getFemale(), $message = "testSetFemale, test 2");

        $Report->setFemale($female);

        $this->assertEquals(2, $Report->getFemale(), $message = "testSetFemale, test 3");
        $this->assertNotEquals(null, $Report->getFemale(), $message = "testSetFemale, test 4");
        $this->assertIsInt($Report->getFemale(), $message = "testSetFemale, test 5");
    }
    public function TestGetDisease()
    {
        $Report = new ReportDto(null, "Broken Ankle Men Only", 9 , "2020-04-03" , "2020-07-18", "2020-07-19", 1, 80, 10, 1, 2, 3, 4);

        $this->assertIsInt($Report->getDisease(), $message = "TestGetDisease, test 1");
        $this->assertEquals(3, $Report->getDisease(), $message = "TestGetDisease, test 2");
        $this->assertNotEquals(null, $Report->getDisease(), $message = "TestGetDisease, test 3");
    }
    public function testSetDisease()
    {
        $disease = 3;
        $Report = new ReportDto(null, null, null, null, null, null, null, null, null, null, null, null, null);

        $this->assertEquals(null, $Report->getDisease(), $message = "testSetDisease, test 1");
        $this->assertNotEquals(2, $Report->getDisease(), $message = "testSetDisease, test 2");

        $Report->setDisease($disease);

        $this->assertEquals(3, $Report->getDisease(), $message = "testSetDisease, test 3");
        $this->assertNotEquals(null, $Report->getDisease(), $message = "testSetDisease, test 4");
        $this->assertIsInt($Report->getDisease(), $message = "testSetDisease, test 5");
    }
    public function TestGetIsactive()
    {
        $Report = new ReportDto(null, "Broken Ankle Men Only", 9 , "2020-04-03" , "2020-07-18", "2020-07-19", 1, 80, 10, 1, 2, 3, 4);

        $this->assertIsInt($Report->getIsactive(), $message = "TestGetIsactive, test 1");
        $this->assertEquals(4, $Report->getIsactive(), $message = "TestGetIsactive, test 2");
        $this->assertNotEquals(null, $Report->getIsactive(), $message = "TestGetIsactive, test 3");
    }
    public function testSetIsactive()
    {
        $isactive = 4;
        $Report = new ReportDto(null, null, null, null, null, null, null, null, null, null, null, null, null);

        $this->assertEquals(null, $Report->getIsactive(), $message = "testSetIsactive, test 1");
        $this->assertNotEquals(4, $Report->getIsactive(), $message = "testSetIsactive, test 2");

        $Report->setIsactive($isactive);

        $this->assertEquals(4, $Report->getIsactive(), $message = "testSetIsactive, test 3");
        $this->assertNotEquals(null, $Report->getIsactive(), $message = "testSetIsactive, test 4");
        $this->assertIsInt($Report->getIsactive(), $message = "testSetIsactive, test 5");
    }

    public function testToString()
    {
        $Report = new ReportDto(null, "Broken Ankle Men Only", 9 , "2020-04-03" , "2020-07-18", "2020-07-19", 1, 80, 10, 1, 2, 3, 4);

        $this->assertIsString($Report->toString(), $message = "testToString, test 1");
        $this->assertEquals(" null GP appointment 2 10 2020-05-01 09:00:00 4 5 6 ", $Report->toString(), $message = "testToString, test 2");
        $this->assertNotEquals(" 2, Nurse appointment, 3 , 4, 1111-11-11 11:11:11, null, null, null ", $Report->toString(), $message = "testToString, test 3");
    }
}
?>
