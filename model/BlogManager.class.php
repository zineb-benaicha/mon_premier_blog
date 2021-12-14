<?php
require_once 'Manager.class.php';

class BlogManager extends Manager {

    public function blogsNumber() {
        $db = $this->dbConnect();
        $req = $db->query('SELECT COUNT(*) FROM blog');
        $result = $req->fetch();
        return $result[0];
    }

    public function getBlogs() {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, chapo, author, DATE_FORMAT(last_update, \'%d/%m/%Y à %Hh%imin%ss\') AS last_update FROM blog ORDER BY last_update DESC');
        while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
            {
                $blogs[] = new Blog($donnees);
            }
        return $blogs;
    }

    public function getBlog($id) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, chapo, content, DATE_FORMAT(last_update, \'%d/%m/%Y à %Hh%imin%ss\') AS last_update, author FROM blog WHERE id = :id');
        $req->execute(['id' => $id]);
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        return new Blog($donnees);
    }

    public function getAllBlogsNumber() {
        $db = $this->dbConnect();
        $blogsNumber = $db->query('SELECT COUNT(*) FROM blog');
        return $blogsNumber;
    }

    public function removeBlog($id_blog) {
        $db = $this->dbConnect();
        $query = $db->prepare('DELETE FROM blog WHERE id = :id');
        return $query->execute(['id' => $id_blog]);
    }

    public function getBlogInformations($id_blog) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, chapo, content, author FROM blog WHERE id = :id');
        $req->execute(['id' => $id_blog]);
        return $req;
    }

    public function updateBlog($id_blog, $title, $chapo, $author, $content) {
        $db = $this->dbConnect();
        $query = $db->prepare('UPDATE blog SET title = :title, chapo = :chapo, content = :content, author = :author, last_update = NOW() WHERE id = :id');
        return $query->execute(['title' => $title, 'chapo' => $chapo, 'author' => $author, 'content' => $content, 'id' => $id_blog]);
    }

    public function setBlog($title, $chapo, $author, $content) {
        $db = $this->dbConnect();
        $query = $db->prepare('INSERT INTO blog (title, chapo, author, content, last_update) VALUES (:title, :chapo, :author, :content, NOW())');
        return $query->execute(['title' => $title, 'chapo' => $chapo, 'author' => $author, 'content' => $content]);
    }

}
