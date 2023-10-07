<?php

class House extends Database
{
    private $table_name = "house";

    private $rules_user = [
        // 'street'      => ['not_null', 'str'],
        // 'postal_code' => ['not_null', 'str'],
        // 'district'    => ['not_null', 'str'],
        // 'state'       => ['not_null', 'str'],
        // 'number'      => ['not_null', 'int'],
        // 'country'     => ['not_null', 'str'],
    ];

    public function __construct()
    {
        $this->pdo = $this->getConnection();
        $this->table = $this->table_name;
    }
    // SELECT
    public function all()
    {
        $selectQuery = $this->select();
        $selectQuery .= $this->join("address", "id_address", "id", "=");

        $stm = $this->prepare($selectQuery);
        $result = $this->execute($stm);

        if ($stm->rowCount() > 0) {
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }

    public function get_houses_by_user_id($user_id)
    {
        $tableUser = "user";
        $selectQuery = $this->select([
            'house.id as house_id',
            'address.id as address_id',
            'user.id as user_id',
            'house.house_type as house_type',
            'house.price as price',
            'house.status as status',
            'house.description as description',
            'address.street as street',
            'address.postal_code as postal_code',
            'address.district as district',
            'address.state as state',
            'address.number as number',
            'address.country as country',
            'address.complement as complement',
            'address.city as city',
        ]);
        $selectQuery .= $this->join("address", "id_address", "id", "=");
        $selectQuery .= $this->join("user", "id_user", "id", "=");
        $selectQuery .= $this->where("user.id", "house.id_user");

        $stm = $this->prepare($selectQuery);
        $this->execute($stm);

        if ($stm->rowCount() > 0) {
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }

    // INSERT
    public function insert($house)
    {
        $houseKeys = implode(",", array_keys($house));
        $houseValues = array_values($house);
        $prepareString = prepare_array_to_string($houseValues);

        $insertQuery = "INSERT INTO my_new_house_db.`house` ($houseKeys) VALUES ($prepareString)";
        $stm = $this->pdo->prepare($insertQuery);


        try {
            $result = $stm->execute($houseValues);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        return $this->pdo->lastInsertId();
    }


    // METHODS UTILS
    public function setArrayForHouse(array $house_array)
    {
        // if (!isset($user_array) || empty($user_array)) {
        //     $ex = new Exception("Filds needs filled!", 500);
        //     _exception_response_json($ex);
        // }

        // foreach ($user_array as $key => $value) {
        //     $this->$key = $value;
        //     $bool = validate($key, $value, $this->rules_user);
        //     if (!$bool) {
        //         // throw new Exception("Error!");
        //     }
        // }
        return array_merge($house_array, prepare_date_to_insert());
    }
}
