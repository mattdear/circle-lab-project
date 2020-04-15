<?php
include(__DIR__."\..\DTO\LocationDto.php");

class LocationDao
{
    private $table, $conn ;

    public function __construct($conn , $table){
        $this->conn = $conn;
        $this->table = $table;
    }

    //Inserting a new location
    public function insertLocation(LocationDto  $newLocation){
        $stmt = $this->conn->prepare("INSERT INTO " . $this->table .  "(name , address , type) VALUES (? , ? , ? )");
        $stmt->execute([$newLocation->getName(), $newLocation->getAddress(), $newLocation->getType()]);
        $id = (int)$this->conn->lastInsertId();
        $newLocation->setId($id);
        return $newLocation;

    }

    //Updating a location
    public function updateLocation(LocationDto $updatedLocation){
        $stmt = $this->conn->prepare("UPDATE " . $this->table .  " SET name= ? , address= ? , type= ?  WHERE id= ?");
        $stmt->execute([$updatedLocation->getName(), $updatedLocation->getAddress(), $updatedLocation->getType() , $updatedLocation->getId()]);
    }

    //Find and return all locations
    public function findAllLocations(){
        $stmt = $this->conn->query("SELECT * FROM ".  $this->table);
        $locations = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($locations, new LocationDto($row["id"], $row["name"], $row["address"],$row["type"]));
        }
        return $locations;
    }

    //Find location by template
    public function findMatchingLocations(LocationDto $locationTemplate){
        $locations = [];
        $allLocations = $this->findAllLocations();
        $matching = true;
        foreach ($allLocations as $l){
          $matching = true;
            if($locationTemplate->getName() != null) {
                if (strpos($l->getName(), $locationTemplate->getName()) === false) {
                    $matching = false;
                }
            }
            if($locationTemplate->getAddress() != null) {
                if (strpos($l->getAddress(), $locationTemplate->getAddress()) === false) {
                    $matching = false;
                }
            }
            if($locationTemplate->getType() != null) {
                if (strpos($l->getType(), $locationTemplate->getType()) === false){
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
    public function findByType($type){
        $stmt = $this->conn->prepare("SELECT * FROM ".  $this->table .  " WHERE type=?");
        $stmt->execute([$type]);
        $locations = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($locations, new LocationDto($row["id"], $row["name"], $row["address"],$row["type"]));
        }
        return $locations;
    }

    //Find by Id
    public function findLocationById($id){
        $stmt = $this->conn->prepare("SELECT * FROM ".  $this->table .  " WHERE id=?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        return new LocationDto($row["id"], $row["name"], $row["address"],$row["type"]);
    }
}
