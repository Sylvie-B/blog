<?php


class comtMana {
    private PDO $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Create
    public function addComt (string $com_text, int $user_fk, int $art_fk): bool {
        $search = $this->pdo->prepare("
            INSERT INTO comment (com_text, user_fk, art_fk) VALUE (:com_text, :user_fk, :art_fk)
        ");
        $search->bindValue(':com_txt', $com_text);
        $search->bindValue('user_fk', $user_fk);
        $search->bindValue('art_fk', $art_fk);
        $search->execute();
        return $this->pdo->lastInsertId();
    }

    // Read
    // all comments or one article's comments or one user's comments
    public function getComts($art = 0, $user = 0): array{
        $Comts = [];
        $search = "";
        // which param is there ?
        $param = 0;
        if ($art) {
            $param++;
        }
        if ($user) {
            $param = $param + 2;
        }
        switch ($param) {
            case 0:
                $search = $this->pdo->prepare("SELECT * FROM comment");
                break;
            case 1:
                $search = $this->pdo->prepare("SELECT * FROM comment WHERE art_fk = $art");
                break;
            case 3:
                $search = $this->pdo->prepare("SELECT * FROM comment WHERE user_fk = $user");
                break;
        }

        $state = $search->execute();

        if($state){
            $line = $search->fetchAll();
            foreach ($line as $data) {
                $Comts[] = new Comment($data['id_com'], $data['com_text'], $data['user_fk'], $data['art_fk']);
            }
        }
        return $Comts;
    }

    // one comment
    public function getOneComt($id){
        $comment = '';
        $search = $this->pdo->prepare("SELECT * FROM comment WHERE id_com = $id");
        $state = $search->execute();

        if($state){
            $comment = $search->fetch();
            $comment = new Comment($comment['id_com'], $comment['com_text'], $comment['user_fk'], $comment['art_fk']);
        }
        return $comment;
    }

    // update
    public function updateComt ($id, $new_text){
        $search = $this->pdo->prepare("UPDATE comment SET com_text = :new_text WHERE id_com = :id");

        $search->bindParam('id', $id);
        $search->bindParam('new_text', $new_text);
        if($search->execute()){
            echo "Le commentaire a été mis à jour";
        }
    }

    // deleteComt
    public function supprComt ($id){
        $search = $this->pdo->prepare("DELETE FROM comment WHERE id_com = $id");
        if($search->execute()){
            echo "Le commentaire a été supprimé";
        }
    }
}
