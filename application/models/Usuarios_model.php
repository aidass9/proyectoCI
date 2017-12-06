<?php

class Usuarios_model extends CI_Model {
    private $cantPorPagina = 5;

    public function __construct()  {
        parent::__construct();
        $this->load->database();
    }

    public function crear($nombre, $login, $password, $confirmar, $rol_id=3) {
        if($password === $confirmar) {
            $usuario = Array (
                'usuario_nombre' => $nombre,
                'usuario_login' => $login,
                'usuario_rol_id' => $rol_id,
                'usuario_clave' => $this->hash_password($password),

            );

            return $this->db->insert('usuarios', $usuario);
        }
    }

    public function iniciarSesion($login, $password) {

        $query = $this->db->get_where('usuarios', Array('usuario_login' => $login));
        $usuario = $query->row_array();
        $coincide = $this->hash_verify($password, $usuario['usuario_clave']);

        if ($coincide) {
            $_SESSION['usuario'] = $usuario;
            return true;
        }
    }

    private function hash_password($password)
    {
        return password_hash($password, PASSWORD_BCRYPT, Array('cost' => 9));
    }
    private function hash_verify($password, $hashed_password)
    {
        return password_verify($password, $hashed_password);
    }

    public function cantPagina() {
        $cantTotal = $this->db->count_all_results('usuarios');
        return $cantTotal / $this->cantPorPagina;

    }

    public function obtenerPorPagina($pagina) {
        $inicio = ($pagina -1) * $this->cantPorPagina;
        $this->db->select('*');
        $this->db->limit($this->cantPorPagina, $inicio);
        $query = $this->db->get('usuarios');

        return $query->result_array();
    }

    public function borrar($id) {
        $this->db->delete('usuarios', array('usuario_id' => $id));
    }

    public function obtenerPorId($id) {
        $query = $this->db->get_where('usuarios', array('usuario_id' => $id));

        return $query->row_array();
    }

    public function editar($usuario) {
        return $this->db->replace('usuarios', $usuario);
    }
}