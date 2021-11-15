<?php
if(session_id() == '') {
    session_start();
}
function loadClass($class)
{
    require 'controller' . DIRECTORY_SEPARATOR . $class . '.class.php';
}
spl_autoload_register('loadClass');

//instacier un contolleur frontend
$controllerFrontend = new FrontendController();

if (isset($_GET['action'])) {

    if ($_GET['action'] == 'home') {
        //$controllerFrontend->homePage();
    } elseif ($_GET['action'] == 'listBlogs') {
        //appeler le contolleur pour qu'il affiche la liste de tous les blogs

        $controllerFrontend->listBlogs();

    } elseif ($_GET['action'] == 'displayBlog') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            //appeler le controlleur pour qu'il affiche le blog: id
            $controllerFrontend->displayBlog($_GET['id']);
        }
    } 

    elseif ($_GET['action'] == 'sentMessage') {
        if (!empty($_POST['first-name']) && !empty($_POST['last-name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
            //appeler le controlleur pour qu'il gère le message reçu
            $controllerFrontend->sentMessage(htmlspecialchars($_POST['first-name']), htmlspecialchars($_POST['last-name']), htmlspecialchars($_POST['email']), htmlspecialchars($_POST['message']));

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
    elseif($_GET['action'] == 'registerAccountRequest'){
        
       
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
    elseif($_GET['action'] == 'accountConnexionRequest'){
        
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $controllerFrontend->connexionUser(htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password']));
        }
        else{
            
            $emptyFields['email'] = false;
            $emptyFields['password'] = false;

            if (empty($_POST['email'])) {
                $emptyFields['email'] = true;
            }
            if (empty($_POST['password'])) {
                $emptyFields['password'] = true;
            }
            require_once 'view/loginView.php';

        }
    }
    elseif($_GET['action'] == 'passwordRecoveryRequest'){

        $emptyFields['email'] = false;

        if(!empty($_POST['email'])){
           
            $controllerFrontend->passwordRecovery(htmlspecialchars($_POST['email']));
        }
        else{
            $emptyFields['email'] = true;
            require_once 'view/forgottenPasswordView.php';
        }

    }
    elseif($_GET['action'] == 'passwordInitialisationRequest'){
        
        if(isset($_GET['emailRecovery']) && !empty($_GET['emailRecovery'])){
            

            if(!empty($_POST['password']) && !empty($_POST['passwordConfirm'])){
                

                if($_POST['password'] === $_POST['passwordConfirm']){
                    //appeler le controleur pour qu'il mette à jour le mot de passe
                    $controllerFrontend->passwordReset(htmlspecialchars($_POST['password']), htmlspecialchars($_GET['emailRecovery']));
                   
                }
                else{
                    $passwordMatch = false;
                }
            }
            elseif(empty($_POST['password'])){
                
                $emptyFields['password'] = true;
            }
            elseif(empty($_POST['passwordConfirm'])){
                
                $emptyFields['passwordConfirm'] = true;
            }
        }
        else{
            $recoveryEmailError = true;
        }
        require_once 'view/resetPasswordView.php';
    }
    elseif($_GET['action'] == 'displayView'){
        
        if(isset($_GET['viewName']) && !empty($_GET['viewName'])){
            header('Location: view/' . $_GET['viewName'] . 'View.php');
        }

    }
    elseif($_GET['action'] == 'logout'){
        /*$_SESSION['user-connected'] = false;
        unset($_SESSION['user-type-account']);
        unset($_SESSION['user-email']);    
        require_once 'view/homeView.php';*/
        $controllerFrontend->initializeSession();
    }
} else {
    $controllerFrontend->homePage();

}
