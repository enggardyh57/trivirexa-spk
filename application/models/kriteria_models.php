<?php

class kriteria_models extends CI_Model
{
    public function getAllKriteria()
    {
        return $this->db->get('kriteria')->result_array();
    }
    public function tambahDataKriteria()
    {
        $data = [
            'nama_kriteria' => $this->input->post('nama_kriteria'),
            'bobot' => $this->input->post('bobot'),
            'atribut' => $this->input->post('atribut')
        ];
        $this->db->insert('kriteria', $data);
    }
    public function getKriteriaById($id)
    {
        return $this->db->get_where('kriteria', ['id' => $id])->row_array();
    }

    public function hapusDataKriteria($id)
    {
        $this->db->delete('kriteria', ['id' => $id]);
    }

    public function editDataKriteria($id)
    {
        $data = [
            'nama_kriteria' => $this->input->post('nama_kriteria'),
            'bobot' => $this->input->post('bobot'),
            'atribut' => $this->input->post('atribut')
        ];

        $this->db->where('id', $id);
        $this->db->update('kriteria', $data);
    }
}
