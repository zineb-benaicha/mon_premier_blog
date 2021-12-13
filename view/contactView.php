<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Contacter nous</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../public/favicon/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../public/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    </head>
    <body id="page-top">
<?php
if (isset($_SESSION['user-connected']) && $_SESSION['user-connected']) {
    //partie connexion navbar
    $navbarConnexionClass = '';
    $classLogoutItem = '';
    $classLoginItem = 'd-none';
    if ($_SESSION['user-type-account'] == 'admin') {
        $dashboardClassItem = '';
    } else {
        $dashboardClassItem = 'd-none';
    }
} elseif (isset($_SESSION['user-connected']) && !$_SESSION['user-connected']) {
    //partie connexion navbar
    $dashboardClassItem = 'd-none';
    $navbarConnexionClass = 'd-none';
    $classLogoutItem = 'd-none';
    $classLoginItem = '';
}
?>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand d-none d-lg-block" href="index.php?action=home"><img src="public/img/logo/logo.png" height="150"/></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.php?action=home">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?action=listBlogs">Blogs</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?action=displayView&viewName=contact">Contact</a></li>
                    </ul>
                </div>
            </div>
            <!-- Connexion Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-lg"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="<?=$dashboardClassItem?> . dropdown-item" href="../index.php?action=displayView&viewName=adminDashboard">Tableau de bord</a></li>
                            <li><hr class="<?=$navbarConnexionClass?> . dropdown-divider" /></li>
                            <li><a class="<?=$classLogoutItem?> . dropdown-item" href="../index.php?action=logout">Se deconnecter</a></li>
                            <li><a class="<?=$classLoginItem?> . dropdown-item" href="../index.php?action=displayView&viewName=login">Se connecter</a></li>
                        </ul>
                    </li>
            </ul>
        </nav>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">Laisser un message</h2>
                        <hr class="divider" />
                        <p class="text-muted mb-5">Pour laisser un message remplissez le formulaire ci-dessous</p>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                        <form id="contactForm" action="../index.php?action=sentMessage#success-div-message" method="post">

                            <!-- first-Name input-->
                            <?php if (isset($emptyFields['first-name']) && $emptyFields['first-name']): ?>
                                <div class="alert alert-danger" role="alert">
                                    Vous devez saisir un prénom!
                                </div>
                            <?php endif?>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="first-name" name="first-name" type="text"  value="<?=!empty($_POST['first-name']) ? $_POST['first-name'] : ''?>"/>
                                <label for="first-name">Prénom</label>
                            </div>
                            <!-- last-Name input-->
                            <?php if (isset($emptyFields['last-name']) && $emptyFields['last-name']): ?>
                                <div class="alert alert-danger" role="alert">
                                    Vous devez saisir un nom!
                                </div>
                            <?php endif?>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="last-name" name="last-name" type="text"  value="<?=!empty($_POST['last-name']) ? $_POST['last-name'] : ''?>" />
                                <label for="last-name">Nom</label>
                            </div>
                            <!-- Email address input-->
                            <?php if (isset($emptyFields['email']) && $emptyFields['email']): ?>
                                <div class="alert alert-danger" role="alert">
                                    Vous devez saisir une adresse mail!
                                </div>
                            <?php endif?>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" name="email" type="email" value="<?=!empty($_POST['email']) ? $_POST['email'] : ''?>" />
                                <label for="email">Addresse email</label>
                            </div>
                            <!-- Message input-->
                            <?php if (isset($emptyFields['message']) && $emptyFields['message']): ?>
                                <div class="alert alert-danger" role="alert">
                                    Vous devez saisir un message!
                                </div>
                            <?php endif?>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" name="message" type="text"  style="height: 10rem" ><?=!empty($_POST['message']) ? $_POST['message'] : ''?></textarea>
                                <label for="message">Message</label>

                            </div>

                            <?php if (isset($recordMessage)): ?>
                                <?php if ($recordMessage == 'succes'): ?>
                                    <div class="alert alert-success" role="alert" id="success-div-message">
                                        Votre message a bien été envoyé!
                                    </div>
                                <?php endif?>
                                <?php if ($recordMessage == 'error'): ?>
                                    <div class="alert alert-danger" role="alert">
                                        Une erreur est survenue veuillez réessayer plus tard!
                                    </div>
                                <?php endif?>
                            <?php endif?>

                            <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton" type="submit">Envoyer</button></div>
                        </form>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-4 text-center mb-5 mb-lg-0">
                        <i class="bi-phone fs-2 mb-3 text-muted"></i>
                        <div>+1 (555) 123-4567</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container d-flex justify-content-center">        
                <!-- Footer Social Icons-->
                <div>
                    <h4 class="text-uppercase mb-4">Réseaux sociaux</h4>
                    <a class="btn btn-outline-dark btn-social mx-1" href="https://www.facebook.com/"><i class="fab fa-fw fa-facebook-f"></i></a>
                    <a class="btn btn-outline-dark btn-social mx-1" href="https://twitter.com/"><i class="fab fa-fw fa-twitter"></i></a>
                    <a class="btn btn-outline-dark btn-social mx-1" href="https://www.linkedin.com/"><i class="fab fa-fw fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-dark btn-social mx-1" href="https://github.com/"><i class="fab fa-fw fa-github"></i></a>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="../public/js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
