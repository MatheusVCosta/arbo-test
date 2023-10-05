<?php

class HomeController extends RenderView
{
    public function index()
    {
        $users = new User();
        $this->loadView('user', [
            'title' => 'Usuário',
            'users' => $users->fetch()
        ]);
    }
}
