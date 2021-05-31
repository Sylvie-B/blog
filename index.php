<?php
// include element
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/BDb.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Article.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Comment.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Role.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/User.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/artMana.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/comtMana.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/roleMana.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/controller.php';

// data base connexion
$db = new BDb();
$db = $db->connect();



//echo '<pre>';
//print_r($_GET);
//print_r($_POST);
//echo '<pre>';
