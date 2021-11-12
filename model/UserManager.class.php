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

    public function checkAccount($email, $password){
        $db = $this->dbConnect();
        $result = $db->prepare('SELECT COUNT(*) FROM user WHERE email=? AND password=?');
        $result->execute(array($email, $password));
        $numberLinesFounded = (int) $result->fetch()[0];
        return $numberLinesFounded;
    }

    public function getHashedPassword($email){
        $db = $this->dbConnect();
        $result = $db->prepare('SELECT password FROM user WHERE email=?');
        $result->execute(array($email));
        return $password = $result->fetch();
        
    }

    public function passwordUpdate($password, $email){
        $db = $this->dbConnect();
        $result = $db->prepare('UPDATE user SET password=? WHERE email=?');
        return $result->execute(array($password, $email));

    }
}
