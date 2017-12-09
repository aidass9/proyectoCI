<?php

class noticias extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('noticias_model');
    }

    public function index() {
        $datos['titulo'] = "Noticias";
        $datos['noticias'] = $this->noticias_model->obtenerNoticias();
        $this->cargarVista('FrontOffice/noticias', $datos);

    }

    private function cargarVista ($vista, $datos) {
        $this->load->view('template/header', $datos);
        $this->load->view('template/navbar');
        $this->load->view($vista, $datos);
        $this->load->view('template/footer');
    }

    public function detalle($id) {
        $datos['noticia'] = $this->noticias_model->obtenerPorId($id);
        $datos['titulo'] = $datos['noticia']['noticia_titulo'];
        $this->cargarVista('FrontOffice/detalleNoticias', $datos);
    }
}