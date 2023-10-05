<?php

class HomeController extends RenderView
{
    public function index()
    {
        $users = new User();
        $this->loadView('home', [
            'title' => 'Home',
            // 'users' => $users->fetch()
        ]);
    }
}
