<?php

class UserController extends RenderView
{
    public function index()
    {
    }

    public function show($id)
    {
        $id_user = $id[0];

        $users = new User();

        $this->loadView('user', [
            'title' => 'Usuário',
            'user' => $users->fetchId($id)
        ]);
    }
}
