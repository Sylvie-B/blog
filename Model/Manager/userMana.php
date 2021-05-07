<?php


class userMana
{
    private PDO $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // read database

    // check user form and add to database
    function userForm () {
        if(!empty($_POST)){
            print_r($_POST);
    }

}

    // admin delete user

}

//exchange data with data base