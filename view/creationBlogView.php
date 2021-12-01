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
$pageTitle = 'Créer un blog';
?>
<?php ob_start();?>
        
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-11">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Créer un nouveau blog post</h3></div>
                                    <div class="card-body">
                                        <?php if ( isset($emptyFields)) {
                                            $title = $_POST['title'];
                                            $chapo = $_POST['chapo'];
                                            $author = $_POST['author'];
                                            $content = $_POST['content'];
                                        } else {
                                            $title = '';
                                            $chapo = '';
                                            $author = '';
                                            $content = '';
                                        }
                                        ?>
                                        
                                        <form action="../index.php?action=createBlogByAdmin" method="post" >
                                            <?php if (isset($emptyFields) && $emptyFields):?> 
                                                <div class="alert alert-danger" role="alert">
                                                    Vous devez remplir touts les champs !
                                                </div>
                                            <?php endif ?>

                                            <!-- Title input-->
                                            
                                            <div class="form-floating mb-3 ">
                                                <input class="form-control" id="title" type="text" name="title" value="<?= $title ?>" />
                                                <label for="name">Titre</label>
                                            </div>

                                            <!-- Chapo input-->
                                            
                                            <div class="form-floating mb-3 ">
                                                <input class="form-control" id="chapo" type="text" name="chapo" value="<?= $chapo ?>"/>
                                                <label for="name">Châpo</label>
                                            </div>

                                            <!-- author input-->
                                            
                                            <div class="form-floating mb-3 ">
                                                <input class="form-control" id="author" type="text" name="author" value="<?= $author ?>"/>
                                                <label for="name">Auteur</label>
                                            </div>

                                            <!-- content input-->
                                            
                                            <div class="form-floating mb-3 ">
                                                <textarea class="form-control" id="content" name="content" rows="20" style="height:100%;"><?= $content ?></textarea>
                                                <label for="content">Contenu</label>
                                            </div>

                                            <!-- Submition button-->
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-dark btn-block" id="submitButton" type="submit">Créer un blog</button></div>
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

