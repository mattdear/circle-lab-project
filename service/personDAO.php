<?php
include("personDTO.php");

class personDAO
{
    private $table, $conn;

    public function __construct($conn, $table)
    {
        $this->conn = $conn;
        $this->table = $table;
    }

    //Inserting a new person
    public function addPerson($newPerson)
    {
        if ($newPerson != null && $newPerson->getId() == null && $newPerson->getFirstName() != null && $newPerson->getLastName() != null && $newPerson->getDob() != null && ($newPerson->getGender() == 0 || $newPerson->getGender() == 1)
            && $newPerson->getEmail() != null && $newPerson->getPhone() != null && $newPerson->getAddress() != null && $newPerson->getRole() != null && $newPerson->getUsername() != null && $newPerson->getPassword() != null
        && ($newPerson->getIsactive() == 0 || $newPerson->getIsactive() == 1)) {
            $stmt = $this->conn->prepare("INSERT INTO " . $this->table . "(first_name , last_name , dob , gender , email , phone , address , role , username, password , isactive) VALUES (? , ? , ? , ? , ? , ? , ? , ? , ?, ? , ? )");
            $stmt->execute([$newPerson->getFirstName(), $newPerson->getLastName(), $newPerson->getDob(), $newPerson->getGender(), $newPerson->getEmail(), $newPerson->getPhone(), $newPerson->getAddress(), $newPerson->getRole(), $newPerson->getUsername(), $newPerson->getPassword(), $newPerson->getIsactive()]);
            $id = (int)$this->conn->lastInsertId();
            $newPerson->setId($id);
            return $newPerson;
        }
    }

    //Updating a person
    public function modifyPerson($updatedPerson)
    {
        $stmt = $this->conn->prepare("UPDATE " . $this->table . " SET first_name= ? , last_name= ? , dob= ? , gender= ? , email= ? , phone= ? , address= ? , role= ? , username= ? , password= ? , isactive=?  WHERE id= ?");
        $stmt->execute([$updatedPerson->getFirstName(), $updatedPerson->getLastName(), $updatedPerson->getDob(), $updatedPerson->getGender(), $updatedPerson->getEmail(), $updatedPerson->getPhone(), $updatedPerson->getAddress(), $updatedPerson->getRole(), $updatedPerson->getUsername(), $updatedPerson->getPassword(), $updatedPerson->getIsactive(), $updatedPerson->getId()]);
    }

    //Find and return all people
    public function findAllPeople()
    {
        $stmt = $this->conn->query("SELECT * FROM " . $this->table);
        $people = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($people, new personDTO($row["id"], $row["first_name"], $row["last_name"], $row["dob"], $row["gender"], $row["email"], $row["phone"], $row["address"], $row["role"], $row["username"], $row["password"], $row["isactive"]));
        }
        return $people;
    }

    //Find person by template
    public function findMatchingPeople($personTemplate)
    {
        if ($personTemplate != null) {
            $people = [];
            $allPeople = $this->findAllPeople();
            foreach ($allPeople as $p) {
                $matching = true;
                if ($personTemplate->getFirstName() != null) {
                    if (strpos($p->getFirstName(), $personTemplate->getFirstName()) === false) {
                        $matching = false;
                    }
                }
                if ($personTemplate->getLastName() != null) {
                    if (strpos($p->getLastName(), $personTemplate->getLastName()) === false) {
                        $matching = false;
                    }
                }
                if ($personTemplate->getDob() != null) {
                    if (strpos($p->getDob(), $personTemplate->getDob()) === false) {
                        $matching = false;
                    }
                }
                if ($personTemplate->getGender() != null) {
                    if (strpos($p->getGender(), $personTemplate->getGender()) === false) {
                        $matching = false;
                    }
                }
                if ($personTemplate->getEmail() != null) {
                    if (strpos($p->getEmail(), $personTemplate->getEmail()) === false) {
                        $matching = false;
                    }
                }
                if ($personTemplate->getPhone() != null) {
                    if (strpos($p->getPhone(), $personTemplate->getPhone()) === false) {
                        $matching = false;
                    }
                }
                if ($personTemplate->getAddress() != null) {
                    if (strpos($p->getAddress(), $personTemplate->getAddress()) === false) {
                        $matching = false;
                    }
                }
                if ($personTemplate->getRole() != null) {
                    if (strpos($p->getRole(), $personTemplate->getRole()) === false) {
                        $matching = false;
                    }
                }
                if ($personTemplate->getUsername() != null) {
                    if (strpos($p->getUsername(), $personTemplate->getUsername()) === false) {
                        $matching = false;
                    }
                }
                if ($personTemplate->getPassword() != null) {
                    if (strpos($p->getPassword(), $personTemplate->getPassword()) === false) {
                        $matching = false;
                    }
                }
                if ($personTemplate->getIsactive() != null) {
                    if (strpos($p->getIsactive(), $personTemplate->getIsactive()) === false) {
                        $matching = false;
                    }
                }
                if ($matching === true) {
                    array_push($people, $p);
                }
            }
            return $people;
        }

        return null;
    }

    //Find by role
    public function findByRole($role)
    {
        if ($role != null) {
            $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE role=?");
            $stmt->execute([$role]);
            $people = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($people, new personDTO($row["id"], $row["first_name"], $row["last_name"], $row["dob"], $row["gender"], $row["email"], $row["phone"], $row["address"], $row["role"], $row["username"], $row["password"], $row["isactive"]));
            }
            return $people;
        }
        return null;
    }

    //Find by Id
    public function findPersonById($id)
    {
        if ($id != null) {
            $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE id=?");
            $stmt->execute([$id]);
            $row = $stmt->fetch();
            return new personDTO($row["id"], $row["first_name"], $row["last_name"], $row["dob"], $row["gender"], $row["email"], $row["phone"], $row["address"], $row["role"], $row["username"], $row["password"], $row["isactive"]);
        }
        return null;
    }
}

?>
