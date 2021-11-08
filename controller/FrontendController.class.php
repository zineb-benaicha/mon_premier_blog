<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'BlogManager.class.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'CommentManager.class.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'MessageManager.class.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'UserManager.class.php';

class FrontendController
{

    public static function homePage()
    {
        require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'homeView.php';

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
        $commentsNumber = $commentManager->commentsCounter($id);
        //chercher tous les commentaires du blog
        $blogComments = $commentManager->getComments($id);

        //afficher la vue qui va exploiter les données $blogToDispaly et $blogComments pour les afficher
        require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'blogView.php';

    }

    public function sentMessage($firstName, $lastName, $email, $message)
    {
        //enregistrer le message au niveau de la BDD
        $messageManager = new MessageManager();

        //si le message a bien été enregistré dans la BDD
        if ($messageManager->setMessage($firstName, $lastName, $email, $message)) {

            //1-envoyer un email à moi
            $destinataire = 'zineb.mezlef@gmail.com';
            $expediteur = $email;
            $objet = "Message reçu de $firstName $lastName";
            $headers = 'MIME-Version: 1.0' . "\n"; // Version MIME
            $headers .= 'Reply-To: ' . $email . "\n"; // Mail de reponse
            $headers .= 'From: "Nom_de_expediteur"<' . $expediteur . '>' . "\n"; // Expediteur
            $headers .= 'Delivered-to: ' . $destinataire . "\n"; // Destinataire
            $messageMail = "$firstName $lastName a laissé un message, pour le consulter aller sur le site";

            mail($destinataire, $objet, $messageMail, $headers);

            //2-afficher message de succes au niveau du formulaire
            header('Location: view/contactView.php?recordMessage=succes');
        } else //Message non enregistré dans la BDD
        {
            //afficher message d'erreur au niveau de la vue
            header('Location: view/contactView.php?recordMessage=error');
        }

    }

    public function registerUser($name, $email, $password, $accountType){

        $emailExists = false;
        $userRigistred = false;

        $userManager = new UserManager();

        //vérifier si un compte existe déjà avec cet email
        if($userManager->userEmailsNumber($email) == 0){
            
            if($accountType == 'administrateur'){
                $isAdmin = 1;
                $isValidated = 0;
            }
            else{
                $isAdmin = 0;
                $isValidated = 1;
            }           

            if($userManager->setUser($name, $email, $password, $isAdmin, $isValidated)){
                $userRigistred = true;
            }
            
        }
        elseif($userManager->userEmailsNumber($email) > 0){
            $emailExists = true;
        }
            require_once 'view/registerView.php';

    }

    public function connexionUser($email, $password)
    {
        $userAccountExists = false;
        $userConexionError = false;
        $userManager = new UserManager();
        
        if($userManager->checkAccount($email, $password) == 1 ){
            $userAccountExists = true;
        }
        elseif($userManager->checkAccount($email, $password) === false){
            $userConexionError = true;
        }

        require_once 'view/loginView.php';
        
        
    }

    public function passwordRecovery($email)
    {
        //1-vérifier si l'email existe en BDD
        $userManager = new UserManager();
        $recoveryEmailNotFound = false;
        $recorevyError = false;

        $numberEmailFounded = $userManager->userEmailsNumber($email);

        if($numberEmailFounded == 0){
            $recoveryEmailNotFound = true;
        }
        //2-s'il existe, récupérer le mot de passe
        elseif($numberEmailFounded == 1){

            if(!$userManager->getPassword($email)){
                $recorevyError = true;
            }
            else{

                //3-envoyer un mail contenant le mot de passe associé
                $password = $userManager->getPassword($email);
                $destinataire = $email;
                $expediteur = 'zineb.mezlef@gmail.com';
                $objet = "Récupération de mot de passe";
                $headers = 'MIME-Version: 1.0' . "\n"; 
                $headers .= 'Reply-To: ' . $email . "\n"; // Mail de reponse
                $headers .= 'From: "Nom_de_expediteur"<' . $expediteur . '>' . "\n"; // Expediteur
                $headers .= 'Delivered-to: ' . $destinataire . "\n"; // Destinataire
                $messageMail = "Vous avez demandé la récupération de votre mot de passe, le voici:\r\n $password[0] \r\n Cordialement";

                if(mail($destinataire, $objet, $messageMail, $headers)){
                    $recoverySuccess = true;
                }
                else{
                    $recorevyError = true;
                }
            }

        }

        require_once 'view/forgottenPasswordView.php';
       

    }
}
