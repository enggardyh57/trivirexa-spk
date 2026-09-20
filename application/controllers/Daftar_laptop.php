<?php

class Daftar_laptop extends CI_Controller
{
    public function index()
    {
        $data['laptop'] = $this->laptop_models->getAllLaptop();
        $sort = $this->input->get('sort');
        $keyword = $this->input->get('keyword');

        $this->db->from('laptop');


        // SEARCH
        if (!empty($keyword)) {

            $this->db->group_start();

            $this->db->like('nama_laptop', $keyword);

            $this->db->group_end();
        }
        // SORT HARGA
        if ($sort == 'harga_terendah') {

            $this->db->order_by('harga', 'ASC');
        } elseif ($sort == 'harga_tertinggi') {

            $this->db->order_by('harga', 'DESC');
        }

        $data['laptop'] = $this->db->get()->result_array();




        $this->load->view('templates_user/header');
        $this->load->view('templates_user/navbar');
        $this->load->view('user/daftar-laptop', $data);
        $this->load->view('templates_user/footer');
    }

    public function detail($id)
    {
        $data['laptop'] = $this->laptop_models->getLaptopById($id);
    }
}
