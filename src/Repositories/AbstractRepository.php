<?php
abstract class AbstractRepository 
{
    protected PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }
}