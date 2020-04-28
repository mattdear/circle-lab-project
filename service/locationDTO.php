<?php


class locationDTO
{
    private $id, $address_line, $city, $postcode, $type, $isactive;

    public function __construct($id, $address_line, $city, $postcode, $type, $isactive)
    {
        $this->id = $id;
        $this->address_line = $address_line;
        $this->city = $city;
        $this->postcode = $postcode;
        $this->type = $type;
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

    public function getAddressLine()
    {
        return $this->address_line;
    }

    public function setAddressLine($address_line)
    {
        $this->address_line = $address_line;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getPostcode()
    {
        return $this->postcode;
    }

    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
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
        $string = $this->id . " , " . $this->address_line . " , " . $this->city . " , " . $this->postcode . " , " . $this->type . " , " . $this->isactive;
        return $string;
    }
}

?>
