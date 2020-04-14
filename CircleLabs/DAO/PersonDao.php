<?php
include("../DTO/PersonDto.php");

class PersonDao
{
    private $table, $conn;

    public function __construct($conn , $table){
        $this->conn = $conn;
        $this->table = $table;
    }

    //Inserting a new person
    public function insertPerson(PersonDto $newPerson){
        $stmt = $this->conn->prepare("INSERT INTO " . $this->table .  "(first_name , last_name , dob , gender , email , phone , address , role , username, password) VALUES (? , ? , ? , ? , ? , ? , ? , ? , ?, ? )");
        $stmt->execute([$newPerson->getFirstName(), $newPerson->getLastName(), $newPerson->getDob() , $newPerson->getGender(), $newPerson->getEmail() , $newPerson->getPhone(), $newPerson->getAddress() , $newPerson->getRole(), $newPerson->getUsername(), $newPerson->getPassword()]);
        $id = (int)$this->conn->lastInsertId();
        $newPerson->setId($id);
        return $newPerson;

    }

    //Updating a person
    public function updatePerson(PersonDto $updatedPerson){
        $stmt = $this->conn->prepare("UPDATE " . $this->table .  " SET first_name= ? , last_name= ? , dob= ? , gender= ? , email= ? , phone= ? , address= ? , role= ? , username= ? , password= ? , WHERE ID= ? ");
        $stmt->execute([$updatedPerson->getFirstName(), $updatedPerson->getLastName(), $updatedPerson->getDob() , $updatedPerson->getGender(), $updatedPerson->getEmail() , $updatedPerson->getPhone(), $updatedPerson->getAddress() , $updatedPerson->getRole(), $updatedPerson->getUsername(), $updatedPerson->getPassword(), $updatedPerson.getId()]);
    }

    //Find and return all people
    public function findAllPeople(){
        $stmt = $this->conn->query("SELECT * FROM ".  $this->table);
        $people = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($people, new Person($row["ID"], $row["first_name"], $row["last_name"],$row["dob"], $row["gender"], $row["email"],$row["phone"], $row["address"], $row["role"], $row["username"], $row["password"]));
        }
        return $people;
    }

    //Find person by template
    public function findMatchingPeople(PersonDto $personTemplate){
        $people = [];
        $allPeople = $this->findAllPeople();
        $matching = true;
        foreach ($allPeople as $p){
            if($personTemplate->getFirstName() != null) {
                if (!$p->getFirst_Name()->contains($personTemplate->getFirstName())) {
                    $matching = false;
                }
            }
            if($personTemplate->getLastName() != null) {
                if (!$p->getLast_Name()->contains($personTemplate->getLastName())) {
                    $matching = false;
                }
            }
            if($personTemplate->getDob() != null) {
                if (!$p->getDob()->contains($personTemplate->getDob())){
                    $matching = false;
                }
            }
            if($personTemplate->getGender() != null) {
                if (!$p->getGender()->contains($personTemplate->getGender())) {
                    $matching = false;
                }
            }
            if($personTemplate->getEmail() != null) {
                if (!$p->getEmail()->contains($personTemplate->getEmail())) {
                    $matching = false;
                }
            }
            if($personTemplate->getPhone() != null) {
                if (!$p->getPhone()->contains($personTemplate->getPhone())) {
                    $matching = false;
                }
            }
            if($personTemplate->getAddress() != null) {
                if (!$p->getAddress()->contains($personTemplate->getAddress())) {
                    $matching = false;
                }
            }
            if($personTemplate->getRole() != null) {
                if (!$p->getRole()->contains($personTemplate->getRole())) {
                    $matching = false;
                }
            }
            if($personTemplate->getUsername() != null) {
                if (!$p->getUsername()->contains($personTemplate->getUsername())) {
                    $matching = false;
                }
            }
            if($personTemplate->getPassword() != null) {
                if (!$p->getPassword()->contains($personTemplate->getPassword())) {
                    $matching = false;
                }
            }
            if(matching){
                    array_push($people, p);
            }
        }
        return $people;
    }

    //Find by role
    public function findByRole(Role $role){
        $stmt = $this->conn->prepare("SELECT * FROM ".  $this->table .  " WHERE role=?");
        $stmt->execute([$role]);
        $people = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($people, new PersonDto($row["id"], $row["first_name"], $row["last_name"],$row["dob"], $row["gender"], $row["email"],$row["phone"], $row["address"], $row["role"], $row["username"], $row["password"]));
        }
        return $people;
    }

    //Find by Id
    public function findPersonById($id){
        $stmt = $this->conn->prepare("SELECT * FROM ".  $this->table .  " WHERE id=?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        return new PersonDto($row["id"], $row["first_name"], $row["last_name"],$row["dob"], $row["gender"], $row["email"],$row["phone"], $row["address"], $row["role"], $row["username"], $row["password"]);
    }
}