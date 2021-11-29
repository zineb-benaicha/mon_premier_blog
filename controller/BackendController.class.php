<?php
if (session_id() == '') {
    session_start();
}
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'BlogManager.class.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'CommentManager.class.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'MessageManager.class.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'UserManager.class.php';

class BackendController
{
    public function displayUsers($userDeleteSuccess = null, $userValidateSuccess = null)
    {
        $userManager = new UserManager();
        $usersNumber = $userManager->countAdmins()->fetch();

        if (!$usersNumber) {
            $queryError = true;
        } elseif ((int) $usersNumber[0] == 1) {
            $usersListEmpty = true;
        } elseif ((int) $usersNumber[0] > 1) {
            $usersListEmpty = false;
            $usersList = $userManager->getAdmins($_SESSION['user-id']);
            if (!$usersList) {
                $queryError = true;
            }
        }

        require_once 'view/usersManagementDashboardView.php';

    }

    public function removeUser($id_user)
    {
        $userManager = new UserManager();
        if ($userManager->deleteUser($id_user)) {
            $userDeleteSuccess = true;
        } else {
            $userDeleteSuccess = false;
        }
        $this->displayUsers($userDeleteSuccess);
    }

    public function validateUser($id_user)
    {
        $userManager = new UserManager();
        if ($userManager->validateUser($id_user)) {
            $userValidateSuccess = true;
        } else {
            $userValidateSuccess = false;
        }
        $this->displayUsers(null, $userValidateSuccess);

    }

    public function displayComments($commentDeleteSuccess = null, $blogUpdateSuccess = null)
    {
        $commentManager = new CommentManager();
        //1- ramener touts les commentaires ordonnés par date de création du plus récent au plus ancien
        $commentsNumber = $commentManager->getAllCommentsNumber();

        if (!$commentsNumber) {
            $queryError = true;
        } else {

            $commentsNumber = $commentsNumber->fetch();

            if ((int) $commentsNumber[0] == 0) {
                $commentsListEmpty = true;

            } elseif ((int) $commentsNumber[0] > 0) {
                $commentsListEmpty = false;
                $commentsList = $commentManager->getAllComments();
                if (!$commentsList) {
                    $queryError = true;
                }
            }

        }
        require_once 'view/commentsManagementDashboardView.php';
    }

    public function removeComment($id_comment)
    {
        $commentManager = new CommentManager();

        if ($commentManager->deleteComment($id_comment)) {
            $commentDeleteSuccess = true;
        } else {
            $commentDeleteSuccess = false;
        }

        $this->displayComments($commentDeleteSuccess);

    }

    public function validateComment($id_comment)
    {
        $commentManager = new CommentManager();
        if ($commentManager->validateComment($id_comment)) {
            $commentValidateSuccess = true;
        } else {
            $commentValidateSuccess = false;
        }
        $this->displayComments(null, $commentValidateSuccess);
    }

    public function displayBlogs($blogDeleteSuccess = null, $blogValidateSuccess = null, $updateQueryResult = null)
    {
        $blogManager = new BlogManager();
        //1- ramener touts les commentaires ordonnés par date de création du plus récent au plus ancien
        $blogsNumber = $blogManager->getAllBlogsNumber();

        if (!$blogsNumber) {
            $queryError = true;
        } else {
            $blogsNumber = $blogsNumber->fetch();

            if ((int) $blogsNumber[0] == 0) {
                $blogsListEmpty = true;

            } elseif ((int) $blogsNumber[0] > 0) {
                $blogsListEmpty = false;
                $blogsList = $blogManager->getBlogs();

                if (!$blogsList) {
                    $queryError = true;
                }
            }

        }

        require_once 'view/blogsManagementDashboardView.php';
    }

    public function removeBlog($id_blog)
    {
        $commentManager = new CommentManager();
        $blogManager = new BlogManager();
        //1-supprimer tous les commentaires d'un blog donné
        $queryDeleteCommentsResult = $commentManager->deleteCommentsByBlog($id_blog);

        if (!$queryDeleteCommentsResult) {
            $blogDeleteSuccess = false;
        } else {
            //2-supprimer le blog en soi
            $queryDeleteBlogResult = $blogManager->removeBlog($id_blog);

            if (!$queryDeleteBlogResult) {
                $blogDeleteSuccess = false;
            } else {
                $blogDeleteSuccess = true;
            }

            $this->displayBlogs($blogDeleteSuccess, null);

        }

    }

    public function displayBlogInformationsForEdition($id_blog)
    {   //1-chercher les informations du blog
        $blogManager = new BlogManager();
        $blogInformations = $blogManager->getBlogInformations($id_blog);
       
        if(!empty($blogInformations)) {
            
            $blogInformations = $blogInformations->fetch();
            
            //2-afficher une vue qui contient ces informations;
            require_once 'view/blogEditionView.php';
        }
    }
    
    public function editBlog($id_blog, $title, $chapo, $author, $content)
    {
        $blogManager = new BlogManager();
        $updateQueryResult = $blogManager->updateBlog($id_blog, $title, $chapo, $author, $content);
        $this->displayBlogs(null,null,$updateQueryResult);


    }

}
