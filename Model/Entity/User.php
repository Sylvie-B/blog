<?php


class User
{
    private ?int $id;
    private string $pseudo;
    private string $password;
    private int $role_fk;

    public function __construct(int $id, string $pseudo, string $password, int $role_fk){
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->password = $password;
        $this->role_fk = $role_fk;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * @param string $pseudo
     */
    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function getRoleFk(): int
    {
        return $this->role_fk;
    }

    /**
     * @param int $role_fk
     */
    public function setRoleFk(int $role_fk): void
    {
        $this->role_fk = $role_fk;
    }

}