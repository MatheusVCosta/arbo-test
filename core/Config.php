<?php

trait Config
{
    protected $PROJECT_NAME;
    protected $DB_NAME;
    protected $DB_USER;
    protected $DB_PASSWORD;
    protected $DB_HOST;

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
        $this->DB_PASSWORD = "7274";
        $this->DB_HOST = "127.0.0.1";

        return $this;
    }
}
