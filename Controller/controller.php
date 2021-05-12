<?php


class controller {
    // display the selected view
    /**
     * @param string $view
     * @param string $tab
     * @param array $ref
     */
    public function displayView(string $view, string $tab) {
        // display header
        require_once $_SERVER['DOCUMENT_ROOT'] . '/View/partials/header.php';
        // display body
        require_once $_SERVER['DOCUMENT_ROOT'] . '/View/' . $view . '.php';
    }
}
    // use manager to get data and send result to view
