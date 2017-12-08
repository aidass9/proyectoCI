<?php
/**
 * Created by PhpStorm.
 * User: Aida
 * Date: 28/11/2017
 * Time: 18:45
 */

class Roles_model extends CI_Model
{
    private $cantPorPagina = 5;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function cantPagina() {
        $cantTotal = $this->db->count_all_results('roles'); //cuanta cuantos resultados hay en la tabla eventos
        return $cantTotal / $this->cantPorPagina;

    }

    public function obtenerPorPagina($pagina) {
        $inicio = ($pagina -1) * $this->cantPorPagina;
        $this->db->select('*');
        $this->db->limit($this->cantPorPagina, $inicio);
        $query = $this->db->get('roles');

        return $query->result_array();
    }

    public function crear($rol_nombre, $rol_nivel) {
        $rol = Array(
            'rol_nombre' => $rol_nombre,
            'rol_nivel'  => $rol_nivel,
        );

        return $this->db->insert('roles', $rol);
    }

    public function borrar($id) {
        $this->db->delete('roles', array('rol_id' => $id));
    }

    public function obtenerPorId($id) {
        $query = $this->db->get_where('roles', Array('rol_id' => $id));
        return $query->row_array();
    }

    public function editar($rol) {
        return $this->db->replace('roles', $rol);
    }

}