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
        ]);
    }

    public function show($id)
    {
        $id_user = $id[0];


        $this->loadView('user', [
            'title' => 'Usuário',
            'user' =>  $id
        ]);
    }

    public function insert()
    {
        $response = [];
        $this->user = new User();
        $user = $this->user->setArrayForUser([
            'name' => "stefanne",
            'email' => "stafanne@gmail.com",
            'password' => "123",
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

        $this->loadView('user', [
            'response' => $response,
        ]);
    }
}
