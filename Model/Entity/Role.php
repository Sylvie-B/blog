<?php


class Role {
    private ?int $id_rol;
    private string $comment;

    public function __construct(int $id_rol, string $comment){
        $this->id_rol = $id_rol;
        $this->comment = $comment;
    }

    /**
     * @return int|null
     */
    public function getIdRol(): ?int
    {
        return $this->id_rol;
    }

    /**
     * @param int|null $id_rol
     */
    public function setIdRol(?int $id_rol): void
    {
        $this->id_rol = $id_rol;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

}