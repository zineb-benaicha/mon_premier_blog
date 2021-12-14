<?php
require_once 'Entity.php';
class User extends Entity{

    private $_id;
    private $_email;
    private $_password;
    private $_name;
    private $_is_admin;
    private $_is_validated;

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

    public function is_admin() {
        return $this->_is_admin;
    }

    public function is_validated() {
        return $this->_is_validated;
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

    public function setIs_admin($type) {
        $this->_is_admin = $type;
    }

    public function setIs_validated($validated) {
        $this->_is_validated = $validated;
    }
}
