<?php

class HomeController extends RenderView
{
    use Config;
    public function index()
    {

        $house = new House();
        $houses = $house->all();
        $config = $this->get_sentings();
        if ($houses) {
            $this->loadView('home', [
                'config'  => $config,
                'title'   => 'Home',
                'houses' => $houses

            ]);
            return true;
        }
    }

    public function indexFilter()
    {
        $house = new House();
        $houses = $house->filterHouse([
            ['column' => 'house.house_type', 'value' => "'Casa'"],
            ['column' => 'address.state', 'value' => "'São Paulo'"]
        ]);
        $config = $this->get_sentings();
        if ($houses) {
            $this->loadView('template/mainHome', [
                'config'  => $config,
                'title'   => 'Home',
                'houses' => $houses

            ]);
            return true;
        }
    }
}
