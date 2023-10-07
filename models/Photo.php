<?php

class Photo extends Database
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


    public function insert($photo)
    {
        $photoValues = array_values($photo);
        $prepareString = prepare_array_to_string($photoValues);

        $insertQuery = "INSERT INTO my_new_house_db.`photo` (`path`, created_at, updated_at) VALUES ($prepareString)";

        // INSERT INTO my_new_house_db.`photo` ('path', 'created_at', 'updated_at') VALUES ('public/upload/Q2FwdHVyYSBkZSB0ZWxhIGRlIDIwMjMtMTAtMDEgMjMtNDEtMDk=.png','2023-10-07 02:10:27','2023-10-07 02:10:27')
        $stm = $this->pdo->prepare($insertQuery);

        try {
            print_r($photoValues);
            $result = $stm->execute($photoValues);
        } catch (PDOException $ex) {
            print_r($stm->errorInfo());
            echo $ex->getMessage();
        }
        return $this->pdo->lastInsertId();
    }


    public function insert_photo_and_house($photo_id, $house_id)
    {
        $insertQuery = "INSERT INTO my_new_house_db.`photos` (id_photo, id_house) VALUES (?,?)";
        $stm = $this->pdo->prepare($insertQuery);
        try {
            $result = $stm->execute([$photo_id, $house_id]);
        } catch (PDOException $ex) {
            print_r($stm->errorInfo());
            echo $ex->getMessage();
        }
        return $result;
    }

    public function setArrayForPhoto(array $photo_array)
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
        return array_merge($photo_array, prepare_date_to_insert());
    }
}
