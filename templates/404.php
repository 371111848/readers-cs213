<?php
$page['title']='404 Not Found';
include_once "templates/simple-header.php";
?>


<main role="main" class="d-flex  justify-content-center align-items-center" style="height: 90vh">
    <div class="p-2">
        <i class="fas fa-exclamation display-1 text-danger mr-5"></i>
    </div>
    <div class="p-2">
    
        <h1>Not found!</h1>
        <p class="lead">Sorry, we can't find the requested page.</p>
        <a class="btn btn-primary" href="<?=$cfg['links']['home']?>">Go Home</a>

    </div>
</main>




<?php
include_once "templates/footer.php";
?>