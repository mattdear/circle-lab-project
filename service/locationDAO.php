<?php
include("locationDTO.php");

class locationDAO
{
    private $table, $conn;

    public function __construct($conn, $table)
    {
        $this->conn = $conn;
        $this->table = $table;
    }

    //Inserting a new location
    public function addLocation($newLocation)
    {
        if ($newLocation != null && $newLocation->getId() == null && $newLocation->getAddressLine() != null && $newLocation->getCity() != null && $newLocation->getPostcode() != null && $newLocation->getType() != null && $newLocation->getIsactive() == 1) {
            $stmt = $this->conn->prepare("INSERT INTO " . $this->table . "(address_line , city , postcode, type, isactive) VALUES (? , ? , ? , ? , ?)");
            $stmt->execute([$newLocation->getAddressLine(), $newLocation->getCity(), $newLocation->getPostcode(), $newLocation->getType(), $newLocation->getIsactive()]);
            $id = (int)$this->conn->lastInsertId();
            $newLocation->setId($id);
            return $newLocation;
        }
        return null;
    }

    //Updating a location
    public function modifyLocation($updatedLocation)
    {
        $stmt = $this->conn->prepare("UPDATE " . $this->table . " SET address_line= ? , city= ? , postcode= ? , type=? , isactive = ? WHERE id= ?");
        $stmt->execute([$updatedLocation->getAddressLine(), $updatedLocation->getCity(), $updatedLocation->getPostcode(), $updatedLocation->getType(), $updatedLocation->getIsactive(), $updatedLocation->getId()]);
    }

    //Find and return all locations
    public function findAllLocations()
    {
        $stmt = $this->conn->query("SELECT * FROM " . $this->table);
        $locations = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($locations, new locationDTO($row["id"], $row["address_line"], $row["city"], $row["postcode"], $row["type"], $row["isactive"]));
        }
        return $locations;
    }

    //Find location by template
    public function findMatchingLocations($locationTemplate)
    {
        if ($locationTemplate != null) {
            if ($locationTemplate->getId() != null) {
                $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE id=?");
                $stmt->execute([$locationTemplate->getId()]);
                $count = $stmt->rowCount();
                if ($count == 1) {
                    $row = $stmt->fetch();
                    return new locationDTO($row["id"], $row["address_line"], $row["city"], $row["postcode"], $row["type"], $row["isactive"]);
                }
            } elseif ($locationTemplate->getAddressLine() != null) {
                $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE address_line=?");
                $stmt->execute([$locationTemplate->getAddressLine()]);
                $count = $stmt->rowCount();
                if ($count == 1) {
                    $row = $stmt->fetch();
                    return new locationDTO($row["id"], $row["address_line"], $row["city"], $row["postcode"], $row["type"], $row["isactive"]);
                }
            } elseif ($locationTemplate->getCity() != null) {
                $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE city=?");
                $stmt->execute([$locationTemplate->getCity()]);
                $count = $stmt->rowCount();
                if ($count == 1) {
                    $row = $stmt->fetch();
                    return new locationDTO($row["id"], $row["address_line"], $row["city"], $row["postcode"], $row["type"], $row["isactive"]);
                }
            } elseif ($locationTemplate->getPostcode() != null) {
                $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE postcode=?");
                $stmt->execute([$locationTemplate->getPostcode()]);
                $count = $stmt->rowCount();
                if ($count == 1) {
                    $row = $stmt->fetch();
                    return new locationDTO($row["id"], $row["address_line"], $row["city"], $row["postcode"], $row["type"], $row["isactive"]);
                }
            } elseif ($locationTemplate->getType() != null) {
                $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE type=?");
                $stmt->execute([$locationTemplate->getType()]);
                $count = $stmt->rowCount();
                if ($count == 1) {
                    $row = $stmt->fetch();
                    return new locationDTO($row["id"], $row["address_line"], $row["city"], $row["postcode"], $row["type"], $row["isactive"]);
                }
            }
            return null;
        }
        return null;
    }

    //Find by type
    public function findLocationByType($type)
    {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE type=?");
        $stmt->execute([$type]);
        $locations = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($locations, new locationDTO($row["id"], $row["address_line"], $row["city"], $row["postcode"], $row["type"], $row["isactive"]));
        }
        return $locations;
    }

    //Find by Id
    public function findLocationById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE id=?");
        $stmt->execute([$id]);
        $count = $stmt->rowCount();
        if ($count == 1) {
            $row = $stmt->fetch();
            return new locationDTO($row["id"], $row["address_line"], $row["city"], $row["postcode"], $row["type"], $row["isactive"]);
        }
    }
}

?>
