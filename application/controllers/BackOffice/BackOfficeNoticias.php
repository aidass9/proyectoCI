<?php
/**
 * Created by PhpStorm.
 * User: Aida
 * Date: 28/11/2017
 * Time: 17:27
 */

class BackOfficeNoticias extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        if (!($_SESSION['usuario']['usuario_rol_id'] == 1 || $_SESSION['usuario']['usuario_rol_id'] == 2)) {
            redirect('');
        }
        $this->load->model('noticias_model');
    }
    public function cargarVista($vista, $datos){

        $this->load->view('template/header', $datos);
        $this->load->view('template/barraBackOffice');
        $this->load->view($vista, $datos);
        $this->load->view('template/footer');
    }

    public function index($pagina = 1) {
        $datos['titulo'] = "Ver noticias";
        $datos['cantPaginas'] = $this->noticias_model->cantPagina();
        $datos['noticias'] = $this->noticias_model->obtenerPorPagina($pagina);
        $this->cargarVista("BackOffice/Noticias/listar", $datos);
    }

    public function panelEditar($id) {
        $datos['titulo'] = "Editar noticias";
        $datos['noticia'] = $this->noticias_model->obtenerPorId($id);
        $this->cargarVista("BackOffice/Noticias/editar", $datos);
    }

    public function panelCrear() {
        $datos['titulo'] = "Crear noticias";
        $this->cargarVista("BackOffice/Noticias/crear", $datos);
    }

    public function crear() {
        $this->form_validation->set_rules('noticia_slug', 'noticia_slug', 'required',
            array('required' => 'El campo de slug tiene que estar rellenado'));

        $this->form_validation->set_rules('Usuario', 'Usuario', 'required',
            array('required' => 'El campo de usuario tiene que estar rellenado'));

        $this->form_validation->set_rules('noticia_titulo', 'noticia_titulo', 'required',
            array('required' => 'El campo de titulo tiene que estar rellenado'));

        $this->form_validation->set_rules('noticia_fecha', 'noticia_fecha', 'required',
            array('required' => 'El campo de fecha tiene que estar rellenado'));

        $this->form_validation->set_rules('noticia_texto', 'noticia_texto', 'required',
            array('required' => 'El campo de texto tiene que estar rellenado'));

        $this->form_validation->set_rules('noticia_imagen', 'noticia_imagen', 'required',
            array('required' => 'El campo de imagen tiene que estar rellenado'));

        if (!$this->form_validation->run()) {
            $this->panelCrear();
        }

        else {
            $noticia_slug = $this->input->post('noticia_slug');
            $Usuario = $this->input->post('Usuario');
            $noticia_titulo = $this->input->post('noticia_titulo');
            $noticia_fecha = $this->input->post('noticia_fecha');
            $noticia_texto = $this->input->post('noticia_texto');
            $noticia_imagen = $this->input->post('noticia_imagen');

            $resultado = $this->noticias_model->crear($noticia_slug, $Usuario, $noticia_titulo, $noticia_fecha, $noticia_texto, $noticia_imagen);

            if ($resultado) {
                $this->session->set_userdata('mensajes', "Exito al crear la noticia");
                $this->index();
            }

            else {
                $this->session->set_userdata('errores', "Fallo al crear la noticia");
                $this->panelCrear();
            }
        }
    }

    public function borrar($id) {
        $resultado = $this->noticias_model->borrar($id);

        if($resultado) {
            $this->session->set_userdata('mensajes', "Exito al borrar la noticia");
        }

        else {
            $this->session->set_userdata('errores', "Fallo al borrar la noticia");
        }

        redirect('backoffice/noticias');
    }

    public function editar() {
        $id = $this->input->post('noticia_id');

        $this->form_validation->set_rules('noticia_slug', 'noticia_slug', 'required',
            array('required' => 'El campo de slug tiene que estar rellenado'));

        $this->form_validation->set_rules('Usuario', 'Usuario', 'required',
            array('required' => 'El campo de usuario tiene que estar rellenado'));

        $this->form_validation->set_rules('noticia_titulo', 'noticia_titulo', 'required',
            array('required' => 'El campo de titulo tiene que estar rellenado'));

        $this->form_validation->set_rules('noticia_fecha', 'noticia_fecha', 'required',
            array('required' => 'El campo de fecha tiene que estar rellenado'));

        $this->form_validation->set_rules('noticia_texto', 'noticia_texto', 'required',
            array('required' => 'El campo de texto tiene que estar rellenado'));

        $this->form_validation->set_rules('noticia_imagen', 'noticia_imagen', 'required',
            array('required' => 'El campo de imagen tiene que estar rellenado'));

        if($this->form_validation->run()) {
            $this->panelEditar();
        }

        else {
            $resultado = $this->noticias_model->editar($this->input->post());

            if($resultado) {
                $this->session->set_userdata('mensajes', "Exito al editar la noticia");
                redirect('backoffice/noticias');
            }
            else {
                $this->session->set_userdata('errores', "Fallo al editar la noticia");
                $this->panelEditar($id);
            }
        }


    }

}