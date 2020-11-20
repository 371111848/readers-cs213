<?php
$page['title']='Books';
include_once "templates/header.php";

?>


    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1 class="display-4 light text-center">All Books</h1>
    </div>

<?php 
load_subpage("books_list_table");
?>

<?php
include_once "templates/footer.php";
?>

