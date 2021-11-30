<?php
if (session_id() == '') {
    session_start();
}
?>
<?php
$pageTitle = 'Page d\'administration des utilisateurs';
?>
<?php ob_start();?>
<div class="container-fluid px-4">
                        <h1 class="mt-4">Les utilisateurs</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../index.php?action=displayView&viewName=adminDashboard">Dashboard</a></li>
                            
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Ici vous pouvez gérer les utilisateurs enregistrés, pour les valider ou les supprimer.
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Liste des utilisateurs
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
                                            <th>Nom</th>
                                            <th>Email</th>
                                            <th>Administrateur</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <?php 
                                        $name = '';
                                        $email = '';
                                        $is_admin = '';
                                        $status = '';
                                        $action = '';
                                        

                                        if(isset($queryError) && $queryError) {
                                            $name = 'une erreur est survenue veuillez réessayer plus tard.';
                                            $noContent = true;
                                        }
                                        elseif (isset($usersListEmpty) && $usersListEmpty) {
                                            $name = 'Aucun utilisateur à afficher';
                                            $noContent = true;
                                        }         
                                                              
                                    ?>
                                    <tbody>
                                    <?php if (isset($noContent) && $noContent): ?>
                                        <tr>
                                                <td><?= $name ?></td>
                                                <td><?= $email ?></td>
                                                <td><?= $is_admin ?></td>
                                                <td><?= $status ?></td>
                                                <td><?= $action ?></td>
                                                
                                        </tr>
                                    <?php endif ?>
                                        <?php
                                        if (isset($usersListEmpty) && !$usersListEmpty && !isset($queryError)) {
                                            while ($user = $usersList->fetch()) {
                                                $name = $user['name'];
                                                $email = $user['email'];
                                                $is_admin = $user['is_admin'] == '1' ? 'Oui' : 'Non';
                                                $status = $user['is_validated'] == '1' ? 'Validé' : 'Non validé';
                                                $action_delete = '<a href="../index.php?action=deleteUserByAdmin&id_user='. $user['id'] . '">supprimer</a>';
                                                $action_validate = '<a href="../index.php?action=validateUserByAdmin&id_user='. $user['id'] . '">valider</a>';

                                                $action = $user['is_validated'] == '1' ? $action_delete: $action_delete . ' / ' . $action_validate;
                                                 
                                        ?>
                                        <tr>
                                            <td><?= $name ?></td>
                                            <td><?= $email ?></td>
                                            <td><?= $is_admin ?></td>
                                            <td><?= $status ?></td>
                                            <td><?= $action?></td>
                                            
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

