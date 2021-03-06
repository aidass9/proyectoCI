<?php
/**
 * Created by PhpStorm.
 * User: Aida
 * Date: 28/11/2017
 * Time: 17:26
 */

class BackOfficeEventos extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        if (!($_SESSION['usuario']['usuario_rol_id'] == 1 || $_SESSION['usuario']['usuario_rol_id'] == 2)) {
            redirect('');
        }
        $this->load->model('eventos_model');
    }
    public function cargarVista($vista, $datos){

        $this->load->view('template/header', $datos);
        $this->load->view('template/barraBackOffice');
        $this->load->view($vista, $datos);
        $this->load->view('template/footer');
    }

    public function index($pagina = 1) {
        $datos['titulo'] = "Ver eventos";
        $datos['cantPaginas'] = $this->eventos_model->cantPagina();
        $datos['eventos'] = $this->eventos_model->obtenerPorPagina($pagina);
        $this->cargarVista("BackOffice/Eventos/listar", $datos);
    }

    public function panelEditar($id) {
        $datos['titulo'] = "Editar eventos";
        $datos['evento'] = $this->eventos_model->obtenerPorId($id);
        $this->cargarVista("BackOffice/Eventos/editar", $datos);
    }

    public function panelCrear() {
        $datos['titulo'] = "Crear eventos";
        $this->cargarVista("BackOffice/Eventos/crear", $datos);
    }

    public function crear() {
        $this->form_validation->set_rules('evento_descripcion', 'Evento_descripcion', 'required',
            array('required' => 'El campo de descripción tiene que estar rellenado'));

        $this->form_validation->set_rules('evento_hora', 'evento_hora', 'required',
            array('required' => 'El campo de hora tiene que estar rellenado'));

        $this->form_validation->set_rules('evento_fecha', 'Evento_fecha', 'required',
            array('required' => 'El campo de fecha tiene que estar rellenado'));

        $this->form_validation->set_rules('evento_poblacion', 'Evento_poblacion', 'required',
            array('required' => 'El campo de población tiene que estar rellenado'));

        $this->form_validation->set_rules('evento_provincia', 'Evento_provincia', 'required',
            array('required' => 'El campo de provincia tiene que estar rellenado'));

        $this->form_validation->set_rules('evento_organizador', 'evento_organizador', 'required',
            array('required' => 'El campo de organizador tiene que estar rellenado'));

        $this->form_validation->set_rules('evento_tipo', 'Evento_tipo', 'required',
            array('required' => 'El campo de tipo tiene que estar rellenado'));

        $this->form_validation->set_rules('evento_distancia', 'Evento_distancia', 'required',
            array('required' => 'El campo de distancia tiene que estar rellenado'));

        $this->form_validation->set_rules('evento_cartel', 'evento_cartel', 'required',
            array('required' => 'El campo de cartel tiene que estar rellenado'));

        $this->form_validation->set_rules('evento_reglamento', 'Evento_reglamento', 'required',
            array('required' => 'El campo de reglamento tiene que estar rellenado'));

        $this->form_validation->set_rules('evento_salida', 'Evento_salida', 'required',
            array('required' => 'El campo de salida tiene que estar rellenado'));

        $this->form_validation->set_rules('evento_meta', 'Evento_meta', 'required',
            array('required' => 'El campo de meta tiene que estar rellenado'));

        $this->form_validation->set_rules('evento_activa', 'Evento_activa', 'required',
            array('required' => 'El campo de activa tiene que estar rellenado'));


        if (!$this->form_validation->run()) {

            $this->panelCrear();
        }
        else {

            $evento_descripcion = $this->input->post('evento_descripcion');
            $evento_hora = $this->input->post('evento_hora');
            $evento_fecha = $this->input->post('evento_fecha');
            $evento_poblacion = $this->input->post('evento_poblacion');
            $evento_provincia = $this->input->post('evento_provincia');
            $evento_organizador = $this->input->post('evento_organizador');
            $evento_tipo = $this->input->post('evento_tipo');
            $evento_distancia = $this->input->post('evento_distancia');
            $evento_cartel = $this->input->post('evento_cartel');
            $evento_reglamento = $this->input->post('evento_reglamento');
            $evento_salida = $this->input->post('evento_salida');
            $evento_meta = $this->input->post('evento_meta');
            $evento_activa = $this->input->post('evento_activa');

            $resultado = $this->eventos_model->crear($evento_descripcion, $evento_hora, $evento_fecha, $evento_poblacion,
                $evento_provincia, $evento_organizador, $evento_tipo, $evento_distancia, $evento_cartel,
                $evento_reglamento, $evento_salida, $evento_meta, $evento_activa);

            if ($resultado) {
                $this->session->set_userdata('mensajes', "Exito al crear el evento");
                $this->index();
            } else {
                $this->session->set_userdata('errores', "Fallo al crear el evento");
                $this->panelCrear();
            }
        }

    }

    public function borrar($id) {
        $resultado = $this->eventos_model->borrar($id);

        if($resultado) {
            $this->session->set_userdata('mensajes', "Exito al borrar el evento");
        }

        else {
            $this->session->set_userdata('errores', "Fallo al borrar el evento");
        }

        redirect('backoffice/eventos');
    }

    public function editar() {
        $id = $this->input->post('evento_id');

        $this->form_validation->set_rules('evento_descripcion', 'evento_descripcion', 'required',
            array('required' => 'El campo de descripción tiene que estar rellenado'));

        $this->form_validation->set_rules('evento_hora', 'evento_hora', 'required',
            array('required' => 'El campo de hora tiene que estar rellenado'));

        $this->form_validation->set_rules('evento_fecha', 'evento_fecha', 'required',
            array('required' => 'El campo de fecha tiene que estar rellenado'));

        $this->form_validation->set_rules('evento_poblacion', 'evento_poblacion', 'required',
            array('required' => 'El campo de población tiene que estar rellenado'));

        $this->form_validation->set_rules('evento_provincia', 'evento_provincia', 'required',
            array('required' => 'El campo de provincia tiene que estar rellenado'));

        $this->form_validation->set_rules('evento_organizador', 'evento_organizador', 'required',
            array('required' => 'El campo de organizador tiene que estar rellenado'));

        $this->form_validation->set_rules('evento_tipo', 'evento_tipo', 'required',
            array('required' => 'El campo de tipo tiene que estar rellenado'));

        $this->form_validation->set_rules('evento_distancia', 'evento_distancia', 'required',
            array('required' => 'El campo de distancia tiene que estar rellenado'));

        $this->form_validation->set_rules('evento_cartel', 'evento_cartel', 'required',
            array('required' => 'El campo de cartel tiene que estar rellenado'));

        $this->form_validation->set_rules('evento_reglamento', 'evento_reglamento', 'required',
            array('required' => 'El campo de reglamento tiene que estar rellenado'));

        $this->form_validation->set_rules('evento_salida', 'evento_salida', 'required',
            array('required' => 'El campo de salida tiene que estar rellenado'));

        $this->form_validation->set_rules('evento_meta', 'evento_meta', 'required',
            array('required' => 'El campo de meta tiene que estar rellenado'));

        $this->form_validation->set_rules('evento_activa', 'evento_activa', 'required',
            array('required' => 'El campo de activa tiene que estar rellenado'));

        if(!$this->form_validation->run()) {
            $this->panelEditar($id);
        }

        else {
            $resultado = $this->eventos_model->editar($this->input->post());

            if($resultado) {
                $this->session->set_userdata('mensajes', "Exito al editar el evento");
                redirect('backoffice/eventos');
            }
            else {
                $this->session->set_userdata('errores', "Fallo al editar el evento");
                $this->panelEditar($id);
            }
        }
     }
}
