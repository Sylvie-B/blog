<?php


class userMana
{
    private PDO $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    //create if admin
    // check user form and add to database
    /**
     * @param string $pseudo
     * @param string $password
     * @param int $role_fk
     * @return string
     */
    public function addUser(string $pseudo, string $password, int $role_fk){
        $search = $this->pdo->prepare("INSERT INTO user (pseudo, password, role_fk)
        VALUE (:pseudo, :password, :role_fk)
        ");
        $search->bindValue(':pseudo', strip_tags($pseudo));
        $search->bindValue(':password', $password);
        $search->bindValue(':role_fk', $role_fk, PDO::PARAM_INT);
        $search->execute();
        return $this->pdo->lastInsertId();
    }

    // read
    // all user
    /**
     * @return array
     */
    public function getAllUser(): array {
        $blogUser = [];
        $search = $this->pdo->prepare('SELECT * FROM user');
        $state = $search->execute();
        if($state){
            $line = $search->fetchAll();
            foreach ($line as $data) {
                $blogUser[] = new User($data['id'], $data['pseudo'], $data['password'], $data['role_fk']);
            }
        }
        return $blogUser;
    }

    // one user

    /**
     * @param $id
     * @return string|User
     */
    public function getUser($id) {
        $user = "";
        $search = $this->pdo->prepare('SELECT * FROM user WHERE id = $id');
        $state = $search->execute();

        if($state){
            $user = $search->fetch();
            $user = new User($user['id'], $user['pseudo'], $user['password'], $user['role_fk']);
        }
        return $user;
    }

    // update
    /**
     * @param $id
     * @param $new_pseudo
     * @param $new_password
     */
    public function updateUser($id, $new_pseudo, $new_password){
        $search = $this->pdo->prepare("UPDATE user SET $new_pseudo = :new_pseudo, $new_password = :password WHERE id = :id");
    }

    // delete user if admin

}

//exchange data with data base