<?php

include_once(__DIR__ . "/DB.php");

class User
{
    private $firstName;
    private $lastName;
    private $email;
    private $backupEmail;
    private $password;
    public $function;
    private $bio;
        
    public function setFunction($course)
    {
        $this->course = $course;
        return $this;
    }

    public function getFunction()
    {
        return $this->function;
    }

    public function setBio($bio) {
        $this->bio = $bio;
    }

    public function getBio() {
        return $this->bio;
    }

    // get value of username
    public function getFirstName()
    {
        return $this->username;
    }

    // set value of username
    public function setUsername($username)
    {
        // username cannot be empty
        if (empty($username)) {
            throw new Exception("Username cannot be empty.");
        }

        $this->username = $username;

        return $this;
    }

    // get value of email
    public function getEmail()
    {
        return $this->email;
    }

    // set value of email
    public function setEmail($email)
    {
        // email cannot be empty
        if (empty($email)) {
            throw new Exception("Email cannot be empty.");
        }

        // email has to end with '@student.thomasmore.be' or '@thomasmore.be'
        if (!str_ends_with($email, "@student.thomasmore.be") && !str_ends_with($email, "@thomasmore.be")) {
            throw new Exception("Email format is invalid.");
        }

        $this->email = $email;

        return $this;
    }

    // get value of backup email
    public function getBackupEmail()
    {
        return $this->backupEmail;
    }

    // set value of backup email
    public function setBackupEmail($backupEmail)
    {
        // backup email cannot be empty
        if (empty($backupEmail)) {
            throw new Exception("Email cannot be empty.");
        }

        $this->backupEmail = $backupEmail;

        return $this;
    }

    // get value of password
    public function getPassword()
    {
        return $this->password;
    }

    // set value of password
    public function setPassword($password)
    {
        // password length should be 6 or longer
        if (strlen($password) < 5) {
            throw new Exception("Password must be longer than 5 characters.");
        }

        // password cannot be empty
        if (empty($password)) {
            throw new Exception("Password cannot be empty.");
        }

        $this->password = $password;
        return $this;
    }

    // this function checks if a user can login with the password and user provided
    public function canLogin($email, $password)
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare("select * from users where email = :email OR backup_email = :email");
        $statement->bindValue(":email", $email);

        // $backupEmail = $this->getBackupEmail();
        // $statement->bindValue(":backup_email", $backupEmail);

        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            // er is een onbestaande gebruiker ingevuld
            throw new Exception("We couldn't find an account matching the email and password you entered. Please check your email and password and try again.");
            return false;
        } 

        $hash = $user["password"];

        if (password_verify($password, $hash)) {
            // password is correct
            return true;
        } else {
            // password is incorrect
            throw new Exception("Password is incorrect.");
            return false;
        }

        return $this;
    }

    public static function getUser($id) {
        $conn = DB::getConnection();
        $statement = $conn->prepare("select * from users where id = :id");
        $statement->bindValue(":id", $id);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        return $user;
    }
}