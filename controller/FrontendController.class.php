<?php
if (session_id() == '') {
    session_start();
}
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'BlogManager.class.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'CommentManager.class.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'MessageManager.class.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'UserManager.class.php';

class FrontendController
{

    public static function destroySession()
    {
        $_SESSION['user-connected'] = false;

        if (isset($_SESSION['user-type-account'])) {
            unset($_SESSION['user-type-account']);
        }
        if (isset($_SESSION['user-email'])) {
            unset($_SESSION['user-email']);
        }
        if (isset($_SESSION['user-name'])) {
            unset($_SESSION['user-name']);
        }
        if (isset($_SESSION['user-id'])) {
            unset($_SESSION['user-id']);
        }
        require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'homeView.php';

    }

    public function homePage()
    {
        if (!isset($_SESSION['user-connected'])) {
            $_SESSION['user-connected'] = false;
        }
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

    public function displayBlog($id, $commentEmpty = null, $commentInsertionSuccess = null)
    {
        //chercher le blog
        $blogManager = new BlogManager();
        $blogToDisplay = $blogManager->getBlog($id);

        //chercher le nombre de commentaires du blog
        $commentManager = new CommentManager();
        $commentsNumber = $commentManager->commentsCounter($id);

        //chercher tous les commentaires validés du blog
        $blogComments = $commentManager->getComments($id);

        if (isset($commentEmpty)) {
            $emptyFields['content'] = true;
        }
        if (isset($commentInsertionSuccess)) {

            $commentInsertionError = !$commentInsertionSuccess;
        }

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
            $recordMessage='succes';
        } else //Message non enregistré dans la BDD
        {
            $recordMessage='error';
        }
        require_once 'view/contactView.php';

    }

    public function registerUser($name, $email, $password, $accountType)
    {

        $emailExists = false;
        $userRigistred = false;

        $userManager = new UserManager();

        //vérifier si un compte existe déjà avec cet email
        if ($userManager->userEmailsNumber($email) == 0) {

            if ($accountType == 'administrateur') {
                $isAdmin = 1;
                $isValidated = 0;
            } else {
                $isAdmin = 0;
                $isValidated = 1;
            }

            if ($userManager->setUser($name, $email, password_hash($password, PASSWORD_DEFAULT), $isAdmin, $isValidated)) {
                $userRigistred = true;
            }

        } elseif ($userManager->userEmailsNumber($email) > 0) {
            $emailExists = true;
        }
        require_once 'view/registerView.php';

    }

    public function connexionUser($email, $password)
    {
        $userManager = new UserManager();

        $userEmailNumber = $userManager->userEmailsNumber($email);

        if ($userEmailNumber == 1) {

            $hashedPassword = $userManager->getHashedPassword($email)[0];

            if (password_verify($password, $hashedPassword)) {

                if ($userManager->isAdmin($email)[0] == 1 && $userManager->isValidated($email)[0] == 0) {
                    $userAccountAdminNotValidated = true;
                    if (isset($_SESSION)) {
                        unset($_SESSION);
                    }
                    $_SESSION['user-connected'] = false;

                } elseif ($userManager->isAdmin($email)[0] == 1 && $userManager->isValidated($email)[0] == 1) {

                    if ($userManager->getUser($email)) {
                        $userInformations = $userManager->getUser($email);
                    }

                    $_SESSION['user-connected'] = true;
                    $_SESSION['user-type-account'] = 'admin';
                    $_SESSION['user-email'] = $email;
                    $_SESSION['user-id'] = $userInformations['id'];
                    $_SESSION['user-name'] = $userInformations['name'];
                    
                } elseif ($userManager->isAdmin($email)[0] == 0) {

                    if ($userManager->getUser($email)) {
                        $userInformations = $userManager->getUser($email);
                    }
                    $_SESSION['user-connected'] = true;
                    $_SESSION['user-type-account'] = 'visitor';
                    $_SESSION['user-email'] = $email;
                    $_SESSION['user-id'] = $userInformations['id'];
                    $_SESSION['user-name'] = $userInformations['name'];
                }

            } else {
                if (isset($_SESSION)) {
                    unset($_SESSION);
                }
                $_SESSION['user-connected'] = false;
                $userPasswordError = true;

            }
        } elseif ($userEmailNumber == 0) {
            if (isset($_SESSION)) {
                unset($_SESSION);
            }
            $_SESSION['user-connected'] = false;
            $userAccountExists = false;
        } elseif (!$userEmailNumber) {
            if (isset($_SESSION)) {
                unset($_SESSION);
            }
            $_SESSION['user-connected'] = false;
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

        if ($numberEmailFounded == 0) {
            $recoveryEmailNotFound = true;
            require_once 'view/forgottenPasswordView.php';
        } elseif ($numberEmailFounded == 1) { //l'email existe bien dans la BDD
            //2-appeler la vue qui permet d'initialiser le mot de passe
            $emailRecovery = $email;
            require_once "view/resetPasswordView.php";
        }
    }

    public function passwordReset($password, $email)
    {

        $userManager = new UserManager();
        if ($userManager->passwordUpdate(password_hash($password, PASSWORD_DEFAULT), $email)) {
            //mise à jour du mot de passe réussie
            $passwordUpdateSuccess = true;

        } else {
            //mise à jour du mot de passe a échoué
            $passwordUpdateError = true;

        }
        require_once 'view/resetPasswordView.php';

    }

    public function addComment($id_blog, $id_user, $comment_content)
    {
        $commentManager = new CommentManager();

        $queryInsertionCommentResult = $commentManager->setComment($id_blog, $id_user, $comment_content);

        if ($queryInsertionCommentResult) {
            $commentInsertionSuccess = true;
        } else {
            $commentInsertionSuccess = false;
        }
        $this->displayBlog($id_blog, null, $queryInsertionCommentResult);
    }
}
