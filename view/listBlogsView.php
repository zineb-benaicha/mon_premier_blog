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
        <title>Dérnières actualités</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../public/favicon/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../public/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- Responsive navbar-->
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
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-5">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Dernières actualités!</h1>
                    <p class="lead mb-0">Ici vous trouverez toutes nos actualités, n'hésitez pas à les consulter</p>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->

                <div class="col-lg-8">

                    <!-- Featured blog post-->
                    <?php
                        
                        foreach ($listBlogs as $data)
                        {
                            
                            if ($data !== false) {
                                $photoName = 'public\img\photos_blogs/blog_' . $data->id() . '.jpg';
                                
                                if (!file_exists($photoName)) {
                                    $photoName = 'public\img\photos_blogs/blog_standard.jpg';
                                }

                                echo '<div class="card mb-4">
                                            <a href="#!"><img class="card-img-top" src="' . $photoName . '" alt="image non disponible" /></a>
                                            <div class="card-body">
                                                <div class="small text-muted">' . $data->lastUpdate() . '</div>
                                                <h2 class="card-title">' . htmlspecialchars($data->title()) . '</h2>
                                                <p class="card-text">' . nl2br(htmlspecialchars($data->chapo())) . '</p>
                                                <a class="btn btn-primary" href="index.php?action=displayBlog&id=' . $data->id() . '">Lire la suite →</a>
                                            </div>
                                        </div>';

                            }
                        }   
                        
                    ?>

                    
                </div>

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
        <!-- Core theme JS-->
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
