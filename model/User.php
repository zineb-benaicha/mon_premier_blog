<?php
require_once 'Entity.php';
class User extends Entity{

    private $_id;
    private $_email;
    private $_password;
    private $_name;
    private $_type;
    private $_validated;

    const IS_ADMIN = '1';
    const NOT_ADMIN = '0';
    const VALIDATED = true;
    const NOT_VALIDATED = false;


    //les guetteurs
    public function id() {
        return $this->_id;
    }

    public function email() {
        return $this->_email;
    }

    public function password() {
        return $this->_password;
    }

    public function name() {
        return $this->_name;
    }

    public function type() {
        return $this->_type;
    }

    public function validated() {
        return $this->_validated;
    }

    //les setteurs
    public function setId($id) {
        $id = (int) $id;
        if ($id > 0) {
            $this->_id = $id;
        }
    }

    public function setEmail($email) {
        if (is_string($email)) {
            $this->_email = $email;
        }
    }

    public function setPassword($password) {
        if (is_string($password)) {
            $this->_password = $password;
        }
    }

    public function setName($name) {
        if (is_string($name)) {
            $this->_name = $name;
        }
    }

    public function setType($type) {
        if ($type == User::IS_ADMIN || $type == User::NOT_ADMIN){
            $this->_type = $type;

        }  
    }

    public function setValidated($validated) {
        if ($validated == User::VALIDATED || $validated == User::NOT_VALIDATED){
            $this->_validated = $validated;
        }
    }
}
