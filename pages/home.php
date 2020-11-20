<?php
$page['title']='Home';
include_once "templates/simple-header.php";
?>

<main role="main" class="d-flex row justify-content-center align-items-center m-5 " style="height: 90vh">
    <div class="col-sm-4 col-12 text-center d-none d-sm-block ">
        <i class="fas display-1 text-primary fa-book-reader mr-md-5 mr-sm-3 float-right "></i>
    </div>
    <div class="col-sm-6 col-12 justify-content-center text-center text-sm-left ">
    <i class="fas display-1 d-sm-none text-primary fa-book-reader mb-5"></i>
        <h1 class="display-3 ">Readers</h1>
        <p class="lead text-center text-sm-left">The Group Reading Tracker</p>

        <a class="btn btn-primary " href="/dashboard">Dashboard</a>
    </div>
</main>
<?php
include_once "templates/footer.php";
?>

