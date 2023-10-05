<?php

class UserController extends RenderView
{
    public function index()
    {
    }

    public function show($id)
    {
        $id_user = $id[0];


        $this->loadView('users', [
            'title' => 'Usuário',
            'user' =>  $id
        ]);
    }
}
