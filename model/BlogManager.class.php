<?php
require_once 'Manager.class.php';

class BlogManager extends Manager
{

    public function blogsNumber()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT COUNT(*) FROM blog');
        $result = $req->fetch();
        return $result[0];
    }

    public function getBlogs()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, chapo, author, DATE_FORMAT(last_update, \'%d/%m/%Y à %Hh%imin%ss\') AS last_update FROM blog ORDER BY last_update DESC');
        return $req;
    }

    public function getBlog($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, chapo, content, DATE_FORMAT(last_update, \'%d/%m/%Y à %Hh%imin%ss\') AS last_update, author FROM blog WHERE id = :id');
        $req->execute(['id' => $id]);
        return $req->fetch();
    }

    public function getAllBlogsNumber()
    {
        $db = $this->dbConnect();
        $blogsNumber = $db->query('SELECT COUNT(*) FROM blog');
        return $blogsNumber;
    }

    public function removeBlog($id_blog)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('DELETE FROM blog WHERE id = :id');
        return $query->execute(['id' => $id_blog]);
    }

}
