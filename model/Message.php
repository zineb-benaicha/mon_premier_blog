<?php
require_once 'Entity.php';
class Message extends Entity{

    private $_id;
    private $_firstName;
    private $_lastName;
    private $_email;
    private $_content;


    
    //les guetteurs
    public function id() {
        return $this->_id;
    }

    public function firstName() {
        return $this->_firstName;
    }

    public function lastName() {
        return $this->_lastName;
    }

    public function email() {
        return $this->_email;
    }

    public function content() {
        return $this->_content;
    }

    

    //les setteurs
    public function setId($id) {
        $id = (int) $id;
        if ($id > 0) {
            $this->_id = $id;
        }
    }

    public function setFirstName($firstName) {
        
        $this->_firstName = $firstName;
        
    }

    public function setLastName($lastName) {
        
        $this->_lastName = $lastName;
        
    }

    public function setEmail($email) {
        
        $this->_email = $email;
        
    }

    public function setContent($content) {
        if (is_string($content)) {
            $this->_content = $content;
        }
    }

}
