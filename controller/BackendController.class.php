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
    public function displayUsers($userDeleteSuccess=null, $userValidateSuccess=null)
    {
        $userManager = new UserManager();
        $usersNumber = $userManager->countAdmins()->fetch();
        
        if (!$usersNumber){
            $queryError = true;
        }
        elseif ((int)$usersNumber[0] == 1){
            $usersListEmpty = true;
        }
        elseif ((int)$usersNumber[0] > 1){
            $usersListEmpty = false;
            $usersList = $userManager->getAdmins($_SESSION['user-id']);
            if(!$usersList){
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
        }
        else {
            $userDeleteSuccess = false;
        }
        $this->displayUsers($userDeleteSuccess);
    }

    public function validateUser($id_user)
    {
        $userManager = new UserManager();
        if ($userManager->validateUser($id_user)) {
            $userValidateSuccess = true;
        }
        else {
            $userValidateSuccess = false;
        }
        $this->displayUsers(null,$userValidateSuccess);

    }

    public function displayComments()
    {
        $commentManager = new CommentManager();
        //1- ramener touts les commentaires ordonnés par date de création du plus récent au plus ancien
        $commentsList = $commentManager->getAllComments();
        var_dump($commentsList->fetchAll());
        echo '<br>';
        echo '<br>';
        echo '<br>';
        var_dump($commentsList->fetch());
    }
}
