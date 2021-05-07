<?php


class Article{
    private ?int $id_art;
    private string $art_text;
    private int $author_fk;

    public function __construct(int $id_art, string $art_text, int $author_fk){
        $this->id_art = $id_art;
        $this->art_text = $art_text;
        $this->author_fk = $author_fk;
    }
}