<?php

class Address extends Database
{

    private $rules_user = [
        'street'      => ['not_null', 'str'],
        'postal_code' => ['not_null', 'str'],
        'district'    => ['not_null', 'str'],
        'state'       => ['not_null', 'str'],
        'number'      => ['not_null', 'int'],
        'country'     => ['not_null', 'str'],
    ];

    public function __construct()
    {
        $this->pdo = $this->getConnection();
        $this->table = "address";
    }

    public function updateAddress(array $args, $addressId)
    {
        $query = $this->update($args);
        $query .= $this->where("address.id", $addressId);
        $stm = $this->prepare($query);
        $result = $this->execute($stm);
        return $result;
    }

    public function insert($address)
    {
        $addressKeys = implode(",", array_keys($address));
        $addressValues = array_values($address);
        $prepareString = prepare_array_to_string($addressValues);

        $insertQuery = "INSERT INTO my_new_house_db.`address` ($addressKeys) VALUES ($prepareString)";
        $stm = $this->pdo->prepare($insertQuery);

        try {
            $result = $stm->execute($addressValues);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

        return $this->pdo->lastInsertId();
    }


    // METHODS UTILS
    public function setArrayForAddress(array $user_array)
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
        return array_merge($user_array, prepare_date_to_insert());
    }
}
