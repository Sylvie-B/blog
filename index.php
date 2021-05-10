<?php
// include element
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/BDb.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Article.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/artMana.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Controller/controller.php';

// data base connexion
$db = new BDb();
$db = $db->connect();
$mana = new artMana($db);

// display
$view = new controller();

$ref = [
    'title' => 'art-1',
    'text' => 'ceci est mon texte',
    'author' => 'Heliosens'
];

$view->displayView('articleView', 'Mon blog', [$ref]);