<?php

class eventosFinalizados extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $datos['titulo'] = "Eventos finalizados";
        $this->cargarVista('FrontOffice/eventosFinalizados', $datos);
    }

    private function cargarVista ($vista, $datos) {
        $this->load->view('template/header', $datos);
        $this->load->view('template/navbar');
        $this->load->view($vista, $datos);
        $this->load->view('template/footer');
    }
}