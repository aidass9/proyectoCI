<?php

class usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $datos['titulo'] = "Iniciar sesión";
        $this->cargarVista('FrontOffice/loggin', $datos);
    }

    private function cargarVista ($vista, $datos) {
        $this->load->view('template/header', $datos);
        $this->load->view('template/navbar');
        $this->load->view($vista, $datos);
        $this->load->view('template/footer');
    }

    public function cerrarSesion() {
        echo "Sesion cerrada";
    }
}