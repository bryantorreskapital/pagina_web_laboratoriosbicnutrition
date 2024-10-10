<?php

class pagemodulos extends fs_controller
{

    public $cont;

    public function __construct()
    {
        parent::__construct(__CLASS__, 'Modulos');
    }

    protected function private_core()
    {
        if (isset($_REQUEST['cont'])) {
            $this->cont = $_REQUEST['cont'];
        }
    }
}
