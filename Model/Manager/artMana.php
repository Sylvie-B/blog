<?php


class artMana {
    private PDO $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Create
    public function addArticle (string $art_text, int $author_fk): bool {
        $search = $this->pdo->prepare("INSERT INTO article (art_text, author_fk) VALUE (:art_text, :author_fk)");
        $search->bindValue(':art_text', strip_tags($art_text));
        $search->bindValue(':author_fk', $author_fk,PDO::PARAM_INT);
        $search->execute();
        return $this->pdo->lastInsertId() !== 0;
    }
    // Read
    // all articles
    public function getBlogArticles(): array {
        $blogArt = [];
        $search = $this->pdo->prepare("SELECT * FROM article");
        $state = $search->execute();

        if($state){
            $line = $search->fetchAll();
            foreach ($line as $data) {
                $blogArt[] = new Article($data['id_art'], $data['art_text'], $data['author_fk']);
            }
        }
        return $blogArt;
    }

    // one article
    public function getArticle($id){
        $article ='';
        $search = $this->pdo->prepare("SELECT * FROM article WHERE id_art = $id");
        $state = $search->execute();

        if($state){
            $article = $search->fetch();
            $article = new Article($article['id_art'], $article['art_text'], $article['author_fk']);
        }
        return $article;
    }

    // UpdateArt
    public function updateArt($id, $new_text){
        $search = $this->pdo->prepare("UPDATE article SET art_text = :new_text WHERE id_art = :id");

        $search->bindParam(':new_text', $new_text);
        $search->bindParam(':id', $id);
        if($search->execute()){
            echo "L'article a été mis à jour";
        }

    }

    // DeleteArt
    public function supprArt ($id){
        $search = $this->pdo->prepare("DELETE FROM article WHERE id_art = $id");
        if($search->execute()) {
            echo "L'article a été supprimé";
        }
    }
}
