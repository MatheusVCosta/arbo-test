<?php

class User extends Database
{
    private $pdo;

    private $rules_user = [
        'name'          => ['not_null', 'str'],
        'email'         => ['not_null', 'str'],
        'birth_date'    => ['not_null', 'str'],
        'password'      => ['not_null', 'str'],
    ];

    public function __construct()
    {
        $this->pdo = $this->getConnection();
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
            exit;
        }

        if (!password_verify($password, $user['password'])) {
            $ex = new Exception("Usuário ou senha invalido!", 403);
            return $ex;
            exit;
        }

        return  $user;
    }


    public function insert($user)
    {
        $user['password'] = encrypt_password($user['password']);
        $userKeys = implode(",", array_keys($user));
        $userValues = array_values($user);
        $prepareString = prepare_array_to_string($userValues);

        $insertQuery = "INSERT INTO my_new_house_db.`user` ($userKeys) VALUES ($prepareString)";
        $stm = $this->pdo->prepare($insertQuery);
        $result = $stm->execute($userValues);
        return $result;
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
