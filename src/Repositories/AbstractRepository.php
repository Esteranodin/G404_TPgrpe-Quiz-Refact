<?php

abstract class AbstractRepository 
{
    protected PDO $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=quiz_td', 'root', '');
    }

}