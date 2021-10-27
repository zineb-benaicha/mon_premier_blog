<?php
function displayBlog($data){

    $photoName = 'public\img\photos_blogs/blog_' . $data['id'] . '.jpg';
    
    echo '<div class="card mb-4">
                <a href="#!"><img class="card-img-top" src="' . $photoName . '" alt="image non disponible" /></a>
                <div class="card-body">
                    <div class="small text-muted">' . $data['last_update'] . '</div>
                    <h2 class="card-title">' . htmlspecialchars($data['title']) . '</h2>
                    <p class="card-text">' . nl2br(htmlspecialchars($data['chapo'])) . '</p>
                    <a class="btn btn-primary" href="index.php?action=displayBlog&id='.$data['id'].'">Lire la suite →</a>
                </div>
            </div>';

}
function displayBlog2($listBlogs){
    $data = $listBlogs->fetch();
    if($data != false){
        displayBlog($data);
    }
}
