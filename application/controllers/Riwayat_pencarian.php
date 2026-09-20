<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat_pencarian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');
        $this->load->database();
    }

    public function index()
    {
        $id_user = $this->session->userdata('id');

        // Hitung total data user
        $this->db->from('detail_perhitungan');
        $this->db->where('id_user', $id_user);
        $total_rows = $this->db->count_all_results();

        // Config pagination
        $config['base_url'] = base_url('riwayat_pencarian/index');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;

        // Bootstrap Pagination
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'Pertama';
        $config['last_link'] = 'Terakhir';
        $config['next_link'] = 'Selanjutnya';
        $config['prev_link'] = 'Sebelumnya';

        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = ['class' => 'page-link'];

        $this->pagination->initialize($config);

        // Offset
        $start = $this->uri->segment(3, 0);

        // Ambil data sesuai halaman
        $data['perhitungan'] = $this->db
            ->select('
                detail_perhitungan.*,
                laptop.nama_laptop,
                perhitungan.tanggal
            ')
            ->from('detail_perhitungan')
            ->join('laptop', 'laptop.id = detail_perhitungan.id_laptop')
            ->join('perhitungan', 'perhitungan.id = detail_perhitungan.id_perhitungan')
            ->where('detail_perhitungan.id_user', $id_user)
            ->order_by('detail_perhitungan.skor_akhir', 'DESC')
            ->limit($config['per_page'], $start)
            ->get()
            ->result_array();

        $data['start'] = $start;
        $data['total_rows'] = $total_rows;

        $this->load->view('templates_user/header');
        $this->load->view('templates_user/navbar');
        $this->load->view('user/riwayat-pencarian', $data);
        $this->load->view('templates_user/footer');
    }
}