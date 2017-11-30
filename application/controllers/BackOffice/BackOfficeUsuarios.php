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

    public function crear() {
        $this->form_validation->set_rules('usuario_nombre', 'usuario_nombre', 'required',
            array('required' => 'El campo de nombre tiene que estar rellenado'));

        $this->form_validation->set_rules('usuario_clave', 'usuario_clave', 'required',
            array('required' => 'El campo de clave tiene que estar rellenado'));

        $this->form_validation->set_rules('confirmarPass', 'confirmarPass', 'required',
            array('required' => 'El campo de clave confirmar tiene que estar rellenado'));

        $this->form_validation->set_rules('usuario_rol_id', 'usuario_rol_id', 'required',
            array('required' => 'El campo de rol id tiene que estar rellenado'));

        $this->form_validation->set_rules('usuario_login', 'usuario_login', 'required',
            array('required' => 'El campo de login tiene que estar rellenado'));

        if(!$this->form_validation->run()) {
            $this->panelCrear();
        }

        else {
            $usuario_nombre = $this->input->post('usuario_nombre');
            $usuario_clave = $this->input->post('usuario_clave');
            $confirmarPass = $this->input->post('confirmarPass');
            $usuario_rol_id = $this->input->post('usuario_rol_id');
            $usuario_login = $this->input->post('usuario_login');

            $resultado = $this->usuarios_model->crear($usuario_nombre, $usuario_login, $usuario_clave, $confirmarPass, $usuario_rol_id);

            if($resultado) {
                $this->index();
            }

            else {
                $this->panelCrear();
            }
        }
    }
}