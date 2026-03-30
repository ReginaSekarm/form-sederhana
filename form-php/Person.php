<?php
class Person {
    private $firstName;
    private $lastName;
    private $phoneNumber;
    private $address;

    public function __construct($firstName, $lastName, $phoneNumber, $address) {
        $this->firstName   = $firstName;
        $this->lastName    = $lastName;
        $this->phoneNumber = $phoneNumber;
        $this->address     = $address;
    }

    public function getFullName()    { return $this->firstName . ' ' . $this->lastName; }
    public function getPhoneNumber() { return $this->phoneNumber; }
    public function getAddress()     { return $this->address; }
}
?>