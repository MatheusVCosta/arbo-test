<?php

class House extends Database
{
    private $table_name = "house";

    public $field_rule = [
        "id_address"    => ['not_null', 'int'],
        "id_user"       => ['not_null', 'int'],
        "house_type"    => ['not_null', 'str'],
        "contract_type" => ['not_null', 'str'],
        "price"         => ['not_null', 'str'],
        // "status"        => ['not_null', 'int'],
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
    public function fetch_house_by_id($houseId)
    {
        $selectQuery = $this->select();
        $selectQuery .= $this->where("id", $houseId);

        $stm = $this->prepare($selectQuery);
        $result = $this->execute($stm);

        if ($stm->rowCount() > 0) {
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }
    public function fetch_house_all_informations()
    {
        $selectQuery = $this->select($this->_select_communs);
        $selectQuery .= $this->join("address", "id_address", "id", "=");
        $selectQuery .= $this->join("user", "id_user", "id", "=");
        $selectQuery .= $this->where("user.id", "house.id_user");
        $stm = $this->prepare($selectQuery);
        $this->execute($stm);

        if ($stm->rowCount() <= 0) {
            return [];
        }

        $houses = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $this->fetch_house_photos($houses);
    }

    public function fetch_by_id($house_id)
    {
        $selectQuery = $this->select([
            'house.id as house_id',
            'address.id as address_id',
            'house.house_type as house_type',
            'house.price as price',
            'house.status as status',
            'house.description as description',
            'house.amout_room as amout_room',
            'house.amount_baths as amount_baths',
            'house.amount_vacancy as amount_vacancy',
            'house.contract_type as contract_type',
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
        $selectQuery .= $this->where("house.id", $house_id);
        $stm = $this->prepare($selectQuery);
        $this->execute($stm);

        if ($stm->rowCount() > 0) {
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }
    public function fetch_house_photos($houses)
    {
        $newArr = [];

        foreach ($houses as $house) {
            $selectQuery = $this->select(['photo.path as path']);
            $selectQuery .= $this->join("photos", "id", "id_house", "=");
            $selectQuery .= $this->join("photo", "id_photo", "id", "=", 'photos');
            $selectQuery .= $this->where("house.id", $house['house_id']);
            $stm = $this->prepare($selectQuery);
            $this->execute($stm);

            if ($stm->rowCount() <= 0) {
                return [];
            }

            $photos = $stm->fetchAll(PDO::FETCH_ASSOC);
            $house['photos'] = $photos;
            array_push($newArr, $house);
        }

        return $newArr;
    }
    public function get_houses_by_user_id($user_id)
    {
        $selectQuery = $this->select($this->_select_communs);
        $selectQuery .= $this->join("address", "id_address", "id", "=");
        $selectQuery .= $this->join("user", "id_user", "id", "=");
        $selectQuery .= $this->where("user.id", $user_id);
        $stm = $this->prepare($selectQuery);
        $this->execute($stm);

        if ($stm->rowCount() <= 0) {
            return [];
        }

        $houses = $stm->fetchAll(PDO::FETCH_ASSOC);
        $newArrHouse = $this->fetch_house_photos($houses);
        return $newArrHouse;
    }

    // INSERT
    public function insertHouse($house)
    {
        $houseKeys = implode(",", array_keys($house));
        $houseValues = array_values($house);
        $prepareString = prepare_array_to_string($houseValues);

        $insertQuery = $this->insert($houseKeys, $prepareString);
        $stm = $this->pdo->prepare($insertQuery);

        try {
            $this->execute($stm, $houseValues);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

        return $this->pdo->lastInsertId();
    }

    // UPDATE
    public function updateHouse(array $args, $houseId)
    {
        $query = $this->update($args);
        $query .= $this->where("house.id", $houseId);
        $stm = $this->prepare($query);
        $result = $this->execute($stm);
        return $result;
    }

    // DELETE
    public function deleteHouse($houseId)
    {
        $query = $this->delete();
        $query .= $this->where('id', $houseId);
        $stm = $this->prepare($query);
        $result = $this->execute($stm);
        return $result;
    }

    private $_select_communs = [
        'house.id as house_id',
        'address.id as address_id',
        'user.id as user_id',
        'house.house_type as house_type',
        'house.contract_type as contract_type',
        'house.price as price',
        'house.status as status',
        'house.description as description',
        'house.amout_room as amout_room',
        'house.amount_vacancy as amount_vacancy',
        'house.amount_baths as amount_baths',
        'address.street as street',
        'address.postal_code as postal_code',
        'address.district as district',
        'address.state as state',
        'address.number as number',
        'address.country as country',
        'address.complement as complement',
        'address.city as city',
        // 'photo.path as path'
    ];
}
