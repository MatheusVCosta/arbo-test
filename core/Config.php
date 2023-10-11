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
        $this->DB_NAME = "my_new_house";
        $this->DB_USER = "user";
        $this->DB_PASSWORD = "user";
        $this->DB_HOST = "mysql";

        return $this;
    }
}
