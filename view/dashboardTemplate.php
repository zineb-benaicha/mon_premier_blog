<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?= $pageTitle ?></title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../public/css/stylesAdmin.css" rel="stylesheet" />
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="../index.php?action=displayView&viewName=home">Accueil</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../index.php?action=logout">Se déconnecter</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <br>
                            
                            <a class="nav-link" href="../index.php?action=displayView&viewName=adminDashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt fa-2x"></i></div>
                                Tableau de bord 
                            </a>
                            <br>
                            <a class="nav-link" href="../index.php?action=manageBlogsForAdmin">
                                <div class="sb-nav-link-icon"><i class="far fa-newspaper fa-2x"></i></div>
                                Gestion des posts blogs 
                            </a>
                            <br>
                            <a class="nav-link" href="../index.php?action=manageUsersForAdmin">
                                <div class="sb-nav-link-icon"><i class="fas fa-user fa-2x"></i></div>
                                Gestion des utilisateurs
                            </a>
                            <br>
                            <a class="nav-link" href="../index.php?action=displayView&viewName=adminDashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-envelope fa-2x"></i></div>
                                Gestion des messages
                            </a>
                            <br>
                            <a class="nav-link" href="../index.php?action=manageCommentsForAdmin">
                                <div class="sb-nav-link-icon"><i class="fas fa-comment-alt fa-2x"></i></div>
                                Gestion des commentaires
                            </a>     
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Connecté en tant que:</div>
                        <?= ucfirst($_SESSION['user-name']) ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <?= $pageContent ?>
                </main>

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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../public/assets/demo/chart-area-demo.js"></script>
        <script src="../public/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../public/js/datatables-simple-demo.js"></script>
    </body>
</html>