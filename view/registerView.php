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
                                        <form>
                                            
                                                
                                            <div class="form-floating mb-3 ">
                                                <input class="form-control" id="inputFirstName" type="text" />
                                                <label for="inputFirstName">Nom</label>
                                            </div>                                              
                                            
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" />
                                                <label for="inputEmail">Adresse e-mail</label>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" type="password" />
                                                        <label for="inputPassword">Mot de passe</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" type="password" />
                                                        <label for="inputPasswordConfirm">Confirmer le mot de passe</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-floating mb-3 ">
                                                
                                                <select class="form-select" aria-label="Default select example" id="accountType" name="accountType">
                                                    <option selected>Choisir un type de compte</option>
                                                    <option value="utilisateur">Utilisateur</option>
                                                    <option value="administrateur">Administrateur</option>
                                                </select>
                                                
                                            </div> 
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><a class="btn btn-primary btn-block" href="loginView.php">Créer un compte</a></div>
                                            </div>
                                        </form>
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
