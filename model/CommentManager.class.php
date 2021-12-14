<?php
require_once 'Manager.class.php';

class CommentManager extends Manager {

    public function commentsCounter(int $idBlog) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT count(*) FROM comment WHERE id_blog = :id AND is_validated = :validation');
        $req->execute(['id' => $idBlog, 'validation' => 1]);
        return $req->fetch()[0];

    }

    public function getComments($idBlog) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM comment JOIN user ON comment.id_user = user.id WHERE comment.id_blog = :id AND comment.is_validated = :validation ORDER BY creation_date DESC');
        $req->execute(['id' => $idBlog, 'validation' => 1]);

         while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
            {
                $comments[] = new Comment($donnees);
            }
        return $comments;
    }

    public function setComment(Comment $comment) {

        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO comment(id_blog, id_user, content, creation_date, is_validated) VALUES(?, ?, ?, NOW(), ?)');
        return $req->execute(array($comment->idBlog(), $comment->idUser(), $comment->content(), 0));

    }

    public function getAllComments() {
        $db = $this->dbConnect();
        $commentsList = $db->query('SELECT id, id_blog, id_user, content, is_validated, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date FROM comment ORDER BY creation_date DESC');
        return $commentsList;
    }

    public function getAllCommentsNumber() {
        $db = $this->dbConnect();
        $commentsNumber = $db->query('SELECT COUNT(*) FROM comment');
        return $commentsNumber;
    }

    public function deleteComment($id) {
        $db = $this->dbConnect();
        $query = $db->prepare('DELETE FROM comment WHERE id = :id');
        return $query->execute(['id' => $id]);
    }

    public function validateComment($id) {
        $db = $this->dbConnect();
        $query = $db->prepare('UPDATE comment SET is_validated = ?  WHERE id = ?');
        return $query->execute(array(1, $id));
    }

    public function deleteCommentsByBlog($id_blog) {
        $db = $this->dbConnect();
        $query = $db->prepare('DELETE FROM comment WHERE id_blog = :id');
        return $query->execute(['id' => $id_blog]);

    }

}
