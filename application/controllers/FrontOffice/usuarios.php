<?php

class usuarios extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model("Usuario_model");
    }

    public function index()
    {
        $datos['titulo'] = "Iniciar sesión";
        $this->cargarVista('FrontOffice/loggin', $datos);
    }

    private function cargarVista($vista, $datos)
    {
        $this->load->view('template/header', $datos);
        $this->load->view('template/navbar');
        $this->load->view($vista, $datos);
        $this->load->view('template/footer');
    }

    function panelCrearUsuario()
    {
        $datos['titulo'] = "Registrar usuario:";
        $this->cargarVista('FrontOffice/iniciar-sesion', $datos);
    }

    public function cerrarSesion()
    {
        session_start();
        session_destroy();
        redirect('');
    }

    public function crearUsuario()
    {
        $this->form_validation->set_rules('usuario_nombre', 'Usuario_nombre', 'required'); //Comprobar que todos los campos estan llenos
        $this->form_validation->set_rules('usuario_login', 'Usuario_login', 'required');
        $this->form_validation->set_rules('usuario_clave', 'Usuario_clave', 'required');
        $this->form_validation->set_rules('confirmar', 'Confirmar', 'required');

        if (!$this->form_validation->run()) {
            //alguna validacion a fallado

            //Mostrar errores
            redirect('registrar-usuario');
        } else {
            $usuario_nombre = $this->input->post('usuario_nombre');
            $usuario_login = $this->input->post('usuario_login');
            $usuario_clave = $this->input->post('usuario_clave');
            $confirmar = $this->input->post('confirmar');

            $resultado = $this->Usuario_model->crear($usuario_nombre, $usuario_login, $usuario_clave, $confirmar);

            if ($resultado) {
                //Mostrar mensaje correcto
                redirect('loggin');
            } else {
                //Mostrar errores
                redirect('registrar-usuario');
            }

        }

    }

    public function iniciarSesion() {
        session_start();
        $this->form_validation->set_rules('usuario_login', 'Usuario_login', 'required');
        $this->form_validation->set_rules('usuario_clave', 'Usuario_clave', 'required');

        if (!$this->form_validation->run()) {
            //Mostrar mensaje error
            redirect('loggin');
        } else {
            $usuario_login = $this->input->post('usuario_login');
            $usuario_clave = $this->input->post('usuario_clave');

            $resultado = $this->Usuario_model->iniciarSesion($usuario_login, $usuario_clave);

            if ($resultado) {
                //Mostrar mensaje correcto
                redirect('');
            } else {
                //Mostrar errores
                redirect('loggin');
            }


        }
    }
}