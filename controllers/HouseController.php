<?php

class HouseController extends RenderView
{
    use Config;

    public function index()
    {
    }

    public function register()
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
        session_start();
        if ($_SESSION['user_authenticated']) {
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
