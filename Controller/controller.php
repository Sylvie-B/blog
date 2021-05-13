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
    public function displayView(string $view, string $tab, $ref = []) {
        // display header
        require_once $_SERVER['DOCUMENT_ROOT'] . '/View/partials/header.php';
        // display body
        require_once $_SERVER['DOCUMENT_ROOT'] . '/View/' . $view . '.php';
        // display footer
        require_once $_SERVER['DOCUMENT_ROOT'] . '/View/partials/footer.php';
    }

    public function checkForm () {
        if(isset($_POST['title'], $_POST['art_text'])){
            // get data
            // remove tags
            $title = strip_tags($_POST['title']);
            $art_text = strip_tags($_POST['art_text']);
            // todo get author fk
            $author_fk = 1;

            // send data to database
            $sql = $this->pdo->prepare("
                INSERT INTO 'article'('title', 'art_text', 'author_fk')
                VALUES (:title, :art_text, :fk)");

            $sql->bindValue(":title", $title);
            $sql->bindValue(":art_text", $art_text);
            $sql->bindValue(":fk", $author_fk);

            if($sql->execute()){
                echo "article ajouté";
            }
            else {
                echo "erreur lors de l'ajout";
            }
        }
        else {
            echo "Veuillez remplir tous les champs";
        }
    }
}


