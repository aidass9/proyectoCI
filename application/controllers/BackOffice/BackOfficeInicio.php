<?php

class BackOfficeInicio extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        if (!($_SESSION['usuario']['usuario_rol_id'] == 1 || $_SESSION['usuario']['usuario_rol_id'] == 2)) {
            redirect('');
        }
    }
    public function cargarVista($vista, $datos){

        $this->load->view('template/header', $datos);
        $this->load->view('template/barraBackOffice');
        $this->load->view($vista, $datos);
        $this->load->view('template/footer');
    }

    public function index() {
        $datos['titulo'] = "BACKOFFICE";
        $this->cargarVista("BackOffice/inicio", $datos);
    }
}