<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->has_userdata('id_usuario')) {
           redirect(' ');
        }
    }
    public function index()
    {
        $data['nome'] = $this->dataUser;

        $this->load->view('dashboard', $data);
    }
}
?>