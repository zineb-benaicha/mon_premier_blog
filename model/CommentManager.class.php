<?php
require_once 'Manager.class.php';

class CommentManager extends Manager{
    
    public function commentsCounter(int $idBlog)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT count(*) FROM comment WHERE id_blog = :id');
        $req->execute(['id' => $idBlog]);
        return $req->fetch()[0];

    }

    public function getComments($idBlog){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * From Comment WHERE id_blog = :id ORDER BY creation_date DESC');
        $req->execute(['id' => $idBlog]);
        return $req;
    }

}
