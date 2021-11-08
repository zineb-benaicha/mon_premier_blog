<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Connexion</title>
        <link href="../public/css/stylesAdmin.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
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
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            
                                                <a class="small" href="password.html">Mot de passe oublié?</a>
                                                <button class="btn btn-primary" id="submitButton" type="submit">Se connecter</button>
                                            </div>
                                        </form>
                                        <br>
                                        <?php if(isset($userAccountExists) && $userAccountExists == false): ?>
                                            <div class="alert alert-danger" role="alert">
                                                L'e-mail ou le mot de passe est incorrect!
                                            </div>
                                        <?php endif ?>

                                        <?php if(isset($userAccountExists) && $userAccountExists == true): ?>
                                            <div class="alert alert-success" role="alert">
                                                Vous êtes connectés!
                                            </div>
                                        <?php endif ?>

                                        <?php if(isset($userConexionError ) && $userConexionError == true): ?>
                                            <div class="alert alert-danger" role="alert">
                                                Une erreur est survenue veuillez réessayer plus tard!
                                            </div>
                                        <?php endif ?>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="registerView.php">Si vous n'avez pas encore créé votre compte faites le ici</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../public/js/scriptsAdmin.js"></script>
    </body>
</html>
