<?php
/**
 * Created by PhpStorm.
 * User: Aida
 * Date: 28/11/2017
 * Time: 18:43
 */

class Participantes_model extends CI_Model
{
    private $cantPorPagina = 100;

    public function __construct()
{
    parent::__construct();
    $this->load->database();
}
    public function cantPagina() {
        $cantTotal = $this->db->count_all_results('participantes'); //cuanta cuantos resultados hay en la tabla eventos
        return $cantTotal / $this->cantPorPagina;

    }

    public function obtenerPorPagina($pagina) {
        $inicio = ($pagina -1) * $this->cantPorPagina;
        $this->db->select('*');
        $this->db->limit($this->cantPorPagina, $inicio);
        $query = $this->db->get('participantes');

        return $query->result_array();
    }

    public function crear(
        $participante_fecInsc, $participante_evento_id, $participante_categoria, $participante_nombre,
        $participante_apellidos, $participante_nif, $paricipante_sexo, $participante_poblacion,
        $participante_cp, $participante_pais, $participante_telefono, $participante_email,
        $participante_fechaNac, $participante_club, $participante_dorsal, $participante_posGeneral,
        $participante_tiempoMeta
    ) {
        $participante = Array(
            'participante_fecInsc' => $participante_fecInsc,
            'participante_evento_id' => $participante_evento_id,
            'participante_categoria' => $participante_categoria,
            'participante_nombre' => $participante_nombre,
            'participante_apellidos' => $participante_apellidos,
            'participante_nif' => $participante_nif,
            'paricipante_sexo' => $paricipante_sexo,
            'participante_poblacion' => $participante_poblacion,
            'participante_cp' => $participante_cp,
            'participante_pais' => $participante_pais,
            'participante_telefono' => $participante_telefono,
            'participante_email' => $participante_email,
            'participante_fechaNac' => $participante_fechaNac,
            'participante_club' => $participante_club,
            'participante_dorsal' => $participante_dorsal,
            'participante_posGeneral' => $participante_posGeneral,
            'participante_tiempoMeta' => $participante_tiempoMeta,
        );

        return $this->db->insert('participantes', $participante);
    }

    public function borrar($id) {
        $this->db->delete('participantes', array('participante_id' => $id));
    }

    public function obtenerPorId($id) {
        $query = $this->db->get_where('participantes', array('participante_id' => $id));
        return $query->row_array();
    }

    public function editar($participante) {
        return $this->db->replace('participantes', $participante);
    }

    public function obtenerParticipantes() {
        $sql = "SELECT * FROM participantes";
        return $this->db->query($sql)->result_array();
    }
}