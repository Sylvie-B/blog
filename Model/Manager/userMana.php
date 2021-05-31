<?php


class userMana
{
    private PDO $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // is user exist ?
    public function logIn () {
        $search = $this->pdo->prepare("SELECT * FROM user WHERE pseudo = :pseudo");
        $search->bindValue(":pseudo", $_POST['pseudo']);
        if($search->execute()){
            
        }
        else{
            echo "Utilisateur introuvable";
        }
    }

    // check form, send new user to data base and todo connect user
   public function checkAndConnectUser () {
        if(isset($_POST['pseudo'], $_POST['passWord'])){

            // get data
            // encode password
            $pw = password_hash($_POST['passWord'], PASSWORD_ARGON2ID);
            $this->addUser($_POST['pseudo'], $pw);
        }
        else{
            echo "formulaire incomplet";
        }
   }

    //create if admin
    // check user form and add to database
    /**
     * @param string $pseudo
     * @param string $password
     * @param int $role_fk
     * @return string
     */
    public function addUser(string $pseudo, string $password, int $role_fk = 2){
        $search = $this->pdo->prepare("INSERT INTO user (pseudo, password, role_fk)
        VALUES (:pseudo, :password, :role_fk)
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
     * @param int $id
     * @return User
     */
    public function getUser(int $id) : User {
        $search = $this->pdo->prepare('SELECT * FROM user WHERE id = $id');
        $search->execute();
        $user = $search->fetch();
        $user = new User($user['id'], $user['pseudo'], $user['password'], $user['role_fk']);
        return $user;
    }
    // update
    // user pseudo
    /**
     * @param $id
     * @param $new_pseudo
     */
    public function updateUserPseudo($id, $new_pseudo){
        $search = $this->pdo->prepare("UPDATE user SET $new_pseudo = :new_pseudo WHERE id = :id");
        $search->bindValue(':id', $id);
        $search->bindValue(':new_pseudo', $new_pseudo);
        if($search->execute()){
            echo "Pseudo mis à jour";
        }
    }

    // user password
    /**
     * @param $id
     * @param $new_password
     */
    public function updateUserPass($id, $new_password){
        $search = $this->pdo->prepare("UPDATE user SET $new_password = :password WHERE id = :id");
        $search->bindValue(':id', $id);
        $search->bindValue(':new_password', $new_password);
        if($search->execute()){
            echo "mot de passe mis à jour";
        }
    }

    // delete user if admin

    /**
     * @param $id
     */
    public function supprUser ($id){
        $search = $this->pdo->prepare("DELETE FROM user WHERE id = $id");
        if($search->execute()){
            echo "Utilisateur supprimé";
        }
    }
}
