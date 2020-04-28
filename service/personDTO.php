<?php


class personDTO
{
    private $id, $first_name, $last_name, $dob, $gender, $email, $phone, $address, $role, $username, $password, $isactive;

    public function __construct($id, $first_name, $last_name, $dob, $gender, $email, $phone, $address, $role, $username, $password, $isactive)
    {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->dob = $dob;
        $this->gender = $gender;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->role = $role;
        $this->username = $username;
        $this->password = $password;
        $this->isactive = $isactive;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    public function getDob()
    {
        return $this->dob;
    }

    public function setDob($dob)
    {
        $this->dob = $dob;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getIsactive()
    {
        return $this->isactive;
    }

    public function setIsactive($isactive)
    {
        $this->isactive = $isactive;
    }

    public function toString()
    {
        $string = " " . $this->id . " " . $this->first_name . " " . $this->last_name . " " . $this->dob . " " . $this->gender . " " . $this->email . " " . $this->phone . " " . $this->address . " " . $this->role . " " . $this->username . " " . $this->password . " " . $this->isactive;
        return $string;
    }
}

?>
