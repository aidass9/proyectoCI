<?php
/**
 * Created by PhpStorm.
 * User: Aida
 * Date: 28/11/2017
 * Time: 17:26
 */

class BackOfficeEventos extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        if (!($_SESSION['usuario']['usuario_rol_id'] == 1 || $_SESSION['usuario']['usuario_rol_id'] == 2)) {
            redirect('');
        }
        $this->load->model('eventos_model');
    }
    public function cargarVista($vista, $datos){

        $this->load->view('template/header', $datos);
        $this->load->view('template/barraBackOffice');
        $this->load->view($vista, $datos);
        $this->load->view('template/footer');
    }

    public function index($pagina = 1) {
        $datos['titulo'] = "Ver eventos";
        $datos['cantPaginas'] = $this->eventos_model->cantPagina();
        $datos['eventos'] = $this->eventos_model->obtenerPorPagina($pagina);
        $this->cargarVista("BackOffice/Eventos/listar", $datos);
    }

    public function panelEditar($id) {
        $datos['titulo'] = "Editar eventos";
        $this->cargarVista("BackOffice/Eventos/editar", $datos);
    }

    public function panelCrear() {
        $datos['titulo'] = "Crear eventos";
        $this->cargarVista("BackOffice/Eventos/crear", $datos);
    }

}