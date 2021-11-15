<?php
if(session_id() == '') {
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
        <title>Blog Post - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../public/favicon/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../public/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1"><?= htmlspecialchars($blogToDisplay['title']) ?></h1>
                             <!-- Post categories-->
                             <a class="badge bg-secondary text-decoration-none link-light" href="index.php?action=listBlogs">Voir les autres posts</a>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posté le <?= $blogToDisplay['last_update'] ?></div>
                            <!-- Post categories-->
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="<?= 'public/img/photos_blogs/blog_' . $blogToDisplay['id'] . '.jpg'?>" alt="image non disponible" /></figure>
                        <!-- Post content-->
                        <section class="mb-5">                                          
                            <p class="fs-5 mb-4"><?= nl2br(htmlspecialchars($blogToDisplay['content'])) ?></p>
                            
                        </section>
                    </article>

                    <!-- Comments section-->
                    <section class="mb-5" id="form_comment">
                        <div class="card bg-light">
                            <div class="card-body">
                                <!-- Comment form-->
                                
                                <?php if (isset($emptyFields['content']) && $emptyFields['content']): ?>
                                    <div class="alert alert-danger" role="alert">
                                        Vous devez saisir un comentaire!
                                     </div>
                                <?php endif?>
                                <form class="mb-4" action="../index.php?action=sentComment&amp;id_blog=<?= $blogToDisplay['id']?>#form_comment" method="post">
                                    <textarea class="form-control" rows="3" placeholder="Laissez votre commentaire" name="content"></textarea>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button class="btn btn-primary" id="submitButton" type="submit">Publier</button>
                                    </div>
                                </form>
                                
                                <?= var_dump($_SESSION) ?>
                                <?php if( isset($_GET['action']) && $_GET['action'] == 'sentComment'):?>
                                    <?php if(isset($_SESSION['user-connected']) && !$_SESSION['user-connected'] ): ?>
                                        <?=  'je suis la'; ?>
                                        <div class="alert alert-danger" role="alert">
                                            Vous devez être connectés pour ajouter un commentaire.
                                        </div>
                                    <? endif ?>
                                <? endif ?>
                                <!-- Comment with nested comments-->
                                <?php if($commentsNumber == 0): ?>
                                    <p>Aucun Commentaire à afficher.</p>
                                <?php elseif($commentsNumber > 0): ?>
                                    <?php while($comment = $blogComments->fetch()): ?>
                                        <!-- Single comment-->
                                        <div class="d-flex">
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold"><?= $comment['id_user'] ?></div>
                                                <?= $comment['content'] ?>
                                            </div>
                                        </div>
                                    <?php endwhile ?>
                                <?php endif ?>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
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
