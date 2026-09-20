<?php

class auth_models extends CI_Model
{
    public function daftarAkun()
    {


        $data = [
            'username' => $this->input->post('username'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role_id' => 2,
        ];

        $this->db->insert('users', $data);
    }
}
