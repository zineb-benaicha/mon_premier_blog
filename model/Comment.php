<?php
require_once 'Entity.php';
class Comment extends Entity{

    private $_id;
    private $_idBlog;
    private $_idUser;
    private $_content;
    private $_creationDate;
    private $_validated;

    
    const VALIDATED = true;
    const NOT_VALIDATED = false;


    //les guetteurs
    public function id() {
        return $this->_id;
    }

    public function idBlog() {
        return $this->_idBlog;
    }

    public function idUser() {
        return $this->_idUser;
    }

    public function content() {
        return $this->_content;
    }

    public function creationDate() {
        return $this->_creationDate;
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

    public function setIdBlog($idBlog) {
        
        $this->_idBlog = $idBlog;
        
    }

    public function setIdUser($idUser) {
        
        $this->_idUser = $idUser;
        
    }

    public function setContent($content) {
        if (is_string($content)) {
            $this->_content = $content;
        }
    }

    public function setCreationDate($_creationDate) {
        $this->_creationDate = $_creationDate; 
    }

    public function setValidated($validated) {
        if ($validated == Comment::VALIDATED || $validated == Comment::NOT_VALIDATED){
            $this->_validated = $validated;
        }
    }
}
