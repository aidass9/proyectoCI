<?php
/**
 * Created by PhpStorm.
 * User: Aida
 * Date: 28/11/2017
 * Time: 18:42
 */

class Eventos_model extends CI_Model
{
    private $cantPorPagina = 200;

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function cantPagina() {
        $cantTotal = $this->db->count_all_results('eventos'); //cuanta cuantos resultados hay en la tabla eventos
        return $cantTotal / $this->cantPorPagina;

    }

    public function obtenerPorPagina($pagina) {
        $inicio = ($pagina -1) * $this->cantPorPagina;
        $this->db->select('*');
        $this->db->limit($this->cantPorPagina, $inicio);
        $query = $this->db->get('eventos');

        return $query->result_array();
    }

    public function crear($evento_descripcion, $evento_hora, $evento_fecha, $evento_poblacion,
                          $evento_provincia, $evento_organizador, $evento_tipo, $evento_distancia, $evento_cartel,
                          $evento_reglamento, $evento_salida, $evento_meta, $evento_activa) {
        $evento = Array(
            'evento_descripcion' => $evento_descripcion,
            'evento_hora' => $evento_hora,
            'evento_fecha' => $evento_fecha,
            'evento_poblacion' => $evento_poblacion,
            'evento_provincia' => $evento_provincia,
            'evento_organizador' => $evento_organizador,
            'evento_tipo' => $evento_tipo,
            'evento_distancia' => $evento_distancia,
            'evento_cartel' => $evento_cartel,
            'evento_reglamento' => $evento_reglamento,
            'evento_salida' => $evento_salida,
            'evento_meta' => $evento_meta,
            'evento_activa' => $evento_activa,

        );
        return $this->db->insert('eventos', $evento);
    }

    public function borrar($id) {
        $this->db->delete('eventos', array('evento_id' => id));
    }

}