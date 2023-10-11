<?php

class HomeController extends RenderView
{
    use Config;
    public function index()
    {

        $house = new House();
        $houses = $house->all();
        $config = $this->get_sentings();
        $this->loadView('home', [
            'config'  => $config,
            'title'   => 'Home',
            'houses' => $houses

        ]);
    }

    public function indexFilter()
    {
        $house = new House();

        $typeHouse = isset($_GET["typeHouse"]) ? $_GET["typeHouse"] : false;
        $state = isset($_GET["txtState"]) ? $_GET["txtState"] : false;
        $city = isset($_GET["txtCity"]) ? $_GET["txtCity"] : false;

        $qtdRoom = isset($_GET["txtQtdRooms"]) ? $_GET["txtQtdRooms"] : false;
        $qtdBath = isset($_GET["txtQtdBaths"]) ? $_GET["txtQtdBaths"] : false;
        $qtdVacancy = isset($_GET["txtQtdVacancy"]) ? $_GET["txtQtdVacancy"] : false;

        $houses = $house->filterHouse([
            ['column' => 'house.house_type', 'value' => $typeHouse, "operator" => "="],
            ['column' => 'address.state', 'value' => $state, "operator" => "="],
            ['column' => 'address.city', 'value' =>  $city, "operator" => "="],
            ['column' => 'house.amout_room', 'value' =>  $qtdRoom, "operator" => ">="],
            ['column' => 'house.amount_baths', 'value' =>  $qtdBath, "operator" => ">="],
            ['column' => 'house.amount_vacancy', 'value' =>  $qtdVacancy, "operator" => ">="],

        ]);

        // responseArr($house);
        $this->loadView('template/mainHome', [
            'title'   => 'Home',
            'houses' => $houses

        ]);
    }
}
