<?php
function loadClass($class)
{
    require 'controller' . DIRECTORY_SEPARATOR . $class . '.class.php';
}
spl_autoload_register('loadClass');

//instacier un contolleur frontend
$controllerFrontend = new FrontendController();

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'home') {
        $controllerFrontend->homePage();
    } elseif ($_GET['action'] == 'listBlogs') {
        //appeler le contolleur pour qu'il affiche la liste de tous les blogs

        $controllerFrontend->listBlogs();

    } elseif ($_GET['action'] == 'displayBlog') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            //appeler le controlleur pour qu'il affiche le blog: id
            $controllerFrontend->displayBlog($_GET['id']);
        }
    } elseif ($_GET['action'] == 'sentMessage') {
       

        if (!empty($_POST['first-name']) && !empty($_POST['last-name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
            //appeler le controlleur pour qu'il gère le message reçu
            $controllerFrontend->sentMessage($_POST['first-name'], $_POST['last-name'], $_POST['email'], $_POST['message']);

        } else {

            $emptyFields['first-name'] = false;
            $emptyFields['last-name'] = false;
            $emptyFields['email'] = false;
            $emptyFields['message'] = false;

            if (empty($_POST['first-name'])) {$emptyFields['first-name'] = true;}
            if (empty($_POST['last-name'])) {$emptyFields['last-name'] = true;}
            if (empty($_POST['email'])) {$emptyFields['email'] = true;}
            if (empty($_POST['message'])) {$emptyFields['message'] = true;}
            require_once 'view/contactView.php';

        }

    }
    elseif($_GET['action'] == 'registerRequest'){
        
       
        if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['passwordConfirm'])){

            $emptyFields['accountType'] = false;
            $passwordMatch = true;

            if($_POST['password'] !== $_POST['passwordConfirm']){
                $passwordMatch = false;
            }

            if ($_POST['accountType'] == 'Choisir un type de compte'){
                $emptyFields['accountType'] = true;
            }
            

            //appel au frontEndcontrolleur pour qu'il insère le nouvel utilisateur
            if($passwordMatch && !$emptyFields['accountType'])
            {
                $name = htmlspecialchars($_POST['name']);
                $email = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);
                $accountType = $_POST['accountType'];
                $controllerFrontend->registerUser($name, $email, $password, $accountType);
            }
            else{
                require_once 'view/registerView.php';

            }
                

        }
        else{

            $emptyFields['name'] = false;
            $emptyFields['email'] = false;
            $emptyFields['password'] = false;
            $emptyFields['passwordConfirm'] = false;
            

            if (empty($_POST['name'])) {
                $emptyFields['name'] = true;
            }
            if (empty($_POST['email'])) {
                $emptyFields['email'] = true;
            }
            if (empty($_POST['password'])) {
                $emptyFields['password'] = true;
            }
            if (empty($_POST['passwordConfirm'])) {
                $emptyFields['passwordConfirm'] = true;
            }

            require_once 'view/registerView.php';
            
        }

    }
} else {
    $controllerFrontend->homePage();

}
