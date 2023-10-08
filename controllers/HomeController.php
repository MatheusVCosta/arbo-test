<?php

class HomeController extends RenderView
{
    use Config;
    public function index()
    {

        $house = new House();
        $houses = $house->fetch_house_all_informations();
        $config = $this->get_sentings();
        $this->loadView('home', [
            'config'  => $config,
            'title'   => 'Home',
            'houses' => $houses

        ]);
    }
}
