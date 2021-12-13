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
        <title>Blog: <?= ucfirst($blogToDisplay['title']); ?></title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../public/favicon/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
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
        
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-10">
                    <article>
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1"><?= ucfirst($blogToDisplay['title']) ?></h1>
                            <br>
                            <!-- Post Chapo -->
                            <p class="fw-bold fs-4"><?= ucfirst($blogToDisplay['chapo']) ?></p>
                            <!-- Post date -->
                            <div class="text-muted fst-italic mb-2">Posté le <?= $blogToDisplay['last_update']?> par: <?= ucfirst($blogToDisplay['author']) ?></div>
                            <br>
                            <!-- see all posts-->
                            <a class="badge bg-primary text-decoration-none link-light p-3 fs-5" href="index.php?action=listBlogs">Voir les autres posts</a>

                        </header>
                        <!-- Preview image figure-->
                        <?php 
                        $photoName = 'public/img/photos_blogs/blog_' . $blogToDisplay['id'] . '.jpg';
                        if (!file_exists($photoName)) {
                            $photoName = 'public/img/photos_blogs/blog_standard.jpg';
                        }
                        ?>
                        <figure class="mb-4"><img class="img-fluid rounded" src="<?= $photoName ?>" alt="image non disponible" /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4"><?=nl2br(htmlspecialchars($blogToDisplay['content']))?></p>

                        </section>
                    </article>

                    <!-- Comments section-->
                    <section class="mb-5" id="form_comment">
                        <div class="card bg-light">
                            <div class="card-body">

                                <!-- Comment form-->
                                <?php if (isset($emptyFields['content']) && $emptyFields['content']): ?>
                                    <div class="alert alert-danger" role="alert">
                                        Vous devez saisir un comentaire.
                                    </div>
                                <?php endif?>

                                <form class="mb-4" action="../index.php?action=sentComment&amp;id_blog=<?=$blogToDisplay['id']?>#form_comment" method="post">
                                    <textarea class="form-control" rows="3" placeholder="Laissez votre commentaire" name="content"></textarea>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button class="btn btn-primary" id="submitButton" type="submit">Publier</button>
                                    </div>
                                </form>

                                <!-- résultat insertation commentaire -->
                                <?php if (isset($commentInsertionError) && $commentInsertionError): ?>
                                    <div class="alert alert-danger" role="alert">
                                        Une erreur est survenu veuillez réessayer plus tard.
                                    </div>
                                <?php endif?>
                                <?php if (isset($commentInsertionError) && !$commentInsertionError): ?>
                                    <div class="alert alert-success" role="alert">
                                        Votre commentaire a été enregistré, il est en attente de validation.
                                    </div>
                                <?php endif?>


                                <?php if (isset($_GET['action']) && $_GET['action'] == 'sentComment'): ?>
                                    <?php if (isset($_SESSION['user-connected']) && !$_SESSION['user-connected']): ?>
                                        <div class="alert alert-danger" role="alert">
                                            Vous devez être connectés pour ajouter un commentaire.
                                        </div>
                                    <?php endif?>
                                <?php endif?>

                                <!-- Affichage des commentaires-->
                                <?php if ($commentsNumber == 0): ?>
                                    <p>Aucun Commentaire à afficher.</p>
                                <?php elseif ($commentsNumber > 0): ?>
                                    <?php while ($comment = $blogComments->fetch()): ?>

                                        <!-- Single comment-->
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 fw-bold"><?= ucfirst($comment['name']) ?>:</div>
                                            <div class="ms-3">
                                                <?= ucfirst($comment['content']) ?>
                                            </div>
                                        </div>
                                        <br>
                                    <?php endwhile?>
                                <?php endif?>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
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
