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
        $datos['rol'] = $this->roles_model->obtenerPorId($id);
        $this->cargarVista("BackOffice/Roles/editar", $datos);
    }

    public function panelCrear() {
        $datos['titulo'] = "Crear roles";
        $this->cargarVista("BackOffice/Roles/crear", $datos);
    }

    public function crear() {
        $this->form_validation->set_rules('rol_nombre', 'Rol_nombre', 'required',
            array('required' => 'El campo de nombre tiene que estar rellenado'));

        $this->form_validation->set_rules('rol_nivel', 'Rol_nivel', 'required',
            array('required' => 'El campo de nivel tiene que estar rellenado'));

        if (!$this->form_validation->run()) {

            $this->panelCrear();
        }
        else {
            $rol_nombre = $this->input->post('rol_nombre');
            $rol_nivel = $this->input->post('rol_nivel');
            $resultado = $this->roles_model->crear($rol_nombre, $rol_nivel);

            if ($resultado) {
                $this->session->set_userdata('mensajes', "Exito al crear el rol");
                $this->index();
            } else {
                $this->session->set_userdata('errores', "Fallo al crear el rol");
                $this->panelCrear();
            }
        }

    }

    public function borrar($id) {
        $resultado = $this->roles_model->borrar($id);

        if($resultado) {
            $this->session->set_userdata('mensajes', "Exito al borrar el rol");
        }

        else {
            $this->session->set_userdata('errores', "Fallo al borrar el rol");
        }

        redirect('backoffice/roles');
    }

    public function editar() {
        $id = $this->input->post('rol_id');

        $this->form_validation->set_rules('rol_nombre', 'rol_nombre', 'required',
            array('required' => 'El campo de nombre tiene que estar rellenado'));

        $this->form_validation->set_rules('rol_nivel', 'rol_nivel', 'required',
            array('required' => 'El campo de nivel tiene que estar rellenado'));

        if(!$this->form_validation->run()) {

            $this->panelEditar();
        }

        else {
            $resultado = $this->roles_model->editar($this->input->post());

            if($resultado) {
                $this->session->set_userdata('mensajes', "Exito al editar el rol");
                redirect('backoffice/roles');
            }
            else {
                $this->session->set_userdata('errores', "Fallo al editar el rol");
                $this->panelEditar($id);
            }
        }
    }
}
