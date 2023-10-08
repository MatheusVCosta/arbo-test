<?php

class Photo extends Database
{


    public function __construct()
    {
        $this->pdo = $this->getConnection();
        $this->table = "photo";
    }


    public function insertPhoto($photo)
    {
        $photoKeys = implode(",", array_keys($photo));
        $photoValues = array_values($photo);
        $prepareString = prepare_array_to_string($photoValues);

        $insertQuery = $this->insert($photoKeys, $prepareString);
        $stm = $this->pdo->prepare($insertQuery);
        try {
            $this->execute($stm, $photoValues);
        } catch (PDOException $ex) {
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
        return array_merge($photo_array, prepare_date_to_insert());
    }
}
