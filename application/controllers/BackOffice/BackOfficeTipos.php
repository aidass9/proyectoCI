<?php
/**
 * Created by PhpStorm.
 * User: Aida
 * Date: 28/11/2017
 * Time: 17:27
 */

class BackOfficeTipos extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        if (!($_SESSION['usuario']['usuario_rol_id'] == 1 || $_SESSION['usuario']['usuario_rol_id'] == 2)) {
            redirect('');
        }
        $this->load->model('tipos_model');
    }
    public function cargarVista($vista, $datos){

        $this->load->view('template/header', $datos);
        $this->load->view('template/barraBackOffice');
        $this->load->view($vista, $datos);
        $this->load->view('template/footer');
    }

    public function index($pagina = 1) {
        $datos['titulo'] = "Ver tipos";
        $datos['cantPaginas'] = $this->tipos_model->cantPagina();
        $datos['tipos'] = $this->tipos_model->obtenerPorPagina($pagina);
        $this->cargarVista("BackOffice/Tipos/listar", $datos);
    }

    public function panelEditar($id) {
        $datos['titulo'] = "Editar tipos";
        $this->cargarVista("BackOffice/Tipos/editar", $datos);
    }

    public function panelCrear() {
        $datos['titulo'] = "Crear tipos";
        $this->cargarVista("BackOffice/Tipos/crear", $datos);
    }

}