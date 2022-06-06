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

    public function setFirstname($firstName) 
    {
        if(empty($firstName)) {
            throw new Exception("Firstname is required");
        }

        $this->firstName = $firstName;
        return $this;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setLastName($lastName) 
    {
        if(empty($lastName)) {
            throw new Exception("Lastname is required");
        }
        $this->lastName = $lastName;
        return $this;
    }

    public function getLastName() 
    {
        return $this->lastName;
    }

    public function setEmail($email)
    {
        // email cannot be empty
        if (empty($email)) {
            throw new Exception("Email cannot be empty.");
        }
        if ( $this->getByEmail($email) ) {
            throw new Exception("Email already exists.");
        }

        $this->email = $email;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setBackupEmail($backupEmail)
    {
        // email cannot be empty
        if (empty($backupEmail)) {
            throw new Exception("Email cannot be empty.");
        }
        if ($this->getByEmail($backupEmail)) {
            throw new Exception("Email already exists.");
        }

        $this->backupEmail = $backupEmail;

        return $this;
    }

    public function getBackupEmail()
    {
        return $this->backupEmail;
    }

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

        // hash the incoming value of password
        $options = [
            'cost' => 11,
        ];

        $password2 = password_hash($password, PASSWORD_DEFAULT, $options);

        $this->password = $password2;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }
        
    public function setFunction($function)
    {
        $this->function = $function;
        return $this;
    }

    public function getFunction()
    {
        return $this->function;
    }

    public function setBio($bio) 
    {
        $this->bio = $bio;
        return $this;
    }

    public function getBio() 
    {
        return $this->bio;
    }

    // this function checks if a user can login with the password and user provided
    public function canLogin($email, $password)
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare("select * from users where email = :email");
        $statement->bindValue(":email", $email);

        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            // er is een onbestaande gebruiker ingevuld
            throw new Exception("Er is geen account gevonden met deze gegevens");
            return false;
        }

        //var_dump($user);

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

    public function register()
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare("insert into users (firstname, lastname, email, password) values (:firstname, :lastname, :email, :password)");
        $statement->bindValue(":firstname", $this->firstName);
        $statement->bindValue(":lastname", $this->lastName);
        $statement->bindValue(":email", $this->email);
        $statement->bindValue(":password", $this->password);
        return $statement->execute();
    }

    public static function getUser($id) 
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare("select * from users where id = :id");
        $statement->bindValue(":id", $id);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    public function getByEmail($email) 
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare("select * from users where email = :email");
        $statement->bindValue(":email", $email);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    public function update($id) 
    {
        $conn = DB::getConnection();
        $statement = $conn->prepare("update users set firstname = :firstname, lastname = :lastname, backup_email = :backupEmail, bio = :bio where id = :id");
        $statement->bindValue(":firstname", $this->firstName);
        $statement->bindValue(":lastname", $this->lastName);
        $statement->bindValue(":backupEmail", $this->backupEmail);
        $statement->bindValue(":bio", $this->bio);
        $statement->bindValue(":id", $id);
        return $statement->execute();
    }
}