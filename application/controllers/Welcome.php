<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('language');

        if ($this->session->has_userdata('id_usuario')) {
            redirect('dashboard');
        }
    }
    public function index()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
            $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[8]');

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'error_email' => form_error('email') ? form_error('email') : false,
                    'error_senha' => form_error('senha') ? form_error('senha') : false
                );

                $this->load->view('login', $data);

            } else {
                $email = $this->input->post('email');
                $senha = $this->input->post('senha');

                $query = $this->db->get_where('professores', ['email' => $email, 'senha' => $senha]);

                $usuario = $query->row();

                if ($email == $usuario->email and $senha == $usuario->senha) {
                    $data = array(
                        'id_usuario' => $usuario->id,
                        'email' => $email,
                        'logged_in' => TRUE
                    );
                    
                    $this->session->set_userdata($data);
    
                    redirect('dashboard');
                } else {
                    echo "Login inválido!";
                    $this->load->view('login');
                }
            }
        } else {
            $this->load->view('login');
        }
    }
}
?>