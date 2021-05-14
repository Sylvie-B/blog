<?php


class controller {
    private PDO $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // display the selected view

    /**
     * @param string $view
     * @param string $tab
     * @param array $ref
     */
    public function selectView(string $view, string $tab, array $ref = []) {
        // display header
        require_once $_SERVER['DOCUMENT_ROOT'] . '/View/partials/header.php';
        // display body
        require_once $_SERVER['DOCUMENT_ROOT'] . '/View/' . $view . '.php';
        // display footer
        require_once $_SERVER['DOCUMENT_ROOT'] . '/View/partials/footer.php';
    }

}
