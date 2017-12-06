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
        $datos['tipo'] = $this->tipos_model->obtenerPorId($id);
        $this->cargarVista("BackOffice/Tipos/editar", $datos);
    }

    public function panelCrear() {
        $datos['titulo'] = "Crear tipos";
        $this->cargarVista("BackOffice/Tipos/crear", $datos);
    }

    public function crear() {
        $this->form_validation->set_rules('tipo_descripcion', 'tipo_descripcion', 'required',
            array('required' => 'El campo de descripción tiene que estar rellenado'));

        if(!$this->form_validation->run()) {
            $this->panelCrear();
        }

        else {
            $tipo_descripcion = $this->input->post('tipo_descripcion');

            $resultado = $this->tipos_model->crear($tipo_descripcion);

            if($resultado) {
                $this->index();
            }
            else {
                $this->panelCrear();
            }
        }
    }

    public function borrar($id) {
        $this->tipos_model->borrar($id);

        redirect('backoffice/tipos');

    }

    public function editar() {
        $id = $this->input->post('tipo_id');

        $this->form_validation->set_rules('tipo_descripcion', 'tipo_descripcion', 'required',
            array('required' => 'El campo de descripción tiene que estar rellenado'));

        $this->form_validation->set_rules('tipo_id', 'tipo_id', 'required',
            array('required' => 'El campo de id tiene que estar rellenado'));

        if(!$this->form_validation->run()) {

            $this->panelEditar();
        }

        else {
            $resultado = $this->tipos_model->editar($this->input->post());

            if($resultado) {
                redirect('backoffice/tipos');
            }
            else {
                $this->panelEditar($id);
            }
        }
    }
}