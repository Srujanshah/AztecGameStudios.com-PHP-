<?php

namespace AztecGameStudios\Domain;

class Player {
    protected $id;
    protected $firstname;
    protected $lastname;
    protected $screenName;
    protected $dob;
    protected $email;
    protected $password;

    public function __construct() {
    }

    public static function create() {
        $instance = new self();
        return $instance;
    }

    public function getId() {return $this->id;}
    public function setId($id) {$this->id = $id; return $this;}

    public function getFirstname() {return $this->firstname;}
    public function setFirstname($firstname) {$this->firstname = $firstname; return $this;}

    public function getLastname() {return $this->lastname;}
    public function setLastname($lastname) {$this->lastname = $lastname; return $this;}

    public function getScreenName() {return $this->screenName;}
    public function setScreenName($screenName) {$this->screenName = $screenName; return $this;}

    public function getDob() {return $this->dob;}
    public function setDob($dob) {$this->dob = $dob; return $this;}

    public function getEmail() {return $this->email;}
    public function setEmail($email) {$this->email = $email; return $this;}

    public function getPassword() {return $this->password;}
    public function setPassword($password) {$this->password = $password; return $this;}

}

?>