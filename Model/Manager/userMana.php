<?php


class userMana
{
    private PDO $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    //create if admin
    // check user form and add to database
    function userForm () {
        if(!empty($_POST)){
            print_r($_POST);
        }
    }

    // read

    // update

    // delete user if admin

}

//exchange data with data base