<?php

class HouseController extends RenderView
{
    use Config;
    private $house;

    public function __construct()
    {
        $this->house = new House();
    }

    public function index()
    {
    }

    public function renderInsertHouse()
    {
        $config = $this->get_sentings();
        $page_mode = "insert";
        $house_infos = [];

        if (isset($_GET['house_id'])) {
            $house_id = $_GET['house_id'];
            $page_mode   = $_GET['page_mode'];
            $house_infos = $this->house->fetch_by_id($house_id);
        }

        $this->loadView('house_register', [
            'config'      => $config,
            'house_infos' => $house_infos,
            'page_mode'   => $page_mode
        ]);
    }

    public function insert()
    {
        if ($_SESSION['user_authenticated']) {
            $actualUser = $_SESSION['user_authenticated'];

            $house = new House();
            $address = new Address();

            // Address 
            $addressArray = $this->getAddress();
            $addressArray = prepareArrayForDatabase($addressArray, $address->field_rule);
            $addressResponse = $address->insertAddress($addressArray);
            if (!$addressResponse) {
                throw new Exception("Address not created");
                exit;
            }

            // House
            $houseArray = $this->getHouse($addressResponse, $actualUser);
            $houseArray = prepareArrayForDatabase($houseArray, $house->field_rule);
            $houseResponse = $house->insertHouse($houseArray);
            if (!$houseResponse) {
                throw new Exception("House not created");
                exit;
            }

            // Photo
            $this->addPhotoHouse($houseResponse);

            response([
                'message' => "Imóvel criada com sucesso",
                'status'  => 200
            ]);
        } else {
            header('Location: /');
        }
    }

    public function update()
    {
        if ($_SESSION['user_authenticated']) {

            if (!isset($_GET['house_id'])) {
                throw new Exception("Error");
            }

            $actualUser = $_SESSION['user_authenticated'];
            $address = new Address();
            $houseInstance = new House();

            $house = $houseInstance->fetch_by_id($_GET['house_id']);
            // Address 

            $addressArray = $this->getAddress();
            $addressArray = prepareArrayForDatabase($addressArray, $address->field_rule);
            $addressResponse = $address->updateAddress($addressArray, $house[0]['address_id']);
            if (!$addressResponse) {
                throw new Exception("Address not updated");
                exit;
            }

            $houseArray = $this->getHouse($house[0]['address_id'], $actualUser);
            $houseArray = prepareArrayForDatabase($houseArray, $houseInstance->field_rule);
            $houseResponse = $houseInstance->updateHouse($houseArray, $house[0]['house_id']);
            if (!$houseResponse) {
                throw new Exception("House not updated");
                exit;
            }

            response([
                'message' => "Casa Editada com Sucesso",
                'status'  => 200
            ]);
        } else {
            header('Location: /');
        }
    }


    public function delete()
    {
        if ($_SESSION['user_authenticated']) {
            $houseId = $_GET['house_id'];
            $house = new House();
            $actualHouse = $house->fetch_house_by_id($houseId);
            if (!$actualHouse) {
                throw new Exception("House not found", 404);
            }

            $isDelete = $house->deleteHouse($actualHouse[0]['id']);
            if ($isDelete) {
                response(["message" => "Imóvel removido com sucesso", 'status' => 200]);
            }
        }
    }

    public function savePhoto()
    {
        $photos = ($_FILES['photo']);
        $this->_save_photo($photos);
    }

    private function _save_photo($photos)
    {
        $index = count(array_filter($photos["name"]));
        $new_path = [];
        if ($index <= 0) {
            $response = ["message" => "Vocề não selecionou nenhuma imagem!", "status_code" => 500];
            _exception_response_json($response);
        } else {
            for ($i = 0; $i < $index; $i++) {

                [$fileNeme, $ext] = explode(".", $photos["name"][$i]);
                $hash_name = base64_encode($fileNeme);
                $path = "public/upload/" . $hash_name . "." . $ext;
                $moved = move_uploaded_file($photos["tmp_name"][$i], $path);
                if (!$moved) {
                    $response = ["message" => "Houve um erro no envio de imagens!", "status_code" => 500];
                    _exception_response_json($response);
                    return false;
                } else {
                    array_push($new_path, $path);
                }
            }
        }

        // response($new_path);
    }

    private function getAddress()
    {
        return [
            'postal_code' => $_POST['txtPostalCode'],
            'street'      => $_POST['txtStreet'],
            'district'    => $_POST['txtDistrict'],
            'number'      => $_POST['txtNumber'],
            'state'       => $_POST['txtState'],
            'country'     => $_POST['txtCountry'],
            'complement'  => $_POST['txtComplement'],
            'city'        => $_POST['txtCity'],
        ];
    }
    private function getHouse($addressResponse, $actualUser)
    {
        // TODO: Improve this get infomations, checked type var in another place
        return [
            'id_address'        => $addressResponse,
            'id_user'           => $actualUser['userId'],
            'house_type'        => $_POST["txtType"],
            'description'       => $_POST["txtDesc"],
            'contract_type'     => $_POST["txtTypeContract"],
            'amount_baths'      => !is_nan($_POST["txtQtdBath"]) ? $_POST["txtQtdBath"] : 0,
            'amout_room'        => !is_nan($_POST["txtQtdRooms"]) ? $_POST["txtQtdRooms"] : 0,
            'amount_vacancy'    => !is_nan($_POST["txtQtdVacancy"]) ? $_POST["txtQtdVacancy"] : 0,
            'price'             => $_POST["txtPrice"],
            'status'            => true
        ];
    }
    private function addPhotoHouse($houseResponse)
    {
        $photo = new Photo();
        $photos = $_POST['photos_upload'][0];
        $photosSaved = [];
        foreach ($photos as $justPhoto) {
            $justPhoto = $photo->setArrayForPhoto(["`path`" => $justPhoto]);
            $photoSave = $photo->insertPhoto($justPhoto);
            array_push($photosSaved, $photoSave);
        }

        foreach ($photosSaved as $photoSaved) {
            $photo->insert_photo_and_house($photoSaved, $houseResponse);
        }
    }
}
