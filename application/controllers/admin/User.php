<?php

class User extends CI_Controller
{
    public function index()
    {
        $data['users'] = $this->user_models->getAllUser();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar');
        $this->load->view('admin/user', $data);
        $this->load->view('templates_admin/footer');
    }
}
