<?php

class Config
{
    public $PROJECT_NAME;
    private $DB_NAME;
    private $DB_USER;
    private $DB_PASSWORD;
    private $DB_HOST;

    public function __construct()
    {
        $this->PROJECT_NAME = "";
        $this->DB_NAME = "";
        $this->DB_USER = "";
        $this->DB_PASSWORD = "";
        $this->DB_HOST = "";
    }

    public function get_sentings()
    {
        $this->PROJECT_NAME = "Minha Casa Nova";
        $this->DB_NAME = "my_new_house_db";
        $this->DB_USER = "root";
        $this->DB_PASSWORD = "root";
        $this->DB_HOST = "127.0.0.1";

        return $this;
    }
}
