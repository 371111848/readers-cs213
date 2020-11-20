<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

$page_alerts = array();

$cfg = array();
$cfg['pages'] = array (
    'home','book','books','category','categories','member','members','group','groups','statistics','leaderboard','about','test','dashboard','upload'
);
$cfg['noid_pages'] = array (
    'home','books','categories','members','groups','statistics','leaderboard','about','test','dashboard','upload'
);

$cfg['links'] = array (
    'home' => '/home'
);

$cfg['headings'] = array (
    'headings' => array("members","books","readings","categories"),
    'members' => array ("id","name","phone","email"),
    'books' => array ("id","title","pages","category"),
    'readings' => array ("member_id","book_id"),
    'categories' => array ("id","name")
);

$cfg['targets'] = array (
    'books' => 5,
    'pages' => 0
);

$cfg['min_members'] = 10;


?> 