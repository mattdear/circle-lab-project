<?php
include("locationDTO.php");

class locationDAO
{
    private $table, $conn ;

    public function __construct($conn , $table){
        $this->conn = $conn;
        $this->table = $table;
    }

    //Inserting a new location
    public function addLocation($newLocation){
		if($newLocation != null && $newLocation->getId() == null && $newLocation->getAddressLine() != null && $newLocation->getCity() != null && $newLocation->getPostcode() != null && $newLocation->getType() != null && $newLocation->getIsactive() == 1)
    {
			$stmt = $this->conn->prepare("INSERT INTO " . $this->table .  "(address_line , city , postcode, type, isactive) VALUES (? , ? , ? , ? , ?)");
			$stmt->execute([$newLocation->getAddressLine(), $newLocation->getCity(), $newLocation->getPostcode(), $newLocation->getType() , $newLocation->getIsactive()]);
			$id = (int)$this->conn->lastInsertId();
			$newLocation->setId($id);
			return $newLocation;
		}
		return null;
    }

    //Updating a location
    public function modifyLocation($updatedLocation){
      $stmt = $this->conn->prepare("UPDATE " . $this->table .  " SET address_line= ? , city= ? , postcode= ? , type=? , isactive = ? WHERE id= ?");
		  $stmt->execute([$updatedLocation->getAddressLine(), $updatedLocation->getCity() , $updatedLocation->getPostcode(), $updatedLocation->getType() , $updatedLocation->getIsactive(), $updatedLocation->getId()]);
    }

    //Find and return all locations
    public function findAllLocations(){
        $stmt = $this->conn->query("SELECT * FROM ".  $this->table);
        $locations = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($locations, new locationDTO($row["id"], $row["address_line"], $row["city"],$row["postcode"], $row["type"], $row["isactive"]));
        }
        return $locations;
    }

    //Find location by template
    public function findMatchingLocations($locationTemplate){
        $locations = [];
        $allLocations = $this->findAllLocations();
        $matching = true;
        foreach ($allLocations as $l){
          $matching = true;
            if($locationTemplate->getAddressLine() != null) {
                if (strpos($l->getAddressLine(), $locationTemplate->getAddressLine()) === false) {
                    $matching = false;
                }
            }
            if($locationTemplate->getCity() != null) {
                if (strpos($l->getCity(), $locationTemplate->getCity()) === false) {
                    $matching = false;
                }
            }
            if($locationTemplate->getPostcode() != null) {
                if (strpos($l->getPostcode(), $locationTemplate->getPostcode()) === false){
                    $matching = false;
                }
            }
			if($locationTemplate->getType() != null) {
                if (strpos($l->getType(), $locationTemplate->getType()) === false) {
                    $matching = false;
                }
            }
			if($locationTemplate->getIsactive() != null) {
                if (strpos($l->getIsactive(), $locationTemplate->getIsactive()) === false) {
                    $matching = false;
                }
            }
            if($matching === true){
                array_push($locations, $l);
            }
        }
        return $locations;
    }

    //Find by type
    public function findLocationByType($type){
        $stmt = $this->conn->prepare("SELECT * FROM ".  $this->table .  " WHERE type=?");
        $stmt->execute([$type]);
        $locations = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($locations,new locationDTO($row["id"], $row["address_line"], $row["city"],$row["postcode"], $row["type"], $row["isactive"]));
        }
        return $locations;
    }

    //Find by Id
    public function findLocationById($id){
        $stmt = $this->conn->prepare("SELECT * FROM ".  $this->table .  " WHERE id=?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        return new locationDTO($row["id"], $row["address_line"], $row["city"],$row["postcode"], $row["type"], $row["isactive"]);
    }
}

?>
