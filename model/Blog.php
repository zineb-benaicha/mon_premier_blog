<?php
require_once 'Entity.php';
class Blog extends Entity {

    private $_id;
    private $_title;
    private $_chapo;
    private $_content;
    private $_author;
    private $_lastUpdate;


    //les guetteurs
    public function id() {
        return $this->_id;
    }

    public function title() {
        return $this->_title;
    }

    public function chapo() {
        return $this->_chapo;
    }

    public function content() {
        return $this->_content;
    }

    public function author() {
        return $this->_author;
    }

    public function lastUpdate() {
        return $this->_lastUpdate;
    }

    //les setteurs
    public function setId($id) {
        $id = (int) $id;
        if ($id > 0) {
            $this->_id = $id;
        }
    }

    public function setTitle($title) {
        if (is_string($title)) {
            $this->_title = $title;
        }
    }

    public function setChapo($chapo) {
        if (is_string($chapo)) {
            $this->_chapo = $chapo;
        }
    }

    public function setContent($content) {
        if (is_string($content)) {
            $this->_content = $content;
        }
    }

    public function setAuthor($author) {
        if (is_string($author)) {
            $this->_author = $author;
        }
    }

    public function setLastUpdate($lastUpdate) {
        $this->_lastUpdate = $lastUpdate;
    }
}
