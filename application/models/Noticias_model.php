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

    public function crear($noticia_slug, $Usuario, $noticia_titulo, $noticia_fecha, $noticia_texto, $noticia_imagen) {
        $noticia = Array(
            'noticia_slug' => $noticia_slug,
            'Usuario' => $Usuario,
            'noticia_titulo' => $noticia_titulo,
            'noticia_fecha' => $noticia_fecha,
            'noticia_texto' => $noticia_texto,
            'noticia_imagen' => $noticia_imagen,
        );

        return $this->db->insert('noticias', $noticia);
    }

    public function borrar($id) {
        return $this->db->delete('noticias', array('noticia_id' => $id));
    }

    public function obtenerPorId($id) {
        $query = $this->db->get_where('noticias', array('noticia_id' => $id));
        return $query->row_array();
    }

    public function editar($noticia) {
        return $this->db->replace('noticias', $noticia);
    }

    public function obtenerNoticias() {
        $sql = "SELECT * FROM noticias";
        return $this->db->query($sql)->result_array();
    }
}