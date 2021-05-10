<?php


class roleMana {
    private PDO $pdo;

    public function __construt($pdo) {
        $this->pdo = $pdo;
    }

    // create
    /**
     * @param string $roleName
     * @return string
     */
    public function addRole (string $roleName) {
        $search = $this->pdo->prepare("INSERT INTO role (roleName) VALUE (:roleName)");
        $search->bindValue(':roleName', strip_tags($roleName));
        $search->execute();
        return $this->pdo->lastInsertId();
    }

    // read

    /**
     * @return array
     */
    public function getRoles () {
        $role = [];
        $search = $this->pdo->prepare("SELECT * FROM role ");
        if($search->execute()){
            $line = $search->fetchAll();
            foreach ($line as $data) {
                $role[] = new Role($data['id_rol'], $data['roleName']);
            }
        }
        return $role;
    }

    /**
     * @param int $id
     * @return Role
     */
    public function getOneRole (int $id){
        $search = $this->pdo->prepare("SELECT * FROM role WHERE id_rol = $id");
        $search->execute();
        $role = $search->fetch();
        $role = new Role($role['id_rol'], $role['roleName']);
        return $role;
    }
}