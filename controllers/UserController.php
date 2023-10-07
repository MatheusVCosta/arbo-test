<?php

class UserController extends RenderView
{
    use Config;
    private $user;

    public function index()
    {
        $actual_user = $_SESSION['user_authenticated'];
        $config = $this->get_sentings();
        $this->user = new User();

        $houses = $this->user->getUserHouses($actual_user['userId']);
        $this->loadView('user_home', [
            'config' => $config,
            'houses_user'  => $houses
        ]);
    }

    public function login()
    {
        $config = $this->get_sentings();
        $this->user = new User();

        $this->loadView('user_login', [
            'config' => $config,

        ]);
    }
    public function user_auth()
    {
        $config = $this->get_sentings();
        $this->user = new User();

        if (!empty($_POST)) {

            $data  = $_POST;
            $response = $this->user->login($data['txtEmail'], $data['txtPassword']);

            if ($response instanceof Exception) {
                if ($response->getCode() < 200 || $response->getCode()  > 299) {
                    _exception_response_json($response);
                    throw new Exception($response->getMessage());
                }
            }
            _create_auth_session(
                ['name' => $response['name'], 'email' => $response['email'], 'id' => $response['id']]
            );
        } else {
            header('Location: /test-arbo/arbo-test');
        }
    }

    public function user_logout()
    {
        if ($_SESSION['user_authenticated']) {
            _destroy_session('user_authenticated');
        }
        header('Location: /test-arbo/arbo-test');
    }



    public function register()
    {
        $config = $this->get_sentings();

        $this->loadView('user_register', [
            'config' => $config,
        ]);
    }

    public function insert()
    {

        $response = [];
        $config = $this->get_sentings();
        $this->user = new User();

        if (!empty($_POST)) {
            $data  = $_POST;

            $user = $this->user->setArrayForUser([
                'name'       => $data['txtName'],
                'email'      => $data['txtEmail'],
                'password'   => $data['txtPassword'],
                'birth_date' => "12/11/2003",
            ]);

            $result = $this->user->insert($user);

            if (!$result) {
                $response = [
                    "message" => "Usuário não inserido!",
                    "status_code" => 500,
                ];
                _http_response_json($response);
                exit;
            } else {
                $response = [
                    "message" => "Usuário inserido com sucesso!",
                    "status_code" => 201,
                ];
                _http_response_json($response);
            }
            _create_auth_session(['name' => "teste", "email" => 'teste']);
            if ($_SESSION['user_authenticated']) {
                echo "oi";
            }
            $this->loadView('user_home', [
                'config' => $config,
            ]);
        } else {
            header('Location: /test-arbo/arbo-test');
        }
    }
}
