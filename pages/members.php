<?php
$page['title']='Members';
include_once "templates/header.php";
if ($page['tab'] == "") $page['tab'] = 'reading';
if (count(load_data("members"))<20) add_alert("The No. Members loaded (".count(load_data("members")).") is less than the minimum required No. Members (".$cfg['min_members'].")","danger");
?>

    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1 class="display-4 light text-center">All Members</h1>
    </div>

<nav class="mb-1 ">
  <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
    <a class="nav-item nav-link <?=is_active($page['tab'],'reading')?>" id="nav-reading-tab"  href="/members/reading" role="tab" aria-controls="nav-reading" aria-selected="true">Reading</a>
    <a class="nav-item nav-link <?=is_active($page['tab'],'info')?>" id="nav-info-tab"  href="/members/info" role="tab" aria-controls="nav-info" aria-selected="false">Info</a>
  </div>
</nav>

<?php
if ($page['tab']=='info') load_subpage("members_info_table"); else load_subpage("members_reading_table"); ?>

<?php
include_once "templates/footer.php";
?>

