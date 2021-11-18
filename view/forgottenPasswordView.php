<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Récupération de mot de passe</title>
        <link href="../public/css/stylesAdmin.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Récupération du mot de passe oublié</h3></div>
                                    <div class="card-body">
                                        <form action="../index.php?action=passwordRecoveryRequest" method="post" >

                                            <!-- email input-->
                                            <?php if (isset($emptyFields['email']) && $emptyFields['email']): ?>
                                                <div class="alert alert-danger" role="alert">
                                                    Vous devez saisir un e-mail!
                                                </div>
                                            <?php endif?>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" name="email" value="<?=!empty($_POST['email']) ? $_POST['email'] : ''?>"/>
                                                <label for="inputEmail">Veuillez insérer l'adresse e-mail avec laquelle vous avez créé votre compte</label>
                                            </div>

                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block" id="submitButton" type="submit">Vérifier l'adresse e-mail</button></div>
                                            </div>
                                        </form>
                                        <br>
                                        <!-- Le mot de passe a bien été récupéré -->
                                        <?php if (isset($recoverySuccess) && $recoverySuccess == true): ?>
                                            <div class="alert alert-success" role="alert">
                                                Un email contenant votre mot de passe vous a été envoyé vers cette adresse.
                                            </div>
                                        <?php endif?>

                                        <!-- L'email inséré n'a pas été trouvé -->
                                        <?php if (isset($recoveryEmailNotFound) && $recoveryEmailNotFound == true): ?>
                                            <div class="alert alert-danger" role="alert">
                                                Aucun compte lié à cette adresse n'a été trouvé, veuillez vérifier votre saisie.
                                            </div>
                                        <?php endif?>

                                        <!-- Une erreur est survenue l'a récupération a échoué -->
                                        <?php if (isset($recorevyError) && $recorevyError == true): ?>
                                            <div class="alert alert-danger" role="alert">
                                                Nous sommes désolés, une erreur est survenue, veuillez réessayer plus tard.
                                            </div>
                                        <?php endif?>


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
        <script src="../public/js/scripts.js"></script>
    </body>
</html>
