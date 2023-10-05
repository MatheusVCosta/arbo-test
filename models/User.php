<?php

class User extends Database
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = $this->getConnection();
    }
    // public function fetch()
    // {
    //     $stm = $this->pdo->query("Select * from users");
    //     if ($stm->rowCount() > 0) {
    //         return $stm->fetchAll(PDO::FETCH_ASSOC);
    //     } else {
    //         return [];
    //     }
    // }

    // public function fetchId($id)
    // {
    //     $stm = $this->pdo->prepare("SELECT * FROM users where id = ?");
    //     $stm->execute([$id]);

    //     return $stm->fetch(PDO::FETCH_ASSOC);
    // }
}
