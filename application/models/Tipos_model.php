<?php
/**
 * Created by PhpStorm.
 * User: Aida
 * Date: 28/11/2017
 * Time: 18:44
 */

class Tipos_model extends CI_Model
{
    private $cantPorPagina = 5;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function cantPagina() {
        $cantTotal = $this->db->count_all_results('tipos');
        return $cantTotal / $this->cantPorPagina;

    }

    public function obtenerPorPagina($pagina) {
        $inicio = ($pagina -1) * $this->cantPorPagina;
        $this->db->select('*');
        $this->db->limit($this->cantPorPagina, $inicio);
        $query = $this->db->get('tipos');

        return $query->result_array();
    }

    public function crear($tipo_descripcion) {
        $tipo = Array('tipo_descripcion' => $tipo_descripcion);

        return $this->db->insert('tipos', $tipo);
    }

    public function borrar($id) {
        return $this->db->delete('tipos', array('tipo_id' => $id));
    }

    public function obtenerPorId($id) {
        $query = $this->db->get_where('tipos', Array('tipo_id' => $id));
        return $query->row_array();
    }

    public function editar($tipo) {
        return $this->db->replace('tipos', $tipo);

    }
}