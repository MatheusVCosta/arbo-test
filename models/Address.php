<?php

class Address extends Database
{

    public $field_rule = [
        'street'      => ['not_null', 'str'],
        'postal_code' => ['not_null', 'str'],
        'district'    => ['not_null', 'str'],
        'state'       => ['not_null', 'str'],
        'number'      => ['not_null', 'int'],
        'country'     => ['not_null', 'str'],
        'city'        => ['not_null', 'str'],
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

    public function insertAddress($address)
    {
        $addressKeys = implode(",", array_keys($address));
        $addressValues = array_values($address);
        $prepareString = prepare_array_to_string($addressValues);

        $insertQuery = $this->insert($addressKeys, $prepareString);
        $stm = $this->pdo->prepare($insertQuery);

        try {
            $this->execute($stm, $addressValues);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

        return $this->pdo->lastInsertId();
    }
}
