<?php

namespace App;

class users{
    public $firstName;
    public $lastName;
    public $email;
    private $mailer;
    public function setMailer(Mailer $mailer){
        $this->mailer = $mailer;
    }
    public function __construct($firstName, $lastName){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
    public function getFullName(){
        return trim($this->firstName . ' ' . $this->lastName);
    }
    public function notify($message){
        return $this->mailer->sendMessage($this->email, $message);
    }
}