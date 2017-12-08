<?php

class Inicio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('eventos_model');
    }

    public function index() {
        $datos['titulo'] = "Inicio";
        $datos['titulo'] = "Eventos activos";
        $datos['eventos'] = $this->eventos_model->obtenerNoFinalizados();
        $this->cargarVista('FrontOffice/inicio', $datos);

    }

    private function cargarVista ($vista, $datos) {
        $this->load->view('template/header', $datos);
        $this->load->view('template/navbar');
        $this->load->view($vista, $datos);
        $this->load->view('template/footer');
    }
}