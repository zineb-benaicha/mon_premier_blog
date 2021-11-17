<?php
if(session_id() == ''){
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
        <title>initialiser le mot de passe</title>
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Réinitialisation du mot de passe</h3></div>
                                    <div class="card-body">

                                        <?php if(isset($emailRecovery) && !empty($emailRecovery)){
                                            $_SESSION['recoveryEmail'] = $emailRecovery;
                                        }
                                        ?>

                                        <form action="../index.php?action=passwordInitialisationRequest&amp;emailRecovery=<?=$_SESSION['recoveryEmail']?>" method="post" >
                                            <!-- Mots de passes non identiques -->
                                            <?php if(isset($passwordMatch) && !$passwordMatch): ?>
                                                <div class="alert alert-danger" role="alert">
                                                    Les deux mots de passes ne sont pas identiques, veuillez les vérifier.
                                                </div>
                                            <?php endif ?>

                                            <!-- password input-->
                                            <?php if (isset($emptyFields['password']) && $emptyFields['password']): ?>
                                                <div class="alert alert-danger" role="alert">
                                                    Vous devez saisir un mot de passe!
                                                </div>
                                            <?php endif?>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" type="password" name="password" value="<?=!empty($_POST['password']) ? $_POST['password'] : ''?>"/>
                                                <label for="password">Veuillez insérer le nouveau mot de passe</label>
                                            </div>

                                             <!-- passwordConfirm input-->
                                            <?php if (isset($emptyFields['passwordConfirm']) && $emptyFields['passwordConfirm']): ?>
                                                <div class="alert alert-danger" role="alert">
                                                    Vous devez confirmer le mot de passe!
                                                </div>
                                            <?php endif?>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="passwordConfirm" type="password" name="passwordConfirm" value="<?=!empty($_POST['passwordConfirm']) ? $_POST['passwordConfirm'] : ''?>"/>
                                                <label for="password">Veuillez confirmer le nouveau mot de passe</label>
                                            </div>

                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block" id="submitButton" type="submit">Changer le mot de passe</button></div>
                                            </div>
                                        </form>
                                        <br>
                                        
                                        <!-- URL a été altérée, et l'email de recuperation est perdu -->
                                        <?php if(isset($recoveryEmailError) && $recoveryEmailError): ?>
                                            <div class="alert alert-danger" role="alert">
                                                Nous sommes désolés, une erreur est survenue, veuillez réessayer plus tard.
                                            </div>
                                        <?php endif ?>

                                        <!-- URL a été altérée, et l'email de recuperation est perdu -->
                                        <?php if(isset($passwordUpdateSuccess) && $passwordUpdateSuccess): ?>
                                            <div class="alert alert-success" role="alert">
                                                Le nouveau mot de passe a bien été enregistré, vous pouvez vous connecter avec.
                                                <?php header( "refresh:5;url=view/loginView.php" ); ?>
                                            </div>
                                        <?php endif ?>

                                         <!-- URL a été altérée, et l'email de recuperation est perdu -->
                                         <?php if(isset($passwordUpdateError) && $passwordUpdateError): ?>
                                            <div class="alert alert-danger" role="alert">
                                                Le nouveau mot de passe n'a pas pu être enregistré veuillez réessayer plus tard.
                                                <?php header( "refresh:5;url=view/loginView.php" ); ?>
                                            </div>
                                        <?php endif ?>

                                        
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
