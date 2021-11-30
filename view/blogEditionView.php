<?php
if (session_id() == '') {
    session_start();
}
?>
<?php
$pageTitle = 'Modifier un blog';
?>
<?php ob_start();?>
<div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-11">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Modifier un blog post</h3></div>
                                    <div class="card-body">
                                        
                                        <!-- Old blog informations-->
                                        <?php  
                                        if (isset($blogInformations) && !$blogInformations) {
                                            $oldTitle = '';
                                            $oldChapo = '';
                                            $oldAuthor = '';
                                            $oldContent = '';
                                            $blogUpdateSuccess = false;
                                        }
                                        elseif (isset($blogInformations) && $blogInformations)  {
                                            
                                            $oldTitle = $blogInformations['title'];
                                            $oldChapo = $blogInformations['chapo'];
                                            $oldAuthor = $blogInformations['author'];
                                            $oldContent = $blogInformations['content'];
                                            $idBlog = $blogInformations['id'];
                                        }
                                        elseif (!isset($blogInformations)) {
                                            $oldTitle = $_POST['title'];
                                            $oldChapo = $_POST['chapo'];
                                            $oldAuthor = $_POST['author'];
                                            $oldContent = $_POST['content'];
                                            $idBlog = $_GET['id_blog'];
                                        }
                                        ?>
                                        <?php if (isset($blogUpdateSuccess) && !$blogUpdateSuccess):?> 
                                            <div class="alert alert-danger" role="alert">
                                                Une erreur est survenue veuillez réessayer plus tard.
                                            </div>
                                            <?php header("refresh:2;url=../index.php?action=displayView&viewName=adminDashboard");?>

                                        <?php endif ?>

                                        <form action="../index.php?action=updateBlog&id_blog=<?= $idBlog ?>" method="post" >
                                            <?php if (isset($emptyFields) && $emptyFields): ?> 
                                                <div class="alert alert-danger" role="alert">
                                                    Vous devez devez remplir touts les champs !
                                                </div>
                                            <?php endif ?>
                                            <!-- Title input-->
                                            
                                            <div class="form-floating mb-3 ">
                                                <input class="form-control" id="title" type="text" name="title" value="<?= $oldTitle ?>" />
                                                <label for="name">Titre</label>
                                            </div>

                                            <!-- Chapo input-->
                                            
                                            <div class="form-floating mb-3 ">
                                                <input class="form-control" id="chapo" type="text" name="chapo" value="<?= $oldChapo ?>"/>
                                                <label for="name">Châpo</label>
                                            </div>

                                            <!-- author input-->
                                            
                                            <div class="form-floating mb-3 ">
                                                <input class="form-control" id="author" type="text" name="author" value="<?= $oldAuthor ?>"/>
                                                <label for="name">Auteur</label>
                                            </div>

                                            <!-- content input-->
                                            
                                            <div class="form-floating mb-3 ">
                                                <textarea class="form-control" id="content" name="content" rows="30" style="height:100%;"><?= $oldContent ?></textarea>
                                                <label for="content">Contenu</label>
                                            </div>

                                            <!-- Submition button-->
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-dark btn-block" id="submitButton" type="submit">Appliquer les modifications</button></div>
                                            </div>
                                        </form>
                                        <br>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>                   
<?php $pageContent = ob_get_clean(); ?>

<?php require_once('dashboardTemplateFormular.php'); ?>

