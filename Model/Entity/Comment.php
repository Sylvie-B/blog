<?php


class comment {
    private ?int $id_com;
    private string $com_text;
    private int $user_fk;
    private int $art_fk;

    public function __construct(int $id_com, string $com_text, int $user_fk, int $art_fk){
        $this->id_com = $id_com;
        $this->com_text = $com_text;
        $this->user_fk = $user_fk;
        $this->art_fk = $art_fk;
    }

    /**
     * @return int|null
     */
    public function getIdCom(): ?int
    {
        return $this->id_com;
    }

    /**
     * @param int|null $id_com
     */
    public function setIdCom(?int $id_com): void
    {
        $this->id_com = $id_com;
    }

    /**
     * @return string
     */
    public function getComText(): string
    {
        return $this->com_text;
    }

    /**
     * @param string $com_text
     */
    public function setComText(string $com_text): void
    {
        $this->com_text = $com_text;
    }

    /**
     * @return int
     */
    public function getUserFk(): int
    {
        return $this->user_fk;
    }

    /**
     * @param int $user_fk
     */
    public function setUserFk(int $user_fk): void
    {
        $this->user_fk = $user_fk;
    }

    /**
     * @return int
     */
    public function getArtFk(): int
    {
        return $this->art_fk;
    }

    /**
     * @param int $art_fk
     */
    public function setArtFk(int $art_fk): void
    {
        $this->art_fk = $art_fk;
    }

}