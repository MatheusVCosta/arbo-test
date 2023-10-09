<?php
class BasicORM extends Database
{
    const SQL_SELECT      = "SELECT {columns} ";
    const SQL_FROM        = "FROM {table_main} ";
    const SQL_INNER_JOIN  = "INNER JOIN {table_join_1} on {condition_1} {operator} {condition_2} ";

    const SQL_WHERE       = "WHERE {condition_1} {operator} {condition_2} ";

    // DEFINIR PELO METODO WHERE CASO EXISTA MAIS DE UM WHERE SERA DEFINIDO COMO PADRAO O AND
    const SQL_WHERE_AND   = "AND {condition_1} {operator} {condition_2} ";
    const SQL_WHERE_OR    = "OR {condition_1} {operator} {condition_2} ";

    private $selectArr = [];
    private $from      = [];
    private $joinArr   = [];
    private $whereArr  = [];

    private $stmScriptArr;
    private $stmScript;

    protected function _select($table, $columns = [])
    {
        if (empty($columns)) {
            $allFilds = "*";
            $columns  = [$allFilds];
        }
        $this->selectArr = ["{columns}" => $columns];
        $this->_from($table);
    }
    protected function _from($table)
    {
        $this->from = ["{table_main}" => $table];
    }
    protected function _join($table_join, $condtion_1, $condtion_2, $operator = "=")
    {
        array_push($this->joinArr, [
            "{table_join_1}" => $table_join,
            "{condition_1}" => $condtion_1,
            "{operator}" => $operator,
            "{condition_2}" => $condtion_2,
        ]);
    }
    protected function _where($condition_1, $condition_2, $operator = "=")
    {

        array_push($this->whereArr, [
            "{condition_1}" => $condition_1,
            "{operator}"    => $operator,
            "{condition_2}" => $condition_2
        ]);
    }
    protected function _fetch()
    {
        $script = $this->construct_query();
        if (!empty($script)) {
            $stm = $this->pdo->prepare($script);
            $stm->execute();
            if (!$stm->rowCount() > 0) {
                return [];
            }
        }
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     * Mount query array for transform in sql script
     */
    protected function prepateSql()
    {
        if (!$this->selectArr && !$this->from) {
            throw new Exception("For Prepare Sql script select and from needs fields", 500);
        }

        $this->stmScriptArr = [
            "SELECT"     => $this->selectArr,
            "FROM"       => $this->from,
            "INNER_JOIN" => $this->joinArr,
            "WHERE"      => $this->whereArr
        ];
    }
    /**
     *  Construct sql query
     */
    protected function construct_query(): string
    {
        $this->prepateSql();

        $stmScriptArr = $this->stmScriptArr;
        foreach ($stmScriptArr as $instruction => $value) {
            switch ($instruction) {
                case "SELECT":
                    $this->stmScript .= strtr(self::SQL_SELECT, ["{columns}" => implode(",", $value["{columns}"])]);
                    break;
                case "FROM":
                    $this->stmScript  .= strtr(self::SQL_FROM, ["{table_main}" => $value["{table_main}"]]);
                    break;
                case "INNER_JOIN":
                    $sql_join = "";
                    foreach ($value as $join) {
                        $sql_join .= strtr(self::SQL_INNER_JOIN, [
                            "{table_join_1}" => $join["{table_join_1}"],
                            "{condition_1}"  => $join["{condition_1}"],
                            "{operator}"     => $join["{operator}"],
                            "{condition_2}"  => $join["{condition_2}"],
                        ]);
                    }
                    $this->stmScript  .= $sql_join;
                    break;
                case "WHERE":
                    $sql_where = "";
                    $i = 0;
                    foreach ($value as $where) {
                        if ($i == 0) {
                            $sql_where .= strtr(self::SQL_WHERE, [
                                "{condition_1}" => $value[$i]["{condition_1}"],
                                "{operator}" => $value[$i]["{operator}"],
                                "{condition_2}" => $value[$i]["{condition_2}"],
                            ]);
                            $i++;
                            continue;
                        }
                        $sql_where .= strtr(self::SQL_WHERE_AND, [
                            "{condition_1}" => $value[$i]["{condition_1}"],
                            "{operator}" => $value[$i]["{operator}"],
                            "{condition_2}" => $value[$i]["{condition_2}"],
                        ]);
                        $i++;
                    }
                    $this->stmScript  .= $sql_where;
            }
        }
        return $this->stmScript;
    }
}
