<?php
require_once 'Manager.class.php';
class UserManager extends Manager {
    
    public function setUser($name, $email, $password, $isAdmin){
        $db = $this->dbConnect();
        $result = $db->prepare('INSERT INTO user(name, email, password, isAdmin, isValidated) VALUES (?, ?, ?, ?, ?)');
        return $result->execute(array($name, $email, $password, $isAdmin, false));

    }
}