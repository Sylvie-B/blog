<?php

// include element
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/BDb.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Article.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/artMana.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/View/connexion.php';

// data base connexion
$db = new BDb();
$db = $db->connect();
$mana = new artMana($db);

// if isset admin
//      display CRUD article, user, comt
// if isset user
//      display CRUD user's comt

require_once $_SERVER['DOCUMENT_ROOT'] . '/View/partials/header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/View/' . $page . '.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/View/partials/footer.php';
