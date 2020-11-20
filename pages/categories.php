<?php
$page['title']='Categories';
include_once "templates/header.php";
if ($page['tab'] == "") $page['tab'] = 'list';
?>


    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1 class="display-4 light text-center">Categories</h1>
    </div>


<?php load_subpage("categories_list_table"); ?>

<?php
include_once "templates/footer.php";
?>
