<?php

class Dashboard extends CI_Controller
{
    public function index()
    {

        $data['total_laptop'] = $this->db->count_all('laptop');
        $data['total_kriteria'] = $this->db->count_all('kriteria');
        $data['total_user'] = $this->db->count_all('users');
        $data['total_perhitungan'] = $this->db->count_all('perhitungan');


        $this->db->select("
    CASE
        WHEN nama_laptop LIKE '%ASUS%' THEN 'ASUS'
        WHEN nama_laptop LIKE '%Acer%' THEN 'Acer'
        WHEN nama_laptop LIKE '%Lenovo%' THEN 'Lenovo'
        WHEN nama_laptop LIKE '%HP%' THEN 'HP'
        WHEN nama_laptop LIKE '%MSI%' THEN 'MSI'
        WHEN nama_laptop LIKE '%Dell%' THEN 'Dell'
        ELSE 'Lainnya'
    END as brand,
    COUNT(*) as total
");

        $this->db->from('laptop');

        $this->db->group_by('brand');

        $data['grafik_brand'] = $this->db->get()->result_array();


        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/topbar');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates_admin/footer');
    }
}
