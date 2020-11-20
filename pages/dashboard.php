<?php
$page['title']='Dashboard';
include_once "templates/header.php";
?>


    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1 class="display-4 light text-center">Dashboard</h1>
        <p class="lead text-center"> Welcome to Readers - The Group Reading Tracker </p>
    </div>
    <div class="content text-center">

    <?php
    if (is_data_uploaded()): 
        load_subpage("dashboard_statistics");
    else: ?>
    <div class="row justify-content-center">
    <div class="col-md-6 alert alert-secondary" role="alert">
        <h4 class="alert-heading">Let's Start!</h4>
        <p>To start, you need to upload your data. </p>
        <hr>
        <a class="btn btn-primary text-white" href="/upload">Upload Data</a>
    </div>
    </div>
    
    <?php endif; ?>

    </div>

<?php
include_once "templates/footer.php";
?>

