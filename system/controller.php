<?php

class System_controller
{

    public $view;

    function __construct()
    {
        $this->view = new System_view;
    }

}