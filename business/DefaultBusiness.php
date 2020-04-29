<?php

class DefaultBusiness
{
    private $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function AccionDefault()
    {
        //llamar al modelo para traer datos

        $this->view->show('indexView.php', null);
    }
}

?>