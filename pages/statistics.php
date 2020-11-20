<?php
$page['title']='Statistics';
include_once "templates/header.php";
$books = load_data("books");
?>

    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1 class="display-4 light text-center">Statistics</h1>
    </div>
<?php
    load_subpage("dashboard_statistics");

include_once "templates/footer.php";
?>

