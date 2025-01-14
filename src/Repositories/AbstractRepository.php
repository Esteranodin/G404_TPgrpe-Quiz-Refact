<?php

abstract class AbstractRepository 
{
    protected PDO $db;

    // Constructeur de la classe, initialise la connexion à la base de données
    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=quiz_td', 'root', '');
    }

}