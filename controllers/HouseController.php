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
        $response = [];
        $config = $this->get_sentings();

        $photos = ($_FILES['photo']);

        $this->_save_photo($photos);
    }

    private function _save_photo($photos)
    {
        $index = count(array_filter($photos["name"]));

        if ($index <= 0) {
            $response = ["message" => "Vocề não selecionou nenhuma imagem!", "status_code" => 500];
            _exception_response_json($response);
        } else {
            for ($i = 0; $i < $index; $i++) {

                [$fileNeme, $ext] = explode(".", $photos["name"][$i]);
                $hash_name = base64_encode($fileNeme);
                $moved = move_uploaded_file($photos["tmp_name"][$i], "public/upload/" . $hash_name . "." . $ext);
                if (!$moved) {
                    $response = ["message" => "Houve um erro no envio de imagens!", "status_code" => 500];
                    _exception_response_json($response);
                    return false;
                }
            }
        }
    }
}
