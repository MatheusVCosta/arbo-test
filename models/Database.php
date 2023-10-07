<?php
class Database
{
    use Config;

    const SQL_SELECT = "SELECT %s FROM %s ";
    const SQL_JOIN   = "INNER JOIN %s on %s %s %s ";
    const SQL_WHERE  = "WHERE %s %s %s ";
    const SQL_ORDER  = "ORDER BY %s %s ";

    protected $pdo;
    protected $table;

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


    public function select(array $fields = []): String
    {
        if (empty($this->table)) {
            $ex = new PDOException("The name table not can empty", 500);
            _exception_response_json($ex);
            throw $ex;
        }

        $filds_string = !empty($fields) ? implode(",", $fields) : "*";

        return sprintf(self::SQL_SELECT, $filds_string, $this->table);
    }

    public function join($tableJoin, $col1, $col2, $operator = "="): String
    {
        return sprintf(self::SQL_JOIN, $tableJoin, $this->table . "." . $col1, $operator, $tableJoin . "." . $col2);
    }
    /**
     *  @param $col1 String
     *  @param $col2 String
     *  @param $operator String
     * 
     *  @return String
     */
    public function where(String $col1, String $col2, String $operator = "="): String
    {
        return sprintf(self::SQL_WHERE, $col1, $operator, $col2);
    }

    protected function prepare($sql)
    {
        return $this->pdo->prepare($sql);
    }
    protected function execute(PDOStatement $stm)
    {
        try {
            $result = $stm->execute();
            return $result;
        } catch (PDOException $ex) {
            _exception_response_json($ex);
            throw new PDOException($ex, 500);
        }
    }
}
