<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    public function index()
    {
        $query = $this->db->get('professores');
        $data['databasetest'] = $query->result();
        $this->load->view('users', $data);
    }
    public function edit()
    {
        $query = $this->db->where('id', $this->uri->segment(2))->get('professores');
        $data['databasetest'] = $query->result();

        $this->load->view('users', $data);
    }
    public function logout()
    {
        $this->session->sess_destroy('id_usuario');

        $response = array(
            'success' => true,
            'csrf_test_name' => $this->security->get_csrf_hash()
        );

        header('Content-Type: application/json');
        echo json_encode($response);

        return;
    }

    public function alterDados()
    {
        $this->load->view('dbTest/dashboard');
    }

    public function updatePhoto()
    {
        $config["upload_path"] = "assets/upload/";
        $config['image_library'] = 'gd2';
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        //Add the size default f image
        $config['max_size'] = 7200;
        //Config the types of file
        $config['allowed_types'] = "gif|jpg|jpeg|png|svg";

        $this->load->library('upload', $config);

        $this->image_lib->resize();
        if(!$this->upload->do_upload('foto_usuario')){
            $msg = $this->upload->display_errors();
            $this->session->set_flashdata('msg', $msg);
        }else{
            $msg = "Upload realizado com sucesso";
        }
        
        redirect("dashboard");
    }
}
?>