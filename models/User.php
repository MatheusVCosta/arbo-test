<?php

class User extends BasicORM
{
    private $rules_user = [
        'name'          => ['not_null', 'str'],
        'email'         => ['not_null', 'str'],
        'password'      => ['not_null', 'str'],
    ];

    public function __construct()
    {
        $this->pdo = $this->getConnection();
        $this->table = "user";
    }
    public function fetchAll()
    {
        $stm = $this->pdo->query("Select * from user");
        if ($stm->rowCount() > 0) {
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }

    public function fetchHousesUser($user_id)
    {
        $this->_select($this->table, [
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
            'photo.path as path'
        ]);
        $this->_join("house", "user.id", "house.id_user");
        $this->_join("address", "house.id_address", "address.id");
        $this->_join("photos", "photos.id_house", "house.id");
        $this->_join("photo", "photo.id", "photos.id_photo");
        $this->_where("user.id", $user_id);
        $houseUser = $this->_fetch();
        return $houseUser;
    }

    public function fetchId($id)
    {
        $stm = $this->pdo->prepare("SELECT * FROM user where id = ?");
        $stm->execute([$id]);

        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function login($email, $password)
    {
        // $password_decrypy = password_verify();
        $sqlLogin = "SELECT * FROM user where email = ?";
        $stm = $this->pdo->prepare($sqlLogin);
        $user = $stm->execute([$email]);
        $user = $stm->fetch(PDO::FETCH_ASSOC);

        if (empty($user)) {
            $ex = new Exception("Usuário ou senha invalido!", 403);
            return $ex;
        }

        if (!password_verify($password, $user['password'])) {
            $ex = new Exception("Usuário ou senha invalido!", 403);
            return $ex;
        }

        return  $user;
    }


    public function insertUser($user)
    {
        $user['password'] = encrypt_password($user['password']);
        $userKeys = implode(",", array_keys($user));
        $userValues = array_values($user);
        $prepareString = prepare_array_to_string($userValues);

        $insertQuery = $this->insert($userKeys, $prepareString);
        $stm = $this->prepare($insertQuery);

        $stm->execute($userValues);
        return $this->pdo->lastInsertId();;
    }


    // METHODS UTILS
    public function setArrayForUser(array $user_array)
    {
        if (!isset($user_array) || empty($user_array)) {
            $ex = new Exception("Filds needs filled!", 500);
            _exception_response_json($ex);
        }

        foreach ($user_array as $key => $value) {
            $this->$key = $value;
            $bool = validate($key, $value, $this->rules_user);
            if (!$bool) {
                // throw new Exception("Error!");
            }
        }
        return array_merge($user_array, prepare_date_to_insert());
    }
}
