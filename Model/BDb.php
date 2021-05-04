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
        $this->db = 'mini_chat';
        $this->user = 'root';
        $this->password = '';
    }

}