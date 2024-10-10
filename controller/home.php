<?php

class home extends fs_controller
{
    public $crm_contacto;

    public function __construct()
    {
        parent::__construct(__CLASS__, 'Inicio');
    }

    protected function private_core()
    {
        $this->crm_contacto = new crm_contacto();

        if (isset($_GET['cifnif'])) {
            $result  = array('proceso' => 'C', 'msj' => 'Credenciales correctas.!', 'cif' => '');
            $fs_user = $this->user->get_by_cifnif($_GET['cifnif']);
            header('Content-Type: application/json');
            echo json_encode($fs_user, JSON_UNESCAPED_UNICODE);
            exit();
        }
    }
}
