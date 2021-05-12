<?php
// include element
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/BDb.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Article.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Comment.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/artMana.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/controller.php';

// data base connexion
$db = new BDb();
$db = $db->connect();
$mana = new artMana($db);

// display
$view = new controller();


$view->displayView('articleView', 'article');

// display footer
require_once $_SERVER['DOCUMENT_ROOT'] . '/View/partials/footer.php';
var_dump($_POST);
