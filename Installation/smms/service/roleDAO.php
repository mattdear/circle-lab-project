<?php

/**
 * Copyright (C) 2020 Circle Lab
 *
 * Coder: Matthew Dear
 *
 * Reviwer: Joshua Alsop-Barrell
 *
 */

include("roleDTO.php");

class roleDAO
{

    private $table, $conn;

    public function __construct($conn, $table)
    {
        $this->conn = $conn;
        $this->table = $table;
    }

    public function addRole(&$roleObj)
    {
        if ($roleObj != null && $roleObj->getId() == null && $roleObj->getName() != null && $roleObj->getAccessLevel() != null) {
            $stmt = $this->conn->prepare("INSERT INTO " . $this->table . " (name, access_level) VALUES (:name, :accessLevel)");
            $stmt->execute([":name" => $roleObj->getName(), ":accessLevel" => $roleObj->getAccessLevel()]);
            $idInt = (int)$this->conn->lastInsertId();
            $roleObj->setId($idInt);
            return $roleObj;
        }
        return null;
    }

    public function modfiyRole($roleObj)
    {
        if ($roleObj != null && $roleObj->getId() != null) {
            $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE id=:id");
            $stmt->execute([":id" => $roleObj->getId()]);
            $count = $stmt->rowCount();
            $row = $stmt->fetch();
            $currentRoleObj = new roleDTO((int)$row["id"], $row["name"], (int)$row["access_level"]);
            if ($count == 1) {
                if ($roleObj->getName() != $currentRoleObj->getName() && $roleObj->getName() != null) {
                    $currentRoleObj->setName($roleObj->getName());
                }
                if ($roleObj->getAccessLevel() != $currentRoleObj->getAccessLevel() && $roleObj->getAccessLevel() != null) {
                    $currentRoleObj->setAccessLevel($roleObj->getAccessLevel());
                }
                $stmt = $this->conn->prepare("UPDATE " . $this->table . " SET name=:name, access_level=:accessLevel WHERE id=:id");
                $stmt->execute([":id" => $currentRoleObj->getId(), ":name" => $currentRoleObj->getName(), "accessLevel" => $currentRoleObj->getAccessLevel()]);
                $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE id=:id");
                $stmt->execute([":id" => $currentRoleObj->getId()]);
                $count = $stmt->rowCount();
                if ($count == 1) {
                    $row = $stmt->fetch();
                    if ($row["id"] == $currentRoleObj->getId() && $row["name"] == $currentRoleObj->getName() && $row["access_level"] == $currentRoleObj->getAccessLevel())
                        return new roleDto((int)$row["id"], $row["name"], (int)$row["access_level"]);
                }
                return null;
            }
            return null;
        }
        return null;
    }

    public function deleteRole($roleObj)
    {
        if ($roleObj != null && $roleObj->getId() != null) {
            $stmt = $this->conn->prepare("DELETE FROM " . $this->table . " WHERE id=:id");
            $stmt->execute([":id" => $roleObj->getId()]);
            $stmt = null;
            $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE id=:id");
            $stmt->execute([":id" => $roleObj->getId()]);
            $count = $stmt->rowCount();
            if ($count == 0) {
                return true;
            }
            return false;
        }
        return false;
    }

    public function findRole($roleObj)
    {
        if ($roleObj != null) {
            if ($roleObj->getId() != null) {
                $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE id=:id");
                $stmt->execute([":id" => $roleObj->getId()]);
                $count = $stmt->rowCount();
                if ($count == 1) {
                    $row = $stmt->fetch();
                    return new roleDto((int)$row["id"], $row["name"], (int)$row["access_level"]);
                }
                return null;
            } else if ($roleObj->getName() != null) {
                $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE name=:name");
                $stmt->execute([":name" => $roleObj->getName()]);
                $count = $stmt->rowCount();
                if ($count == 1) {
                    $row = $stmt->fetch();
                    return new roleDto((int)$row["id"], $row["name"], (int)$row["access_level"]);
                }
                return null;
            }
            return null;
        }
        return null;
    }

    public function findAll()
    {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table);
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            $role = new roleDTO((int)$row["id"], $row["name"], (int)$row["access_level"]);
            $roles[] = $role;
        }
        return $roles;
    }

    public function findRoleById($id)
    {
        if ($id != null) {
            $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE id=:id");
            $stmt->execute([":id" => $id]);
            $count = $stmt->rowCount();
            if ($count == 1) {
                $row = $stmt->fetch();
                return new roleDto((int)$row["id"], $row["name"], (int)$row["access_level"]);
            }
            return null;
        }
        return null;
    }

}

?>
