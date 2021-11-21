<?php
if (session_id() == '') {
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
        <title>Tables - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../public/css/stylesAdmin.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Les commentaires</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../index.php?action=displayView&viewName=adminDashboard">Dashboard</a></li>
                            
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Ici vous pouvez gérer commentaires émis par les utilisateurs, pour les valider ou les supprimer.
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Liste des Commentaires
                            </div>
                            <?php if(isset($userDeleteSuccess) && $userDeleteSuccess): ?>
                                <div class="alert alert-success" role="alert">
                                    L'utilisateur a bien été supprimé !
                                </div>
                            <?php endif ?>
                            <?php if(isset($userDeleteSuccess) && !$userDeleteSuccess): ?>
                                <div class="alert alert-danger" role="alert">
                                    Cet utilisateur a du contnu sur ce site, veuillez le supprimer d'abord.
                                </div>
                            <?php endif ?>

                            <?php if(isset($userValidateSuccess) && $userValidateSuccess): ?>
                                <div class="alert alert-success" role="alert">
                                    L'utilisateur a bien été validé !
                                </div>
                            <?php endif ?>
                            <?php if(isset($userValidateSuccess) && !$userValidateSuccess): ?>
                                <div class="alert alert-danger" role="alert">
                                    Une erreur est survenue veuillez réessayer plus tard !
                                </div>
                            <?php endif ?>

                            
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Numéro unique</th>
                                            <th>Contenu</th>
                                            <th>Date de création</th>
                                            <th>Blog associé</th>
                                            <th>Status</th>
                                            <th>Editeur</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <?php 
                                        $number = '';
                                        $content = '';
                                        $creation_date = '';
                                        $associated_blog = '';
                                        $status = '';
                                        $editor = '';
                                        $action = '';
                                        

                                        if(isset($queryError) && $queryError) {
                                            $number = 'une erreur est survenue veuillez réessayer plus tard.';
                                            $noContent = true;
                                        }
                                        elseif (isset($commentsListEmpty) && $commentsListEmpty) {
                                            $number = 'Aucun commentaire à afficher';
                                            $noContent = true;
                                        }         
                                                              
                                    ?>
                                    <tbody>
                                        <?php if (isset($noContent) && $noContent): ?>
                                            <tr>
                                                <td><?= $number ?></td>
                                                <td><?= $content ?></td>
                                                <td><?= $creation_date ?></td>
                                                <td><?= $associated_blog ?></td>
                                                <td><?= $status ?></td>
                                                <td><?= $editor ?></td>
                                                <td><?= $action ?></td>
                                            </tr>
                                        <? endif ?>
                                        <?php
                                        if (isset($commentsListEmpty) && !$commentsListEmpty && !isset($queryError)) {
                                            while ($comment = $commentsList->fetch()) {
                                                $number = $comment['id'];
                                                $content = $comment['content'];
                                                $creation_date = $comment['creation_date'];
                                                $associated_blog = $comment['id_blog'];
                                                $status = $comment['is_validated'] == '1' ? 'Validé' : 'Non validé';
                                                $editor = $comment['id_user'];
                                                $action_delete = '<a href="../index.php?action=deleteCommentByAdmin&id_comment='. $comment['id'] . '">supprimer</a>';
                                                $action_validate = '<a href="../index.php?action=validateCommentByAdmin&id_comment='. $comment['id'] . '">valider</a>';

                                                $action = $comment['is_validated'] == '1' ? $action_delete: $action_delete . ' / ' . $action_validate;
                                                 
                                        ?>
                                        <tr>
                                            <td><?= $number ?></td>
                                            <td><?= $content ?></td>
                                            <td><?= $creation_date ?></td>
                                            <td><?= $associated_blog ?></td>
                                            <td><?= $status ?></td>
                                            <td><?= $editor ?></td>
                                            <td><?= $action ?></td>                                                                                   
                                        </tr>
                                        <?php }
                                        }   
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../public/js/datatables-simple-demo.js"></script>
    </body>
</html>
