<?php


class controller {
    private PDO $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // request control
    // is this inscription or connexion
    
    public function checkInscription (){
        if(!empty($_POST)){
            if(isset($_POST['pseudo'], $_POST['passW'])){
            }
        }
    }

    //
    /**
     * @param string $view
     * @param string $tab
     * @param array $ref
     */
    public function getView(string $view, string $tab, array $ref = []) {
        // display header
        require_once $_SERVER['DOCUMENT_ROOT'] . '/View/partials/header.php';
        // display body
        require_once $_SERVER['DOCUMENT_ROOT'] . '/View/' . $view . '.php';
        // display footer
        require_once $_SERVER['DOCUMENT_ROOT'] . '/View/partials/footer.php';
    }

}
