<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Creative - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../public/assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../public/css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
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
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
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
                        <form id="contactForm" action="../index.php?action=sentMessage" method="post">
                        
                            
                            <!-- first-Name input-->
                            <?php if(isset($emptyFields['first-name']) && $emptyFields['first-name']):?>
                                <div class="alert alert-danger" role="alert">
                                    Vous devez saisir un prénom!
                                </div>
                            <?php endif ?>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="first-name" name="first-name" type="text"  value="<?= !empty($_POST['first-name']) ? $_POST['first-name'] : '' ?>"/>
                                <label for="first-name">Prénom</label>
                            </div>
                            <!-- last-Name input-->
                            <?php if(isset($emptyFields['last-name']) && $emptyFields['last-name']):?>
                                <div class="alert alert-danger" role="alert">
                                    Vous devez saisir un nom!
                                </div>
                            <?php endif ?>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="last-name" name="last-name" type="text"  value="<?= !empty($_POST['last-name']) ? $_POST['last-name'] : '' ?>" />
                                <label for="last-name">Nom</label>
                            </div>
                            <!-- Email address input-->
                            <?php if(isset($emptyFields['email']) && $emptyFields['email']):?>
                                <div class="alert alert-danger" role="alert">
                                    Vous devez saisir une adresse mail!
                                </div>
                            <?php endif ?>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" name="email" type="email" value="<?= !empty($_POST['email']) ? $_POST['email'] : '' ?>" />
                                <label for="email">Addresse email</label>                              
                            </div>
                            <!-- Message input-->
                            <?php if(isset($emptyFields['message']) && $emptyFields['message']):?>
                                <div class="alert alert-danger" role="alert">
                                    Vous devez saisir un message!
                                </div>
                            <?php endif ?>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" name="message" type="text"  style="height: 10rem" ><?= !empty($_POST['message']) ? $_POST['message'] : '' ?></textarea>
                                <label for="message">Message</label>
                                
                            </div>
                        
                            <?php if(isset($_GET['recordMessage'])): ?>
                                <?php if($_GET['recordMessage'] == 'succes'): ?>
                                    <div class="alert alert-success" role="alert">
                                        Votre message a bien été envoyé!
                                    </div>
                                <?php endif ?>
                                <?php if($_GET['recordMessage'] == 'error'): ?>
                                    <div class="alert alert-danger" role="alert">
                                        Une erreur est survenue veuillez réessayer plus tard!
                                    </div>
                                <?php endif ?>
                            <?php endif ?>
                            
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
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2021 - Company Name</div></div>
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
