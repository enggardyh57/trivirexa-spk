<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perhitungan_saw extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        if (! $this->session->userdata('username')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
             Anda belum login.</div>');
            redirect('auth');
        }
    }

    public function index()
    {
        // DATA
        $laptop   = $this->laptop_models->getAllLaptop();
        $kriteria = $this->kriteria_models->getAllKriteria();

        // DEFAULT BOBOT
        $bobot = [
            'harga'     => 0,
            'processor' => 0,
            'ram'       => 0,
            'ssd'       => 0,
            'berat'     => 0,
            'baterai'   => 0
        ];

        // ATRIBUT
        $atribut = [
            'harga'     => 'cost',
            'processor' => 'benefit',
            'ram'       => 'benefit',
            'ssd'       => 'benefit',
            'berat'     => 'cost',
            'baterai'   => 'benefit'
        ];

        // AMBIL BOBOT DB
        foreach ($kriteria as $k) {
            $nama = strtolower(trim($k['nama_kriteria']));
            if (isset($bobot[$nama])) {
                $bobot[$nama] = $k['bobot'];
                $atribut[$nama] = strtolower($k['atribut']);
            }
        }

        // MIN MAX (dari SEMUA laptop, tanpa filter)
        $min = [
            'harga' => min(array_column($laptop, 'harga_saw')),
            'berat' => min(array_column($laptop, 'berat_saw'))
        ];

        $max = [
            'processor' => max(array_column($laptop, 'processor_saw')),
            'ram'       => max(array_column($laptop, 'ram_saw')),
            'ssd'       => max(array_column($laptop, 'ssd_saw')),
            'baterai'   => max(array_column($laptop, 'baterai_saw'))
        ];

        // HASIL HITUNG UNTUK SEMUA LAPTOP
        $hasil = [];

        foreach ($laptop as $l) {

            $data_laptop = [
                'harga'     => $l['harga_saw'],
                'processor' => $l['processor_saw'],
                'ram'       => $l['ram_saw'],
                'ssd'       => $l['ssd_saw'],
                'berat'     => $l['berat_saw'],
                'baterai'   => $l['baterai_saw']
            ];

            $nilai = [];
            $nilai_akhir = 0;

            foreach ($data_laptop as $key => $value) {

                if ($atribut[$key] == 'cost') {
                    $nilai[$key] = round($min[$key] / $value, 2);
                } else {
                    $nilai[$key] = round($value / $max[$key], 2);
                }

                $nilai_akhir += $nilai[$key] * $bobot[$key];
            }

            $hasil[] = [
                'id_laptop'   => $l['id'],
                'nama_laptop' => $l['nama_laptop'],
                'harga'       => $l['harga'],
                'processor'   => $l['processor'],
                'ram'         => $l['ram'],
                'ssd'         => $l['ssd'],
                'berat'       => $l['berat'],
                'baterai'     => $l['baterai'],
                'nilai_akhir' => round($nilai_akhir, 2),
                'normalisasi' => $nilai,
                'data_saw'    => $data_laptop
            ];
        }


        // Pagination
        $this->load->library('pagination');

        $config['base_url'] = base_url('admin/perhitungan_saw/index');
        $config['total_rows'] = count($hasil);
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;

        // Bootstrap Pagination
        $config['full_tag_open'] = '<nav aria-label="Page navigation"><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'Pertama';
        $config['last_link']  = 'Terakhir';
        $config['next_link']  = 'Selanjutnya';
        $config['prev_link']  = 'Sebelumnya';

        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = ['class' => 'page-link'];

        $this->pagination->initialize($config);

        $start = (int) $this->uri->segment(4, 0);

        // Potong array $hasil sesuai halaman aktif
        $hasil_paginated = array_slice($hasil, $start, $config['per_page']);

        // VIEW
        $data['hasil']       = $hasil_paginated;
        $data['hasil_full']  = $hasil;
        $data['bobot']   = $bobot;
        $data['atribut'] = $atribut;
        $data['min']     = $min;
        $data['max']     = $max;
        $data['start']      = $start;
        $data['total_rows'] = $config['total_rows'];


        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar');
        $this->load->view('admin/perhitungan-saw', $data);
        $this->load->view('templates_admin/footer');
    }
}
