<?php
class Database
{
    use Config;
    public function getConnection()
    {
        $config = $this->get_sentings();
        $dbname = $config->DB_NAME;
        $dbhost = $config->DB_HOST;
        $dbuser = $config->DB_USER;
        $dbpassword = $config->DB_PASSWORD;

        try {
            $opcoes = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
            $pdo = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $dbuser, $dbpassword, $opcoes);
            return $pdo;
        } catch (PDOException $ex) {
            throw new PDOException($ex);
        }
    }
}
