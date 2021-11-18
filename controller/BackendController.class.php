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
        $usersList = $userManager->getUsers();
        
        if (!$usersList) {
            $queryError = true;
        }
        elseif (get_class($usersList) == 'PDOStatement' && $usersList->fetch() === false) {
            $usersListEmpty = true;
        }
        else {
            $usersListEmpty = false;
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
}
