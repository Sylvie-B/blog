<?php


class BDb
{
    private string $server;
    private string $db;
    private string $user;
    private string $password;

    /**
     * DbChat constructor.
     */
    public function __construct() {
        $this->server ='localhost';
        $this->db = 'blog';
        $this->user = 'root';
        $this->password = '';
    }

}