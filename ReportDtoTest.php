<?php
include ("ReportDto.php");
use PHPUnit\Framework\TestCase;

class ReportDtoTest extends PHPUnit\Framework\TestCase
{
 public function testConstruct()
 {
   $report = new $reportDto(1, "BROKEN ANGLE MEN ONLY, 2", "2020-04-03", "1234-12-12", "4321-21-21", 3, 4, 5, 6, 7, 8, 9);
    $this->assertIsInt($report->getId(), $message = "testConstruct, test 1");
    $this->assertIsString($report->getName(), $message = "testConstruct, test 3");
    $this->assertIsInt($report->getRequester(), $message = "testConstruct, test 1");
    $this->assertIsString($report->getRequestDate(), $message = "testConstruct, test 3");
    $this->assertIsString($report->setRequestDate(), $message = "testConstruct, test 3");
    $this->assertIsString($report->getStartDate(), $message = "testConstruct, test 3");
    $this->assertIsInt($report->getFinishDate(), $message = "testConstruct, test 1");
    $this->assertIsInt($report->setFinishDate(), $message = "testConstruct, test 1");
    $this->assertIsInt($report->getApproved(), $message = "testConstruct, test 1");
    $this->assertIsInt($report->getMaxAge(), $message = "testConstruct, test 1");
    $this->assertIsInt($report->getMinAge(), $message = "testConstruct, test 1");
    $this->assertIsInt($report->getMale(), $message = "testConstruct, test 1");
    $this->assertIsInt($report->getFemale(), $message = "testConstruct, test 1");
    $this->assertIsInt($report->getDisease(), $message = "testConstruct, test 1");
    $this->assertIsInt($report->getIsactive(), $message = "testConstruct, test 1");
 }
}
?>
