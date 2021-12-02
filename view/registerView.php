<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Enregistrement</title>
        <link href="../public/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
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
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Créer un compte</h3></div>
                                    <div class="card-body">
                                        <form action="../index.php?action=registerAccountRequest" method="post" >

                                            <!-- Name input-->
                                            <?php if (isset($emptyFields['name']) && $emptyFields['name']): ?>
                                                <div class="alert alert-danger" role="alert">
                                                    Vous devez saisir un nom!
                                                </div>
                                            <?php endif?>
                                            <div class="form-floating mb-3 ">
                                                <input class="form-control" id="name" type="text" name="name" value="<?=!empty($_POST['name']) ? $_POST['name'] : ''?>" />
                                                <label for="name">Nom</label>
                                            </div>

                                            <!-- email input-->
                                            <?php if (isset($emptyFields['email']) && $emptyFields['email']): ?>
                                                <div class="alert alert-danger" role="alert">
                                                    Vous devez saisir un e-mail!
                                                </div>
                                            <?php endif?>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="email" type="email" name="email" value="<?=!empty($_POST['email']) ? $_POST['email'] : ''?>" />
                                                <label for="email">Adresse e-mail</label>
                                            </div>


                                            <?php if (isset($passwordMatch) && $passwordMatch === false): ?>
                                                <div class="alert alert-danger" role="alert">
                                                        Les deux mots de passe sont différents!
                                                    </div>
                                            <?php endif?>
                                            <div class="row mb-3">
                                                <!-- Password input-->
                                                <?php if (isset($emptyFields['password']) && $emptyFields['password']): ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        Vous devez saisir un mot de passe!
                                                    </div>
                                                <?php endif?>
                                                <!-- PasswordConfirm input-->
                                                <?php if (isset($emptyFields['passwordConfirm']) && $emptyFields['passwordConfirm']): ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        Vous devez confirmer le mot de passe!
                                                    </div>
                                                <?php endif?>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="password" type="password" name="password" value="<?=!empty($_POST['password']) ? $_POST['password'] : ''?>" />
                                                        <label for="password">Mot de passe</label>
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="passwordConfirm" type="password" name="passwordConfirm" value="<?=!empty($_POST['passwordConfirm']) ? $_POST['passwordConfirm'] : ''?>" />
                                                        <label for="passwordConfirm">Confirmer le mot de passe</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Password input-->
                                            <?php if (isset($emptyFields['accountType']) && $emptyFields['accountType']): ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        Vous devez choisir un type de compte!
                                                    </div>
                                            <?php endif?>

                                            <div class="form-floating mb-3 ">
                                                <select class="form-select" aria-label="Default select example" id="accountType" name="accountType">
                                                    <option selected>Choisir un type de compte</option>
                                                    <option value="utilisateur">Utilisateur</option>
                                                    <option value="administrateur">Administrateur</option>
                                                </select>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block" id="submitButton" type="submit">Créer un compte</button></div>
                                            </div>
                                        </form>
                                        <br>
                                       <!-- Création de compte utilisateur réussie-->
                                        <?php if (isset($userRigistred) && $userRigistred): ?>
                                            <?php if ($_POST['accountType'] == 'utilisateur'): ?>
                                                <div class="alert alert-success" role="alert">
                                                        Votre compte est créé vous pouvez vous connecter avec!
                                                        <?php header("refresh:3;url=../index.php?action=displayView&viewName=login");?>
                                                </div>
                                                <?php else: ?>
                                                    <div class="alert alert-success" role="alert">
                                                        Votre demande de création d'un compte administrateur a bien été enregistrée, veuillez attendre qu'un administrateur du site vous la valide!
                                                        <?php header("refresh:5;url=../index.php?action=displayView&viewName=home");?>
                                                </div>
                                            <?php endif?>
                                        <?php endif?>

                                        <!-- L'e-mail inséré existe déjà avec un autre compte! création de compte impossible -->
                                        <?php if (isset($emailExists) && $emailExists): ?>
                                            <div class="alert alert-danger" role="alert">
                                                Cette adresse e-amil est déjà liée à un autre compte! veuillez vous connectez avec ou en saisir une autre.
                                            </div>
                                        <?php endif?>

                                        <!-- l'email n'existe pas mais une erreur empêche la création de compte -->
                                        <?php if (isset($emailExists) && !$emailExists && isset($userRigistred) && !$userRigistred): ?>
                                            <div class="alert alert-danger" role="alert">
                                                Une erreur est survenue, veuillez réessayer plus tard!
                                            </div>
                                        <?php endif?>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="../index.php?action=displayView&viewName=login">Si vous possédez déjà un compte connectez vous</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../public/js/scripts.js"></script>
    </body>
</html>
