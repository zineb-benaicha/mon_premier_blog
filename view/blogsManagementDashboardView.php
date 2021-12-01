<?php
if (session_id() == '') {
    session_start();
    
    if (!isset($_SESSION['user-connected'])){
        $userNotAuthorised = true;
    }
    if (isset($_SESSION['user-connected']) && !$_SESSION['user-connected']){
        $userNotAuthorised = true;
    }
    if (isset($_SESSION['user-type-account']) && $_SESSION['user-type-account'] !== 'admin') {
        $userNotAuthorised = true;
    }

    if (isset($userNotAuthorised) && $userNotAuthorised){
        header('Location: ../index.php');
    }
    
}
?>
<?php
$pageTitle = 'Page d\'administration des blogs posts';
?>
<?php ob_start();?>
<div class="container-fluid px-4">
                        <h1 class="mt-4">Les posts blogs</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../index.php?action=displayView&viewName=adminDashboard">Dashboard</a></li>
                            
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Ici vous pouvez créer, supprimer et modifier des blogs posts.
                            </div>
                        </div>
                        <!-- Création de blog -->
                        <form action="../index.php?action=createBlogRequest" method="post">
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <button class="btn btn-dark" id="submitButton" type="submit" name="create">Créer un blog</button>
                            </div>
                        </form>
                        <br>
                        <!-- Update succes/error -->
                        <?php if(isset($updateQueryResult) && $updateQueryResult): ?>
                                <div class="alert alert-success" role="alert">
                                    Le blog a bien été mis à jour !
                                </div>
                        <?php endif ?>
                        <?php if(isset($updateQueryResult) && !$updateQueryResult): ?>
                                <div class="alert alert-success" role="alert">
                                    Une erreur est survenue veuillez réessayer plus tard !
                                </div>
                        <?php endif ?>
                        <!-- Creation succes/error -->
                        <?php if(isset($blogInsertionQueryResult) && $blogInsertionQueryResult): ?>
                                <div class="alert alert-success" role="alert">
                                    Le blog a été créé avec succes !
                                </div>
                        <?php endif ?>
                        <?php if(isset($blogInsertionQueryResult) && !$blogInsertionQueryResult): ?>
                                <div class="alert alert-success" role="alert">
                                    Une erreur est survenue veuillez réessayer plus tard !
                                </div>
                        <?php endif ?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Liste des posts blogs existants.
                            </div>

                            <?php if(isset($blogDeleteSuccess) && $blogDeleteSuccess): ?>
                                <div class="alert alert-success" role="alert">
                                    Le blog a bien été supprimé !
                                </div>
                            <?php endif ?>
                            <?php if(isset($blogDeleteSuccess) && !$blogDeleteSuccess): ?>
                                <div class="alert alert-danger" role="alert">
                                    Une erreur est survenue veuillez réessayer plus tard !
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
                                            <th>N°</th>
                                            <th>Titre</th>                                            
                                            <th>Châpo</th>                                   
                                            <th>Auteur</th>
                                            <th>Dernière mise à jour</th>                                            
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <?php 
                                        $number = '';
                                        $title = '';
                                        $chapo = '';                                        
                                        $author = '';
                                        $last_update = '';                                
                                        $action = '';
                                        
                                        if(isset($queryError) && $queryError) {
                                            $number = 'une erreur est survenue veuillez réessayer plus tard.';
                                            $noContent = true;
                                        }
                                        elseif (isset($blogsListEmpty) && $blogsListEmpty) {
                                            $number = 'Aucun commentaire à afficher';
                                            $noContent = true;
                                        }         
                                                              
                                    ?>
                                    <tbody>
                                        <?php if (isset($noContent) && $noContent): ?>
                                            <tr>
                                                <td><?= $number ?></td>
                                                <td><?= $title ?></td>
                                                <td><?= $chapo ?></td>                                                
                                                <td><?= $author ?></td>
                                                <td><?= $last_update ?></td>
                                                <td><?= $action ?></td>
                                            </tr>
                                        <?php  endif ?>
                                        <?php
                                        if (isset($blogsListEmpty) && !$blogsListEmpty && !isset($queryError)) {
                                            while ($blog = $blogsList->fetch()) {
                                                $number = $blog['id'];
                                                $title = $blog['title'];
                                                $chapo = $blog['chapo'];
                                                $author = $blog['author'];
                                                $last_update = $blog['last_update'];
                                               
                                                $action_edit = '<a href="../index.php?action=editBlogByAdmin&id_blog='. $blog['id'] . '">modifier</a>';
                                                $action_delete = '<a href="../index.php?action=deleteBlogByAdmin&id_blog='. $blog['id'] . '">supprimer</a>';

                                                $action =  $action_edit . ' / ' . $action_delete;
                                                 
                                        ?>
                                        <tr>
                                            <td><?= $number ?></td>
                                            <td><?= $title ?></td>
                                            <td><?= $chapo ?></td>                                                
                                            <td><?= $author ?></td>
                                            <td><?= $last_update ?></td>
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
                                      
<?php $pageContent = ob_get_clean(); ?>

<?php require_once('dashboardTemplate.php'); ?>