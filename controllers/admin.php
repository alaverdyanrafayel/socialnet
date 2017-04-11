<?php

class Admin extends System_controller
{
    public function settings()
    {
        $this->view->render('settings');
    }
}