<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat_perhitungan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Load library & model
        $this->load->library('pagination');
        $this->load->database();
    }

    public function index()
    {
        // Hitung total data
        $this->db->from('detail_perhitungan');
        $total_rows = $this->db->count_all_results();

        // Konfigurasi pagination
        $config['base_url'] = base_url('admin/riwayat_perhitungan/index');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 5;
        $config['uri_segment'] = 4;

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

        // Inisialisasi pagination
        $this->pagination->initialize($config);

        // Ambil offset
        $start = $this->uri->segment(4, 0);

        // Data utama perhitungan dengan limit pagination
        $data['perhitungan'] = $this->db
            ->select('
                detail_perhitungan.*,
                laptop.nama_laptop,
                perhitungan.tanggal,
                users.username
            ')
            ->from('detail_perhitungan')
            ->join('laptop', 'laptop.id = detail_perhitungan.id_laptop')
            ->join('perhitungan', 'perhitungan.id = detail_perhitungan.id_perhitungan')
            ->join('users', 'users.id = detail_perhitungan.id_user', 'left')
            ->order_by('detail_perhitungan.skor_akhir', 'DESC')
            ->limit($config['per_page'], $start)
            ->get()
            ->result_array();

        // Data tambahan
        $data['start'] = $start;
        $data['total_rows'] = $total_rows;

        // Load view
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar');
        $this->load->view('admin/riwayat-perhitungan', $data);
        $this->load->view('templates_admin/footer');
    }
}
