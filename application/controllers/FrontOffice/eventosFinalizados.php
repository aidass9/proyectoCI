<?php

class eventosFinalizados extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('eventos_model');
    }

    public function index() {
        $datos['titulo'] = "Eventos finalizados";
        $datos['eventos'] = $this->eventos_model->obtenerFinalizados();
        $this->cargarVista('FrontOffice/eventosFinalizados', $datos);
    }

    private function cargarVista ($vista, $datos) {
        $this->load->view('template/header', $datos);
        $this->load->view('template/navbar');
        $this->load->view($vista, $datos);
        $this->load->view('template/footer');
    }

    public function detalle($id) {
        $datos['evento'] = $this->eventos_model->obtenerPorId($id);
        $datos['titulo'] = $datos['evento']['evento_descripcion'];
        $this->cargarVista('FrontOffice/detalleEventos', $datos);

    }
}