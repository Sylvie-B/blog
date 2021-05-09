<?php


class controller {

    public function displayView(string $view, string $title, array $ref = []) {

        // display header
        require_once $_SERVER['DOCUMENT_ROOT'] . '/View/partials/header.php';
        // display body
        require_once $_SERVER['DOCUMENT_ROOT'] . '/View/' . $view . '.php';
        // display footer
        require_once $_SERVER['DOCUMENT_ROOT'] . '/View/partials/footer.php';
    }
}
