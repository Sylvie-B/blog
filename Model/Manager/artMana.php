<?php


class artMana {
    private PDO $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * add article in database
     * @param string $title
     * @param string $art_text
     * @param int $author_fk
     * @return string
     */
    public function addArticle (string $title, string $art_text, int $author_fk) {
        $search = $this->pdo->prepare("
            INSERT INTO article (title, art_text, author_fk)
            VALUE (:title, :art_text, :author_fk)");
        $search->bindValue(':title', strip_tags($title));
        $search->bindValue(':art_text', strip_tags($art_text));
        $search->bindValue(':author_fk', $author_fk,PDO::PARAM_INT);
        $search->execute();
        return $this->pdo->lastInsertId() !== 0;
    }

    /**
     * get all user's articles
     * @param null $user
     * @return array
     */
    public function getBlogArticles($user = null): array {
        $blogArt = [];
        $param = 0;
        $search = false;
        if($user){
            $param ++;
        }
        switch ($param){
            case 0:
                $search = $this->pdo->prepare("SELECT * FROM article");
                break;
            case 1 :
                $search = $this->pdo->prepare("SELECT * FROM article WHERE author_fk = $user");
        }

        if($search->execute()){
            $line = $search->fetchAll();
            foreach ($line as $data) {
                $blogArt[] = new Article($data['id_art'], $data['title'], $data['art_text'], $data['author_fk']);
            }
        }
        return $blogArt;
    }

    /**
     * get one article
     * @param $id
     * @return Article
     */
    public function getArticle($id) : Article {
        $search = $this->pdo->prepare("SELECT * FROM article WHERE id_art = $id");
        $search->execute();
        $article = $search->fetch();
        $article = new Article($article['id_art'], $article['title'], $article['art_text'], $article['author_fk']);
        return $article;
    }

    /**
     * Update article
     * @param $id
     * @param $new_text
     */
    public function updateArt($id, $new_text){
        $search = $this->pdo->prepare("UPDATE article SET art_text = :new_text WHERE id_art = :id");

        $search->bindParam(':new_text', $new_text);
        $search->bindParam(':id', $id);
        if($search->execute()){
            echo "L'article a été mis à jour";
        }
    }

    /**
     * Delete article
     * @param $id
     */
    public function supprArt ($id){
        $search = $this->pdo->prepare("DELETE FROM article WHERE id_art = $id");
        if($search->execute()) {
            echo "L'article a été supprimé";
        }
    }
}
