<?php
/**
 * Created by PhpStorm.
 * User: Aida
 * Date: 28/11/2017
 * Time: 17:27
 */

class BackOfficeUsuarios extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        if (!($_SESSION['usuario']['usuario_rol_id'] == 1 || $_SESSION['usuario']['usuario_rol_id'] == 2)) {
            redirect('');
        }
        $this->load->model('usuarios_model');
    }
    public function cargarVista($vista, $datos){

        $this->load->view('template/header', $datos);
        $this->load->view('template/barraBackOffice');
        $this->load->view($vista, $datos);
        $this->load->view('template/footer');
    }

    public function index($pagina = 1) {
        $datos['titulo'] = "Ver usuarios";
        $datos['cantPaginas'] = $this->usuarios_model->cantPagina();
        $datos['usuarios'] = $this->usuarios_model->obtenerPorPagina($pagina);
        $this->cargarVista("BackOffice/Usuarios/listar", $datos);
    }

    public function panelEditar($id) {
        $datos['titulo'] = "Editar usuarios";
        $this->cargarVista("BackOffice/Usuarios/editar", $datos);
    }

    public function panelCrear() {
        $datos['titulo'] = "Crear usuarios";
        $this->cargarVista("BackOffice/Usuarios/crear", $datos);
    }

}