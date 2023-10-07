<?php
class Database
{
    use Config;

    const SQL_SELECT = "SELECT %s FROM %s ";
    const SQL_JOIN   = "INNER JOIN %s on %s %s %s ";
    const SQL_WHERE  = "WHERE %s %s %s ";
    const SQL_ORDER  = "ORDER BY %s %s ";

    const SQL_INSERT = "INSERT INTO %s (%s) VALUES ()%s";
    const SQL_UPDATE = "UPDATE %s SET %s";
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

    public function update(array $values): String
    {
        if (empty($this->table)) {
            $ex = new PDOException("The name table not can empty", 500);
            _exception_response_json($ex);
            throw $ex;
        }

        $updateArr = [];
        foreach ($values as $k => $v) {
            $v = is_numeric($v) ? $v : "'" . $v . "'";
            $updateArr = array_merge($updateArr, [$k . " = " . $v]);
        }
        $updateStr = sprintf(self::SQL_UPDATE, $this->table, implode(",", $updateArr));
        return $updateStr;
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

    public function join($tableJoin, $colActual, $colJoin, $operator = "=", $tableActual = ""): String
    {
        $tableActual = !$tableActual ? $this->table : $tableActual;
        return sprintf(self::SQL_JOIN, $tableJoin,  $tableActual . "." . $colActual, $operator, $tableJoin . "." . $colJoin);
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
