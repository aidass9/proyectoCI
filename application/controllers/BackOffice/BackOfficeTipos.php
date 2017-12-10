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
                $this->session->set_userdata('mensajes', "Exito al crear el tipo");
                $this->index();
            }
            else {
                $this->session->set_userdata('errores', "Fallo al crear el tipo");
                $this->panelCrear();
            }
        }
    }

    public function borrar($id) {
        $resultado = $this->tipos_model->borrar($id);

        if($resultado) {
            $this->session->set_userdata('mensajes', "Exito al borrar el tipo");
        }

        else {
            $this->session->set_userdata('errores', "Fallo al borrar el tipo");
        }

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
                $this->session->set_userdata('mensajes', "Exito al editar el tipo");
                redirect('backoffice/tipos');
            }
            else {
                $this->session->set_userdata('errores', "Fallo al editar el tipo");
                $this->panelEditar($id);
            }
        }
    }
}