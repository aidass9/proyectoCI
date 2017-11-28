<?php

class usuarios extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model("Usuarios_model");
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

        session_destroy();
        redirect('');
    }

    public function crearUsuario()
    {
        //Comprobar que todos los campos estan llenos
        $this->form_validation->set_rules('usuario_login', 'Usuario_login', 'required',
            array('required' => 'El campo de usuario tiene que estar rellenado'));

        $this->form_validation->set_rules('usuario_clave', 'Usuario_clave', 'required',
            array('required' => 'El campo clave tiene que estar rellenado'));

        $this->form_validation->set_rules('confirmar', 'Confirmar', 'required',
            array('required' => 'El campo confirmar clave tiene que estar rellenado'));

        $this->form_validation->set_rules('usuario_nombre', 'Usuario_nombre', 'required',
            array('required' => 'El campo nombre tiene que estar rellenado'));




        if (!$this->form_validation->run()) {
            //alguna validacion a fallado

            $this->panelCrearUsuario();
        } else {
            $usuario_nombre = $this->input->post('usuario_nombre',
                array('required' => 'El campo de usuario tiene que estar rellenado'));

            $usuario_login = $this->input->post('usuario_login',
                array('required' => 'El campo de login tiene que estar rellenado'));

            $usuario_clave = $this->input->post('usuario_clave',
                array('required' => 'El campo de contraseña tiene que estar rellenado'));

            $confirmar = $this->input->post('confirmar',
                array('required' => 'El campo de confirmar contraseña tiene que estar rellenado'));

            $resultado = $this->Usuarios_model->crear($usuario_nombre, $usuario_login, $usuario_clave, $confirmar);

            if ($resultado) {
                //Mostrar mensaje correcto
                redirect('loggin');
            } else {
                $this->panelCrearUsuario();
            }

        }

    }

    public function iniciarSesion() {
        $this->form_validation->set_rules('usuario_login', 'Usuario_login', 'required',
            array('required' => 'El campo de login tiene que estar rellenado'));

        $this->form_validation->set_rules('usuario_clave', 'Usuario_clave', 'required',
            array('required' => 'El campo de contraseña tiene que estar rellenado'));

        if (!$this->form_validation->run()) {

            $this->index();
        } else {
            $usuario_login = $this->input->post('usuario_login');
            $usuario_clave = $this->input->post('usuario_clave');

            $resultado = $this->Usuarios_model->iniciarSesion($usuario_login, $usuario_clave);

            if ($resultado) {
                //Mostrar mensaje correcto
                redirect('');
            } else {

                $this->index();
            }


        }
    }
}