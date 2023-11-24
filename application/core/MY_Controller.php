<?php
class MY_Controller extends CI_Controller
{
    protected $dataUser;

    public function __construct()
    {
        parent::__construct();
        $this->dataUser = false;
        if ($this->session->has_userdata('id_usuario')) {
            $id_usuario = $this->session->userdata('id_usuario');

            $this->dataUser = $this->db->select('nome, email')->get_where('professores', ['id' => $id_usuario])->result();
        }
    }
}

?>