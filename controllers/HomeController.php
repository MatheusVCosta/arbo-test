<?php

class HomeController extends RenderView
{
    use Config;

    public function index()
    {
        $config = $this->get_sentings();
        // $users = new User();
        $this->loadView('home', [
            'config' => $config,
            // 'title' => 'Home',
            // 'users' => $users->fetch()
        ]);
    }
}
