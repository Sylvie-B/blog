<?php


class Article{
    private ?int $id_art;
    private string $title;
    private string $art_text;
    private int $author_fk;

    public function __construct(int $id_art = null, string $title, string $art_text, int $author_fk){
        $this->id_art = $id_art;
        $this->title = $title;
        $this->art_text = $art_text;
        $this->author_fk = $author_fk;
    }

    /**
     * @return int|null
     */
    public function getIdArt(): ?int
    {
        return $this->id_art;
    }

    /**
     * @param int|null $id_art
     */
    public function setIdArt(?int $id_art): void
    {
        $this->id_art = $id_art;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getArtText(): string
    {
        return $this->art_text;
    }

    /**
     * @param string $art_text
     */
    public function setArtText(string $art_text): void
    {
        $this->art_text = $art_text;
    }

    /**
     * @return int
     */
    public function getAuthorFk(): int
    {
        return $this->author_fk;
    }

    /**
     * @param int $author_fk
     */
    public function setAuthorFk(int $author_fk): void
    {
        $this->author_fk = $author_fk;
    }


}