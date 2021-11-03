<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'BlogManager.class.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'CommentManager.class.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'MessageManager.class.php';

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

            //2-afficher message de succes au niveau du formulaire
            header('Location: view/contactView.php?recordMessage=succes');
            exit();
        } else //Message non enregistré dans la BDD
        {
            //afficher message d'erreur au niveau de la vue
            header('Location: view/contactView.php?recordMessage=error');
            exit();
        }

    }

}
