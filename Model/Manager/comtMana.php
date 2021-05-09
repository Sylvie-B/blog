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
        return $this->pdo->lastInsertId() !== 0;
    }

    // Read
    // all comments
    public function getBlogComts(): array {
        $blogComts = [];
        $search = $this->pdo->prepare("SELECT * FROM comment");
        $state = $search->execute();

        if($state){
            $line = $search->fetchAll();
            foreach ($line as $data) {
                $blogArt[] = new Article($data['id_art'], $data['art_text'], $data['author_fk']);
            }
        }
        return $blogComts;
    }

    // one comment
    public function getOneComt($id){
        $comment = [];
        $search = $this->pdo->prepare("SELECT * FROM comment WHERE ");
        $state = $search->execute();

        if($state){
            $article = $search->fetch();
            $article = new Article($article['id_art'], $article['art_text'], $article['author_fk']);
        }
        return $comment;
    }
}