<?php
if (session_id() == '') {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Connexion</title>
        <link href="../public/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body >
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
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Connexion</h3></div>
                                    <div class="card-body">
                                        <form action="../index.php?action=accountConnexionRequest" method="post" >

                                            <!-- email input-->
                                            <?php if (isset($emptyFields['email']) && $emptyFields['email']): ?>
                                                <div class="alert alert-danger" role="alert">
                                                    Vous devez saisir un e-mail!
                                                </div>
                                            <?php endif?>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" name="email" value="<?=!empty($_POST['email']) ? $_POST['email'] : ''?>"/>
                                                <label for="inputEmail">Adresse e-mail</label>
                                            </div>

                                            <!-- Password input-->
                                            <?php if (isset($emptyFields['password']) && $emptyFields['password']): ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        Vous devez saisir un mot de passe!
                                                    </div>
                                                <?php endif?>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" name="password" value="<?=!empty($_POST['password']) ? $_POST['password'] : ''?>" />
                                                <label for="inputPassword">Mot de passe</label>
                                            </div>
                                            
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0 ">
                                                <a class="small d-none" href="../index.php?action=displayView&viewName=forgottenPassword">Mot de passe oublié?</a>
                                                <button class="btn btn-primary" id="submitButton" type="submit" name="connect">Se connecter</button>
                                            </div>
                                        </form>
                                        <br>


                                        <!-- Email non existant-->
                                        <?php if (isset($userAccountExists) && !$userAccountExists): ?>
                                            <div class="alert alert-danger" role="alert">
                                                Aucun compte utilisateur lié à cette adresse n'a été trouvé, veuillez vérifier votre saisie.
                                            </div>
                                        <?php endif?>

                                        <!-- Compte admin non validé -->
                                        <?php if (isset($userAccountAdminNotValidated) && $userAccountAdminNotValidated): ?>
                                            <div class="alert alert-danger" role="alert">
                                                Votre compte administrateur n'a pas été encore validé, veuillez attendre sa validation pour se connecter.
                                            </div>
                                        <?php endif?>

                                        <!-- Mot de passe incorrect -->
                                        <?php if (isset($userPasswordError) && $userPasswordError): ?>
                                            <div class="alert alert-danger" role="alert">
                                               Le mot de passe que vous avez saisi est incorrect!
                                            </div>
                                        <?php endif?>

                                        <!-- Erreur de connexion -->
                                        <?php if (isset($userConexionError) && $userConexionError): ?>
                                            <div class="alert alert-danger" role="alert">
                                                Une erreur est survenue veuillez réessayer plus tard!
                                            </div>
                                        <?php endif?>

                                        <!-- Connexion réussie -->
                                        <?php if (isset($_SESSION['user-connected']) && $_SESSION['user-connected'] && isset($_POST['connect'])): ?>

                                            <div class="alert alert-success" role="alert">
                                                Bienvenue !
                                            </div>

                                            <?php
                                                if ($_SESSION['user-type-account'] == 'admin') {

                                                    header("refresh:2;url=../index.php?action=displayView&viewName=adminDashboard");
                                                } elseif ($_SESSION['user-type-account'] == 'visitor') {

                                                    header("refresh:2;url=../index.php?action=displayView&viewName=home");

                                                }

                                            ?>
                                        <?php endif?>
                                    </div>


                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="../index.php?action=displayView&viewName=register">Si vous n'avez pas encore créé votre compte faites le ici</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <br>
        </div>
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
        
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../public/js/scripts.js"></script>
    </body>
</html>
