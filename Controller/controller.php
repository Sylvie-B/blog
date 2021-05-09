<?php


class controller {
    // get data
    public function notFound() {
        $this->render('404', 'NOFUND', [
            'page' => $_GET['ctrl']
        ]);
    }
    // send data
    public function render(string $view, string $title, array $vars = []) {
        // On rend le partial header.
        require_once $_SERVER['DOCUMENT_ROOT'] . '/View/_partials/header.php';

        // On rend la vue demandée.
        require_once $_SERVER['DOCUMENT_ROOT'] . '/View/' . $view . '.view.php';

        // On rend le partial footer.
        require_once $_SERVER['DOCUMENT_ROOT'] . '/View/_partials/footer.php';
    }
}