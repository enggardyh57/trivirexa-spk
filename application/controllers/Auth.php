<?php

class Auth extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username wajib diisi.',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|max_length[6]', [
            'required' => 'Password wajib diisi.',
            'min_length' => 'Password minimal 3 karakter',
            'max_length' => 'Password maksimal 6 karakter'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'TRIVIREXA Login';
            $this->load->view('templates_user/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates_user/auth_footer');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $username = htmlspecialchars($this->input->post('username', true));
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['username' => $username])->row_array();

        // cek user ada atau tidak
        if ($user) {

            // cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'id'  => $user['id'],
                    'username' => $user['username'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                if ($user['role_id'] == 1) {
                    redirect('admin/laptop');
                } else {
                    redirect('home');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
             Wrong password.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
              User belum ada, silahkan daftar</div>');
            redirect('auth');
        }
    }

    public function daftar()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]', [
            'required' => 'Username wajib diisi.',
            'is_unique' => 'Username sudah terdaftar'
        ]);
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama lengkap wajib diisi.',
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|max_length[6]|matches[password2]', [
            'required'   => 'Password wajib diisi.',
            'min_length' => 'Password minimal 3 karakter',
            'max_length' => 'Password max 6 karakter',
            'matches'    => 'Password tidak sama'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|max_length[6]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'TRIVIREXA Daftar Akun';
            $this->load->view('templates_user/auth_header', $data);
            $this->load->view('auth/daftar');
            $this->load->view('templates_user/auth_footer');
        } else {

            $this->auth_models->daftarAkun();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
               Selamat akun telah berhasil didaftarkan.</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
             Anda telah berhasil logout.</div>');
        redirect('auth');
    }
}
