<?php
/**
 * Created by PhpStorm.
 * User: Aida
 * Date: 28/11/2017
 * Time: 17:27
 */

class BackOfficeParticipantes extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        if (!($_SESSION['usuario']['usuario_rol_id'] == 1 || $_SESSION['usuario']['usuario_rol_id'] == 2)) {
            redirect('');
        }
        $this->load->model('participantes_model');
    }

    public function cargarVista($vista, $datos){

        $this->load->view('template/header', $datos);
        $this->load->view('template/barraBackOffice');
        $this->load->view($vista, $datos);
        $this->load->view('template/footer');
    }

    public function index($pagina = 1) {
        $datos['titulo'] = "Ver participantes";
        $datos['cantPaginas'] = $this->participantes_model->cantPagina();
        $datos['participantes'] = $this->participantes_model->obtenerPorPagina($pagina);
        $this->cargarVista("BackOffice/Participantes/listar", $datos);
    }

    public function panelEditar($id) {
        $datos['titulo'] = "Editar participantes";
        $datos['noticia'] = $this->participantes_model->obtenerPorId($id);
        $this->cargarVista("BackOffice/Participantes/editar", $datos);
    }

    public function panelCrear() {
        $datos['titulo'] = "Crear participantes";
        $this->cargarVista("BackOffice/Participantes/crear", $datos);
    }

    public function crear() {
        $this->form_validation->set_rules('participante_fecInsc', 'participante_fecInsc', 'required',
            array('required' => 'El campo de fecha inscripción tiene que estar rellenado'));

        $this->form_validation->set_rules('participante_evento_id', 'participante_evento_id', 'required',
            array('required' => 'El campo de evento id tiene que estar rellenado'));

        $this->form_validation->set_rules('participante_categoria', 'participante_categoria', 'required',
            array('required' => 'El campo de categoria tiene que estar rellenado'));

        $this->form_validation->set_rules('participante_nombre', 'participante_nombre', 'required',
            array('required' => 'El campo de nombre tiene que estar rellenado'));

        $this->form_validation->set_rules('participante_apellidos', 'participante_apellidos', 'required',
            array('required' => 'El campo de apellidos tiene que estar rellenado'));

        $this->form_validation->set_rules('participante_nif', 'participante_nif', 'required',
            array('required' => 'El campo de nif tiene que estar rellenado'));

        $this->form_validation->set_rules('paricipante_sexo', 'paricipante_sexo', 'required',
            array('required' => 'El campo de sexo tiene que estar rellenado'));

        $this->form_validation->set_rules('participante_poblacion', 'participante_poblacion', 'required',
            array('required' => 'El campo de población tiene que estar rellenado'));

        $this->form_validation->set_rules('participante_cp', 'participante_cp', 'required',
            array('required' => 'El campo de código postal tiene que estar rellenado'));

        $this->form_validation->set_rules('participante_telefono', 'participante_telefono', 'required',
            array('required' => 'El campo de teléfono tiene que estar rellenado'));

        $this->form_validation->set_rules('participante_email', 'participante_email', 'required',
            array('required' => 'El campo de email tiene que estar rellenado'));

        $this->form_validation->set_rules('participante_fechaNac', 'participante_fechaNac', 'required',
            array('required' => 'El campo de fecha nacimiento tiene que estar rellenado'));

        $this->form_validation->set_rules('participante_club', 'participante_club', 'required',
            array('required' => 'El campo de club tiene que estar rellenado'));

        $this->form_validation->set_rules('participante_dorsal', 'participante_dorsal', 'required',
            array('required' => 'El campo de dorsal tiene que estar rellenado'));

        $this->form_validation->set_rules('participante_posGeneral', 'participante_posGeneral', 'required',
            array('required' => 'El campo de posición tiene que estar rellenado'));

        $this->form_validation->set_rules('participante_tiempoMeta', 'participante_tiempoMeta', 'required',
            array('required' => 'El campo de tiempo meta tiene que estar rellenado'));

        if (!$this->form_validation->run()) {
            $this->panelCrear();
        }

        else {
            $participante_fecInsc = $this->input->post('participante_fecInsc');
            $participante_evento_id = $this->input->post('participante_evento_id');
            $participante_categoria = $this->input->post('participante_categoria');
            $participante_nombre = $this->input->post('participante_nombre');
            $participante_apellidos = $this->input->post('participante_apellidos');
            $participante_nif = $this->input->post('participante_nif');
            $paricipante_sexo = $this->input->post('paricipante_sexo');
            $participante_poblacion = $this->input->post('participante_poblacion');
            $participante_cp = $this->input->post('participante_cp');
            $participante_pais = $this->input->post('participante_pais');
            $participante_telefono = $this->input->post('participante_telefono');
            $participante_email = $this->input->post('participante_email');
            $participante_fechaNac = $this->input->post('participante_fechaNac');
            $participante_club = $this->input->post('participante_club');
            $participante_dorsal = $this->input->post('participante_dorsal');
            $participante_posGeneral = $this->input->post('participante_posGeneral');
            $participante_tiempoMeta = $this->input->post('participante_tiempoMeta');

            $resultado = $this->participantes_model->crear(
                $participante_fecInsc, $participante_evento_id, $participante_categoria, $participante_nombre,
                $participante_apellidos, $participante_nif, $paricipante_sexo, $participante_poblacion,
                $participante_cp, $participante_pais, $participante_telefono, $participante_email,
                $participante_fechaNac, $participante_club, $participante_dorsal, $participante_posGeneral,
                $participante_tiempoMeta
            );

            if ($resultado) {
                $this->index();
            }

            else {
                $this->panelCrear();
            }
        }
    }

    public function borrar($id) {
        $this->participantes_model->borrar($id);

        redirect('backoffice/participantes');
    }

    public function editar() {
        $id = $this->input->post('participante_id');

        $this->form_validation->set_rules('participante_fecInsc', 'participante_fecInsc', 'required',
            array('required' => 'El campo de fecha inscripción tiene que estar rellenado'));

        $this->form_validation->set_rules('participante_evento_id', 'participante_evento_id', 'required',
            array('required' => 'El campo de evento id tiene que estar rellenado'));

        $this->form_validation->set_rules('participante_categoria', 'participante_categoria', 'required',
            array('required' => 'El campo de categoria tiene que estar rellenado'));

        $this->form_validation->set_rules('participante_nombre', 'participante_nombre', 'required',
            array('required' => 'El campo de nombre tiene que estar rellenado'));

        $this->form_validation->set_rules('participante_apellidos', 'participante_apellidos', 'required',
            array('required' => 'El campo de apellidos tiene que estar rellenado'));

        $this->form_validation->set_rules('participante_nif', 'participante_nif', 'required',
            array('required' => 'El campo de nif tiene que estar rellenado'));

        $this->form_validation->set_rules('paricipante_sexo', 'paricipante_sexo', 'required',
            array('required' => 'El campo de sexo tiene que estar rellenado'));

        $this->form_validation->set_rules('participante_poblacion', 'participante_poblacion', 'required',
            array('required' => 'El campo de población tiene que estar rellenado'));

        $this->form_validation->set_rules('participante_cp', 'participante_cp', 'required',
            array('required' => 'El campo de código postal tiene que estar rellenado'));

        $this->form_validation->set_rules('participante_telefono', 'participante_telefono', 'required',
            array('required' => 'El campo de teléfono tiene que estar rellenado'));

        $this->form_validation->set_rules('participante_pais', 'participante_pais', 'required',
            array('required' => 'El campo de pais tiene que estar rellenado'));

        $this->form_validation->set_rules('participante_email', 'participante_email', 'required',
            array('required' => 'El campo de email tiene que estar rellenado'));

        $this->form_validation->set_rules('participante_fechaNac', 'participante_fechaNac', 'required',
            array('required' => 'El campo de fecha nacimiento tiene que estar rellenado'));

        $this->form_validation->set_rules('participante_club', 'participante_club', 'required',
            array('required' => 'El campo de club tiene que estar rellenado'));

        $this->form_validation->set_rules('participante_dorsal', 'participante_dorsal', 'required',
            array('required' => 'El campo de dorsal tiene que estar rellenado'));

        $this->form_validation->set_rules('participante_posGeneral', 'participante_posGeneral', 'required',
            array('required' => 'El campo de posición tiene que estar rellenado'));

        $this->form_validation->set_rules('participante_tiempoMeta', 'participante_tiempoMeta', 'required',
            array('required' => 'El campo de tiempo meta tiene que estar rellenado'));

        if($this->form_validation->run()) {
            $this->panelEditar();
        }

        else {
            $resultado = $this->participantes_model->editar($this->input->post());

            if($resultado) {
                redirect('backoffice/participantes');
            }
            else {
                $this->panelEditar($id);
            }
        }


    }

}