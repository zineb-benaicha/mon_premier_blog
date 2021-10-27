<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'BlogManager.class.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'CommentManager.class.php';

class FrontendController
{

    public static function HomePage()
    {
        require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'homeView.html';

    }

    public function listBlogs()
    {
        //une méthode qui appelle le modele des blogs pour récupérer tous les blogs ordonnés
        $blogManager = new BlogManager();
        $blogsNumber = $blogManager->blogsNumber();
        $listBlogs = $blogManager->getBlogs();

        //puis appelle la vue et lui passer les données récupéreés à partir du modele
        require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'listBlogsView.php';
    }
    
    public function displayBlog($id)
    {
        //chercher le blog
        $blogManager = new BlogManager();
        $blogToDisplay = $blogManager->getBlog($id);

        //chercher le nombre de commentaires du blog
        $commentManager = new CommentManager();
        $commentsNumber = $commentManager->CommentsCounter($id);
        //chercher tous les commentaires du blog
        $blogComments = $commentManager->getComments($id);

        //afficher la vue qui va exploiter les données $blogToDispaly et $blogComments pour les afficher
        require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'blogView.php';

    }

}
