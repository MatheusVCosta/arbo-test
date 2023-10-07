<?php

class HouseController extends RenderView
{
    use Config;

    public function index()
    {
    }

    public function renderInsertHouse()
    {
        $config = $this->get_sentings();

        $this->loadView('house_register', [
            'config' => $config,
        ]);
    }

    public function insert()
    {
        if ($_SESSION['user_authenticated']) {
            $actualUser = $_SESSION['user_authenticated'];

            $addressArray = [
                'postal_code' => $_POST['txtPostalCode'],
                'street'      => $_POST['txtStreet'],
                'district'    => $_POST['txtDistrict'],
                'number'      => $_POST['txtNumber'],
                'state'       => $_POST['txtState'],
                'country'     => $_POST['txtCountry'],
                'complement'  => $_POST['txtComplement'],
            ];
            // Address 
            $address = new Address();
            $addressArray = $address->setArrayForAddress($addressArray);
            $addressResponse = $address->insert($addressArray);
            if (!$addressResponse) {
                exit;
            }

            // House
            $houseArray = [
                'id_address'  => $addressResponse,
                'id_user'     => $actualUser['userId'],
                'house_type'  => $_POST["txtType"],
                'description' => $_POST["txtDesc"],
                'price'       => $_POST["txtPrice"],
                'status'      => true
                // 'type' => $_POST["txtTipeContract"],
            ];

            $house = new House();
            $houseArray = $house->setArrayForHouse($houseArray);
            $houseResponse = $house->insert($houseArray);
            if (!$houseResponse) {
                exit;
            }

            // // Photo
            $photo = new Photo();
            $photos = $_POST['photos_upload'][0];
            $photosSaved = [];

            foreach ($photos as $justPhoto) {
                $justPhoto = $photo->setArrayForPhoto([$justPhoto]);
                print_r($justPhoto);
                $photoSave = $photo->insert($justPhoto);
                array_push($photosSaved, $photoSave);
            }

            foreach ($photosSaved as $photoSaved) {
                $photo->insert_photo_and_house($photoSaved, $houseResponse);
            }
            // relaciona 
        } else {
            header('Location: /test-arbo/arbo-test');
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

        _http_response_json($new_path);
    }
}
