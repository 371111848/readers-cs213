<?php
require_once "config.php";
require_once "functions.php";

session_start();

if (!isset($_GET['p']) OR empty($_GET['p'])) $_GET['p'] = 'home';
if (!isset($_GET['id'])) $_GET['id'] = FALSE;
if (!isset($_GET['tab'])) $_GET['tab'] = FALSE;

load_page($_GET['p'],$_GET['id'],$_GET['tab']);


?>