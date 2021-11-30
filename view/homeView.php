<?php
if (session_id() == '') {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page d'accueil</title>
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
    //partie Longin/register
    $buttonPathRigister = "../index.php?action=logout";
    $buttonNameRigister = 'Se deconnecter';
    $connexionSectionClass = 'd-none';
    $invitationButtonName = 'Deconnectez vous';
} elseif (isset($_SESSION['user-connected']) && !$_SESSION['user-connected']) {
    //partie connexion navbar
    $dashboardClassItem = 'd-none';
    $navbarConnexionClass = 'd-none';
    $classLogoutItem = 'd-none';
    $classLoginItem = '';
    //partie Longin/register
    $buttonPathRigister = "../index.php?action=displayView&viewName=register";
    $buttonNameRigister = "S'enregistrer";
    $connexionSectionClass = '';
    $invitationButtonName = 'Devenez membre';
}
?>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">Start Bootstrap</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?action=listBlogs">Blogs</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link" href="view/contactView.php">Contact</a></li>
                    </ul>

                    <!-- Connexion Navbar-->
                    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-lg"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="<?=$navbarConnexionClass?> . dropdown-item" href="#!">Parametres</a></li>
                                <li><a class="<?=$dashboardClassItem?> . dropdown-item" href="../index.php?action=displayView&viewName=adminDashboard">Tableau de bord</a></li>
                                <li><hr class="<?=$navbarConnexionClass?> . dropdown-divider" /></li>
                                <li><a class="<?=$classLogoutItem?> . dropdown-item" href="../index.php?action=logout">Se deconnecter</a></li>
                                <li><a class="<?=$classLoginItem?> . dropdown-item" href="../index.php?action=displayView&viewName=login">Se connecter</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">Développeur web php et symphony</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">Je suis développeuse web spécialisée en le langage php et le framework symphony </p>
                        <a class="btn btn-primary btn-xl" href="#about">Mes  actualités</a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Longin/register-->
        <section class="<?=$connexionSectionClass?> . page-section bg-primary" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0"><?=$invitationButtonName?></h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4">Rejoignez notre communauté et devenez membre en s'enregistrant, vous pourriez commenter les blogs et peut-être même en éditer!</p>
                        <a class="btn btn-light btn-xl" href=<?=$buttonPathRigister?>><?=$buttonNameRigister?></a>
                        <a class= "<?=$loginButtonClass?> . btn btn-light btn-xl" href="../index.php?action=displayView&viewName=login">Se connecter</a>
                    </div>
                </div>
            </div>
        </section>   

        <!-- Télécharger le CV-->
        <section class="page-section bg-dark text-white">
            <div class="container px-4 px-lg-5 text-center">
                <!--<h2 class="mb-4">Télécharger mon cv ici</h2>-->
                <a class="btn btn-light btn-xl" href="../public/cv.pdf">Télécharger cv</a>
            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2021 - Company Name</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="../public/js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
