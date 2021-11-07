<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Enregistrement</title>
        <link href="../public/css/stylesAdmin.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
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

                                            
                                            <?php if(isset($passwordMatch) && $passwordMatch === false): ?>
                                                <div class="alert alert-danger" role="alert">
                                                        Les deux mots de passe sont différents!
                                                    </div>
                                            <?php endif ?>
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
                                        <?php if(isset($userRigistred) && $userRigistred): ?>
                                            <?php if($_POST['accountType'] == 'utilisateur'): ?>
                                                <div class="alert alert-success" role="alert">
                                                        Votre compte est créé vous pouvez vous connecter!
                                                </div>
                                                <?php else: ?>
                                                    <div class="alert alert-success" role="alert">
                                                        Votre demande de création d'un compte administrateur a bien été enregistrée, veuillez attendre qu'un administrateur du site vous la valide!
                                                </div>
                                            <?php endif ?>  
                                        <?php endif ?>
                                        
                                        <!-- L'e-mail inséré existe déjà avec un autre compte! création de compte impossible -->
                                        <?php if(isset($emailExists) && $emailExists ):?>
                                            <div class="alert alert-danger" role="alert">
                                                Cette adresse e-amil est déjà liée à un autre compte! veuillez vous connectez avec ou en saisir une autre.
                                            </div>
                                        <?php endif ?>

                                        <!-- l'email n'existe pas mais une erreure empêche la création de compte -->
                                        <?php if(isset($emailExists) && !$emailExists && isset($userRigistred) && !$userRigistred):?>
                                            <div class="alert alert-danger" role="alert">
                                                Une erreur est survenue, veuillez réessayer plus tard!
                                            </div>
                                        <?php endif ?>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="loginView.php">Si vous possédez déjà un compte connectez vous</a></div>
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
