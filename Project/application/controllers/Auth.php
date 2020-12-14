<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }


    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/shop_header', $data);
            $this->load->view('templates/shop_sidebar');
            $this->load->view('auth/login_user');
            $this->load->view('templates/shop_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user =  $this->db->get_where('user', ['email' => $email])->row_array();

        //jika usernya ada
        if ($user) {
            //jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data_session = 
                        [
                            'email' => $user['email'],
                            'role_id' => $user['role_id']
                        ];

                    // $data_session = array('email' => $email, 'role' => $user['role_id']);
                    // $data['userr'] = $this->session->set_userdata($data_session);
                    $this->session->set_userdata($data_session);

                    if ($user['role_id'] == 1) {

                        redirect('admin');
                    } else {

                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                Wrong password!</div>');
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        This email has not been activated!</div>');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email is not registered!</div>');
            redirect('auth/login');
        }
    }


    public function registration()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user =  $this->db->get_where('user', ['email' => $email])->row_array();
        $data['user'] = $this->db->get('user')->result_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required|trim');
        $this->form_validation->set_rules('no_tlp', 'no_tlp', 'required|trim');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[user.email]',
            [
                'is_unique' => 'this email has already registered!'
            ]
        );
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[3]|matches[password2]',
            [
                'matches' => 'Password dont match!',
                'min_length' => 'Password to short!'
            ]
        );
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            // $data['title'] = 'User Registration';
            // $this->load->view('templates/auth_header', $data);
            // $this->load->view('auth/registration');
            // $this->load->view('templates/auth_footer');

            $data['title'] = 'User Registration';
            $this->load->view('templates/shop_header', $data);
            $this->load->view('templates/shop_sidebar', $data);
            $this->load->view('auth/registrasi_user', $data);
            $this->load->view('templates/shop_footer');
        } else {

            $data = [
                'name' => htmlspecialchars($this->input->post('name', 'true')),
                'email' => htmlspecialchars($this->input->post('email', 'true')),
                'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', 'true')),
                'no_tlp' => htmlspecialchars($this->input->post('no_tlp', 'true')),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'image' => 'default.jpg',
                'role_id' => 2,
                'is_active' => 1,
                'date_creater' => time()
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! Your account has been created. Please Login!</div>');
            redirect('auth/login');
        } 

    } 

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        You have been logged out!</div>');
        redirect('auth/login');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
