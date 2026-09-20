<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cari_rekomendasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        if (!$this->session->userdata('username')) {

            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger">Anda belum login.</div>'
            );

            redirect('auth');
        }
    }

    public function index()
    {
        $this->load->view('templates_user/header');
        $this->load->view('templates_user/navbar');
        $this->load->view('user/cari-rekomendasi');
        $this->load->view('templates_user/footer');
    }

    public function hasil()
    {
        // INPUT USER
        $harga     = (int) $this->input->post('harga');
        $processor = (int) $this->input->post('processor');
        $ram       = (int) $this->input->post('ram');
        $ssd       = (int) $this->input->post('ssd');
        $berat     = (int) $this->input->post('berat');
        $baterai   = (int) $this->input->post('baterai');

        $this->session->set_userdata('filter_laptop', [
            'harga'     => $harga,
            'processor' => $processor,
            'ram'       => $ram,
            'ssd'       => $ssd,
            'berat'     => $berat,
            'baterai'   => $baterai
        ]);

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

        // MIN MAX
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

        // HASIL HITUNG
        $hasil = [];

        foreach ($laptop as $l) {


            // FILTER HARGA
            if (!empty($harga) && $l['harga_saw'] != $harga) {
                continue;
            }

            // FILTER BERAT
            if (!empty($berat) && $l['berat_saw'] < $berat) {
                continue;
            }

            // DATA NORMALISASI
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
                'gambar'      => $l['gambar'],
                'nilai_akhir' => round($nilai_akhir, 2),
                'normalisasi' => $nilai,
                'bobot'       => $bobot
            ];
        }

        // SORT
        usort($hasil, function ($a, $b) {
            return $b['nilai_akhir'] <=> $a['nilai_akhir'];
        });

        // TOP 5
        $top5 = array_slice($hasil, 0, 5);

        // SIMPAN PERHITUNGAN
        $this->db->insert('perhitungan', [
            'tanggal' => date('Y-m-d H:i:s'),

        ]);

        $id_perhitungan = $this->db->insert_id();

        // SIMPAN DETAIL + NORMALISASI
        foreach ($top5 as $h) {

            $this->db->insert('detail_perhitungan', [
                'id_perhitungan' => $id_perhitungan,
                'id_laptop'      => $h['id_laptop'],
                'skor_akhir'     => $h['nilai_akhir'],
                'id_user'        => $this->session->userdata('id')
            ]);

            $id_detail = $this->db->insert_id();

            foreach ($h['normalisasi'] as $key => $n) {

                $this->db->insert('normalisasi', [
                    'id_detail'   => $id_detail,
                    'kriteria'    => $key,
                    'normalisasi' => $n,
                    'utilities'   => $n * $bobot[$key]
                ]);
            }
        }

        // VIEW
        $data['hasil'] = $top5;

        $this->load->view('templates_user/header');
        $this->load->view('templates_user/navbar');
        $this->load->view('user/hasil-rekomendasi', $data);
        $this->load->view('templates_user/footer');
    }
}
