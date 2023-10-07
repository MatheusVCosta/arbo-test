<?php

class HomeController extends RenderView
{
    use Config;
    // public function __construct()
    // {
    //     // print_r(json_encode($_GET['url']));
    // }
    public function index()
    {

        $house = new House();
        $housers = $house->all();

        $config = $this->get_sentings();
        $this->loadView('home', [
            'config'  => $config,
            'title'   => 'Home',
            'housers' => $housers

        ]);
    }
}
