<?php
require_once 'Manager.class.php';

class CommentManager extends Manager
{

    public function commentsCounter(int $idBlog)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT count(*) FROM comment WHERE id_blog = :id');
        $req->execute(['id' => $idBlog]);
        return $req->fetch()[0];

    }

    public function getComments($idBlog)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM comment JOIN user ON comment.id_user = user.id WHERE comment.id_blog = :id AND comment.is_validated = :validation ORDER BY creation_date DESC');
        $req->execute(['id' => $idBlog, 'validation' => 1]);
        return $req;
    }

    public function setComment($id_blog, $id_user, $comment_content)
    {

        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO comment(id_blog, id_user, content, creation_date, is_validated) VALUES(?, ?, ?, NOW(), ?)');
        return $req->execute(array($id_blog, $id_user, $comment_content, 0));

    }

}
