<?php

class House extends Database
{
    private $pdo;

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
    }


    public function insert($user)
    {
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
