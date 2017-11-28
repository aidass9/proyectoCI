<?php
/**
 * Created by PhpStorm.
 * User: Aida
 * Date: 28/11/2017
 * Time: 17:27
 */

class BackOfficeRoles extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        if (!($_SESSION['usuario']['usuario_rol_id'] == 1 || $_SESSION['usuario']['usuario_rol_id'] == 2)) {
            redirect('');
        }
        $this->load->model('roles_model');

    }
    public function cargarVista($vista, $datos){

        $this->load->view('template/header', $datos);
        $this->load->view('template/barraBackOffice');
        $this->load->view($vista, $datos);
        $this->load->view('template/footer');
    }

    public function index($pagina = 1) {
        $datos['titulo'] = "Ver roles";
        $datos['cantPaginas'] = $this->roles_model->cantPagina();
        $datos['roles'] = $this->roles_model->obtenerPorPagina($pagina);
        $this->cargarVista("BackOffice/Roles/listar", $datos);
    }

    public function panelEditar($id) {
        $datos['titulo'] = "Editar roles";
        $this->cargarVista("BackOffice/Roles/editar", $datos);
    }

    public function panelCrear() {
        $datos['titulo'] = "Crear roles";
        $this->cargarVista("BackOffice/Roles/crear", $datos);
    }


}