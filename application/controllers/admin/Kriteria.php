<?php

class Kriteria extends CI_Controller
{
    public function index()
    {
        $data['kriteria'] = $this->kriteria_models->getAllKriteria();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar');
        $this->load->view('admin/kriteria/index', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah()
    {

        $this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'required|trim', [
            'required' => 'Nama kriteria wajib diisi.'
        ]);
        $this->form_validation->set_rules('bobot', 'Bobot', 'required|numeric|greater_than_equal_to[0]', [
            'required' => 'Bobot wajib diisi.',
            'numeric' => 'Bobot harus berupa angka.',
            'greater_than_equal_to' => 'Bobot tidak boleh kurang dari 0.'
        ]);
        $this->form_validation->set_rules('atribut', 'Atribut', 'required', [
            'required' => 'Atribut wajib diisi.'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('templates_admin/topbar');
            $this->load->view('admin/kriteria/tambah');
            $this->load->view('templates_admin/footer');
        } else {
            $this->kriteria_models->tambahDataKriteria();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Kriteria berhasil ditambahkan.', '</div>');
            redirect('admin/kriteria');
        }
    }

    public function hapus($id)
    {
        $this->kriteria_models->hapusDataKriteria($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Kriteria berhasil dihapus.', '</div>');
        redirect('admin/kriteria');
    }

    public function edit($id)
    {
        $data['kriteria'] = $this->kriteria_models->getKriteriaById($id);
        $this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'required|trim', [
            'required' => 'Nama kriteria wajib diisi.'
        ]);
        $this->form_validation->set_rules('bobot', 'Bobot', 'required|numeric|greater_than_equal_to[0]', [
            'required' => 'Bobot wajib diisi.',
            'numeric' => 'Bobot harus berupa angka.',
            'greater_than_equal_to' => 'Bobot tidak boleh kurang dari 0.'
        ]);
        $this->form_validation->set_rules('atribut', 'Atribut', 'required', [
            'required' => 'Atribut wajib diisi.'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates_admin/header');
            $this->load->view('templates_admin/sidebar');
            $this->load->view('templates_admin/topbar');
            $this->load->view('admin/kriteria/edit', $data);
            $this->load->view('templates_admin/footer');
        } else {
            $this->kriteria_models->editDataKriteria($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Kriteria berhasil diedit.', '</div>');
            redirect('admin/kriteria');
        }
    }
}
