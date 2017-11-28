<?php
/**
 * Created by PhpStorm.
 * User: Aida
 * Date: 28/11/2017
 * Time: 18:43
 */

class Noticias_model extends CI_Model
{
    private $cantPorPagina = 5;

    public function __construct()
{
    parent::__construct();
    $this->load->database();
}
    public function cantPagina() {
        $cantTotal = $this->db->count_all_results('noticias'); //cuanta cuantos resultados hay en la tabla eventos
        return $cantTotal / $this->cantPorPagina;

    }

    public function obtenerPorPagina($pagina) {
        $inicio = ($pagina -1) * $this->cantPorPagina;
        $this->db->select('*');
        $this->db->limit($this->cantPorPagina, $inicio);
        $query = $this->db->get('noticias');

        return $query->result_array();
    }
}