<?php

class UserController extends RenderView
{
    use Config;
    private $user;

    public function index()
    {
        $config = $this->get_sentings();
        $this->user = new User();

        $users = $this->user->fetchAll();

        $this->loadView('user', [
            'config' => $config,
            'teste'  => 'teste'
        ]);
    }

    public function register()
    {
        $config = $this->get_sentings();
        $this->user = new User();

        $users = $this->user->fetchAll();

        $this->loadView('register_user', [
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
                throw new Exception("User not entered");
            } else {
                $response = [
                    "message" => "Usuário inserido com sucesso!",
                    "status_code" => 201,
                ];
            }

            // $this->loadView('register_user', [
            //     'config' => $config,
            // ]);
        } else {
            header('Location: /test-arbo/arbo-test');
        }
    }
}
