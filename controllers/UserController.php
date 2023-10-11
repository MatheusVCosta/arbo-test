<?php

class UserController extends RenderView
{
    use Config;
    private $user;

    public function index()
    {
        if (!isset($_SESSION['user_authenticated'])) {
            header('Location: /');
        }

        $actual_user = $_SESSION['user_authenticated'];
        $config = $this->get_sentings();
        $this->user = new User();

        $userHouses = $this->user->fetchHousesUser($actual_user['userId']);
        $this->loadView('user_home', [
            'config'       => $config,
            'houses_user'  => $userHouses
        ]);
    }

    public function insert()
    {

        $response = [];
        $config = $this->get_sentings();
        $this->user = new User();

        if (empty($_POST)) {
            header('Location: /');
        }
        $data  = $_POST;

        $user = $this->user->setArrayForUser([
            'name'       => $data['txtName'],
            'email'      => $data['txtEmail'],
            'password'   => $data['txtPassword'],
        ]);

        $result = $this->user->insertUser($user);

        if (!$result) {
            $response = [
                "message" => "Usuário não inserido!",
                "status_code" => 500,
            ];
            response($response);
            return response($response);
        } else {
            $response = [
                "message" => "Usuário inserido com sucesso!",
                "status_code" => 201,
            ];
            $new_user = $this->user->fetchId($result);
            _create_auth_session(['id' => $new_user['id'], 'name' => $new_user['name'], 'email' => $new_user['email']]);
            response($response);
            exit;
        }

        $this->loadView('user_home', [
            'config' => $config,
        ]);
    }

    public function user_logout()
    {
        if ($_SESSION['user_authenticated']) {
            _destroy_session('user_authenticated');
        }
        header('Location: /');
    }



    public function register()
    {
        $config = $this->get_sentings();

        $this->loadView('user_register', [
            'config' => $config,
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
        if (empty($_POST)) {
            header('Location: /');
        }

        $config = $this->get_sentings();
        $this->user = new User();

        $data  = $_POST;
        $response = $this->user->login($data['txtEmail'], $data['txtPassword']);

        if ($response instanceof Exception) {
            if ($response->getCode() < 200 || $response->getCode()  > 299) {
                _exception_response_json($response);
                throw new Exception($response->getMessage());
            }
        }
        _create_auth_session(['name' => $response['name'], 'email' => $response['email'], 'id' => $response['id']]);
    }
}
