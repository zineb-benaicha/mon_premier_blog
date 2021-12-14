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
$pageTitle = 'Page d\'administration des commentaires';
?>
<?php ob_start();?>
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
                                            <th>N°</th>
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
                                        <?php endif ?>
                                        <?php
                                        if (isset($commentsListEmpty) && !$commentsListEmpty && !isset($queryError)) {
                                            foreach ($commentsList as $comment) {
                                                $number = $comment->id();
                                                $content = $comment->content();
                                                $creation_date = $comment->creationDate();
                                                $associated_blog = $comment->idBlog();
                                                $status = $comment->validated() == '1' ? 'Validé' : 'Non validé';
                                                $editor = $comment->idUser();
                                                $action_delete = '<a href="../index.php?action=deleteCommentByAdmin&id_comment='. $comment->id() . '">supprimer</a>';
                                                $action_validate = '<a href="../index.php?action=validateCommentByAdmin&id_comment='. $comment->id() . '">valider</a>';

                                                $action = $comment->validated() == '1' ? $action_delete: $action_delete . ' / ' . $action_validate;
                                                 
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
                                        <?php 
                                            }
                                        }   
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<?php $pageContent = ob_get_clean(); ?>

<?php require_once('dashboardTemplate.php'); ?>

