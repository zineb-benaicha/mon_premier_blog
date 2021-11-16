<?php
require_once 'Manager.class.php';
class UserManager extends Manager {
    
    public function setUser($name, $email, $password, $isAdmin, $isValidated){
        $db = $this->dbConnect();
        $result = $db->prepare('INSERT INTO user(name, email, password, is_Admin, is_Validated) VALUES (?, ?, ?, ?, ?)');
        
        return $result->execute(array($name, $email, $password, $isAdmin, $isValidated));
    }
    
    public function userEmailsNumber($email){
        $db = $this->dbConnect();
        $result = $db->prepare('SELECT COUNT(*) FROM user WHERE email= :email');
        $result->execute(array('email'=> $email));
        $numberEmails = $result->fetch();
        return (int) $numberEmails[0];
    }

    public function getHashedPassword($email){
        $db = $this->dbConnect();
        $result = $db->prepare('SELECT password FROM user WHERE email=?');
        $result->execute(array($email));
        return $hashedPassword = $result->fetch();
        
    }

    public function passwordUpdate($password, $email){
        $db = $this->dbConnect();
        $result = $db->prepare('UPDATE user SET password=? WHERE email=?');
        return $result->execute(array($password, $email));

    }

    public function isAdmin($email)
    {
        $db = $this->dbConnect();
        $result = $db->prepare('SELECT is_admin FROM user WHERE email=?');
        $result->execute(array($email));
        $isAdmin = $result->fetch();
        return $isAdmin;
    }

    public function isValidated($email)
    {
        $db = $this->dbConnect();
        $result = $db->prepare('SELECT is_validated FROM user WHERE email=?');
        $result->execute(array($email));
        $isValidated = $result->fetch();
        return $isValidated;
    }

    public function getUser($email){
        $db = $this->dbConnect();
        $user = $db->prepare('SELECT * FROM user WHERE email=?');
        $result = $user->execute(array($email));
        
        if($result){
            return $user->fetch();
        }
        else{
            return false;
        }
    }
}
