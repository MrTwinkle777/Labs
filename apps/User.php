<?php

namespace App;


use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\{Length, NotBlank, Positive, Regex, Email};

use DateTime;


class User
{
    public int $id;
    public string $name;
    public string $password;
    public string $mail;
    public DateTime $dateCreate;

    function __construct($id, $name, $password, $mail)
    {

        $flag = true;

        $validator = Validation::createValidator();

        //User ID
        $violations = $validator->validate($id, [
            new Positive(),
            new NotBlank(),
        ]);
        if (0 !== count($violations)) {
            $flag = false;
            foreach ($violations as $violation) {
                echo "ID: " . $violation->getMessage()."<br>";
            }
        }

        //User NAME
        $violations = $validator->validate($name, [
            new Regex('/^[A-Z]{1}[a-z]{1,}$/'),
            new Length(['min' => 2,'max'=>20]),
            new NotBlank(),
        ]);
        if (0 !== count($violations)) {
            $flag = false;
            foreach ($violations as $violation) {
                echo "Name: " . $violation->getMessage()."<br>";
            }
        }

        //User Password
        $violations = $validator->validate($password, [
            new Regex('/(?=.*[0-9])(?=.*[a-z])/'),
            new Length(['min' => 8,'max'=>20]),
            new NotBlank(),

        ]);
        if (0 !== count($violations)) {
            $flag = false;
            foreach ($violations as $violation) {
                echo "Password: " . $violation->getMessage()."<br>";
            }
        }

        //User MAIL
        $violations = $validator->validate($mail, [
            new Email(),
            new NotBlank(),
        ]);
        if (0 !== count($violations)) {
            $flag = false;
            foreach ($violations as $violation) {
                echo "Mail: " . $violation->getMessage()."<br>";
            }
        }


        if ($flag == true)
        {
            $this->id = $id;
            $this->name = $name;
            $this->mail = $mail;
            $this->password = $password;
            $this->dateCreate = new DateTime("now");
        }

        
    }

    function getInfo()
    {
        echo "ID: {$this->id}"."<br>";
        echo "Name: {$this->name}"."<br>";
        echo "Mail: {$this->mail}"."<br>";
        echo "Password: {$this->password}"."<br>";
        echo "<br>";
    }

    function getDateTimeCreated(){
        return $this->dateCreate;
    }
}

?>
