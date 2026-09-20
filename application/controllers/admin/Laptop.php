<?php



class Laptop extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (! $this->session->userdata('username')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
             Anda belum login.</div>');
            redirect('auth');
        }
    }
    public function index()
    {


        // Config
        $config['base_url'] = base_url('admin/laptop/index');

        $this->db->from('laptop');
        $config['total_rows'] = $this->db->count_all_results();

        $config['per_page'] = 10;

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


        $data['start'] = $this->uri->segment(4);


        $data['laptop'] = $this->laptop_models->getLaptop(
            $config['per_page'],
            $data['start']
        );

        $data['total_rows'] = $config['total_rows'];

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar');
        $this->load->view('admin/laptop/index', $data);
        $this->load->view('templates_admin/footer');
    }


    public function tambah()
    {
        $data['laptop'] = $this->laptop_models->getAllLaptop();
        $this->form_validation->set_rules('nama_laptop', 'Nama Laptop', 'required|trim', [
            'required' => 'Nama laptop wajib diisi.',
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric|greater_than[0]', [
            'required' => 'Harga wajib diisi.',
            'numeric' => 'Harga harus berupa angka.',
            'greater_than' => 'Harga harus lebih dari 0.'
        ]);
        $this->form_validation->set_rules('processor', 'Processor', 'required|trim', [
            'required' => 'Procesor wajib diisi.'
        ]);
        $this->form_validation->set_rules('ram', 'RAM', 'required|numeric|greater_than[0]', [
            'required' => 'Harga wajib diisi.',
            'numeric' => 'Harga harus berupa angka.',
            'greater_than' => 'Harga harus lebih dari 0.'
        ]);
        $this->form_validation->set_rules('ssd', 'SSD', 'required|numeric|greater_than[0]', [
            'required' => 'Harga wajib diisi.',
            'numeric' => 'Harga harus berupa angka.',
            'greater_than' => 'Harga harus lebih dari 0.'
        ]);
        $this->form_validation->set_rules('baterai', 'Baterai', 'required|numeric|greater_than[0]', [
            'required' => 'Harga wajib diisi.',
            'numeric' => 'Harga harus berupa angka.',
            'greater_than' => 'Harga harus lebih dari 0.'
        ]);
        $this->form_validation->set_rules('berat', 'Berat', 'required|numeric|greater_than[0]', [
            'required' => 'Harga wajib diisi.',
            'numeric' => 'Harga harus berupa angka.',
            'greater_than' => 'Harga harus lebih dari 0.'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('templates_admin/topbar');
            $this->load->view('admin/laptop/tambah', $data);
            $this->load->view('templates_admin/footer');
        } else {
            $config['upload_path']   = './assets/img/laptop/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['max_size']      = 2048;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {

                $error = strip_tags($this->upload->display_errors());

                if (strpos($error, 'You did not select a file to upload') !== false) {
                    $data['error_gambar'] = 'Gambar wajib diunggah.';
                } elseif (strpos($error, 'The filetype you are attempting to upload is not allowed') !== false) {
                    $data['error_gambar'] = 'Format gambar tidak didukung. Gunakan JPG, JPEG, PNG, atau WEBP.';
                } elseif (strpos($error, 'The file you are attempting to upload is larger than the permitted size') !== false) {
                    $data['error_gambar'] = 'Ukuran gambar maksimal 2 MB.';
                } else {
                    $data['error_gambar'] = 'Gagal mengunggah gambar.';
                }

                $this->load->view('templates_admin/header');
                $this->load->view('templates_admin/sidebar');
                $this->load->view('templates_admin/topbar');
                $this->load->view('admin/laptop/tambah', $data);
                $this->load->view('templates_admin/footer');
            } else {
                $upload = $this->upload->data();

                $this->laptop_models->tambahDataLaptop($upload['file_name']);

                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success" role="alert">Data Laptop berhasil ditambahkan.</div>'
                );

                redirect('admin/laptop');
            }
        }
    }

    public function hapus($id)
    {
        $this->laptop_models->hapusDataLaptop($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Laptop berhasil dihapus.', '</div>');
        redirect('admin/laptop');
    }

    public function edit($id)
    {
        $data['laptop'] = $this->laptop_models->getLaptopById($id);
        $this->form_validation->set_rules('nama_laptop', 'Nama Laptop', 'required|trim', [
            'required' => 'Nama laptop wajib diisi.',
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric|greater_than[0]', [
            'required' => 'Harga wajib diisi.',
            'numeric' => 'Harga harus berupa angka.',
            'greater_than' => 'Harga harus lebih dari 0.'
        ]);
        $this->form_validation->set_rules('processor', 'Processor', 'required|trim', [
            'required' => 'Procesor wajib diisi.'
        ]);
        $this->form_validation->set_rules('ram', 'RAM', 'required|numeric|greater_than[0]', [
            'required' => 'Harga wajib diisi.',
            'numeric' => 'Harga harus berupa angka.',
            'greater_than' => 'Harga harus lebih dari 0.'
        ]);
        $this->form_validation->set_rules('ssd', 'SSD', 'required|numeric|greater_than[0]', [
            'required' => 'Harga wajib diisi.',
            'numeric' => 'Harga harus berupa angka.',
            'greater_than' => 'Harga harus lebih dari 0.'
        ]);
        $this->form_validation->set_rules('baterai', 'Baterai', 'required|numeric|greater_than[0]', [
            'required' => 'Harga wajib diisi.',
            'numeric' => 'Harga harus berupa angka.',
            'greater_than' => 'Harga harus lebih dari 0.'
        ]);
        $this->form_validation->set_rules('berat', 'Berat', 'required|numeric|greater_than[0]', [
            'required' => 'Harga wajib diisi.',
            'numeric' => 'Harga harus berupa angka.',
            'greater_than' => 'Harga harus lebih dari 0.'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('templates_admin/topbar');
            $this->load->view('admin/laptop/edit', $data);
            $this->load->view('templates_admin/footer');
        } else {

            // gunakan gambar lama jika tidak upload baru
            $gambar = $data['laptop']['gambar'];
            if (!empty($_FILES['gambar']['name'])) {

                $config['upload_path']   = './assets/img/laptop/';
                $config['allowed_types'] = 'jpg|jpeg|png|webp';
                $config['max_size']      = 2048;


                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar')) {

                    $error = strip_tags($this->upload->display_errors());


                    if (strpos($error, 'You did not select a file to upload') !== false) {
                        $data['error_gambar'] = 'Gambar wajib diunggah.';
                    } elseif (strpos($error, 'The filetype you are attempting to upload is not allowed') !== false) {
                        $data['error_gambar'] = 'Format gambar tidak didukung. Gunakan JPG, JPEG, PNG, atau WEBP.';
                    } elseif (strpos($error, 'The file you are attempting to upload is larger than the permitted size') !== false) {
                        $data['error_gambar'] = 'Ukuran gambar maksimal 2 MB.';
                    } else {
                        $data['error_gambar'] = 'Gagal mengunggah gambar.';
                    }

                    $this->load->view('templates_admin/header');
                    $this->load->view('templates_admin/sidebar');
                    $this->load->view('templates_admin/topbar');
                    $this->load->view('admin/laptop/edit', $data);
                    $this->load->view('templates_admin/footer');
                    return;
                }

                // upload berhasil
                $upload = $this->upload->data();
                $gambar = $upload['file_name'];

                // hapus gambar lama
                if (!empty($data['laptop']['gambar']) && file_exists('./assets/img/laptop/' . $data['laptop']['gambar'])) {
                    unlink('./assets/img/laptop/' . $data['laptop']['gambar']);
                }
            }

            $this->laptop_models->editDataLaptop($id, $gambar);

            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success" role="alert">Data Laptop berhasil diedit.</div>'
            );

            redirect('admin/laptop');
        }
    }
}
