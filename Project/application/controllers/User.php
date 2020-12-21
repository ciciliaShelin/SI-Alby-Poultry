<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model', 'produk');
        
    }


    public function index()
    {
        $data['title'] = 'My Profile';
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Alby Pultry';

            $this->load->view('templates/shop_header', $data);
            $this->load->view('shop/banner');
            $this->load->view('templates/shop_sidebar');
            $this->load->view('shop/produk');
            $this->load->view('templates/shop_footer');
        } else {
            redirect('auth/login');
        }
    }

    public function akun()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/shop_header', $data);
            // $this->load->view('shop/banner'); 
            $this->load->view('templates/shop_sidebar');
            $this->load->view('user/akun', $data);
            $this->load->view('templates/shop_footer');
    }

    public function edit_user()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full name', 'required|trim');

        if($this->form_validation->run()== false)
        {
            $this->load->view('templates/shop_header', $data);
            $this->load->view('templates/shop_sidebar', $data);
            $this->load->view('user/akun', $data);
            $this->load->view('templates/shop_footer');
        }else
            {
                $name = $this->input->post('name');
                $email = $this->input->post('email');
                $jk = $this->input->post('jenis_kelamin');
                $no_tlp = $this->input->post('no_tlp');
                $alamat = $this->input->post('alamat');
                //cek jika ada gambar yang akan diupload
                $upload_image= $_FILES['image'] ['name'];

                if($upload_image) {
                    $config['allowed_types'] = 'jpg|png|gif|jpeg';
                    $config['max_size'] = '2048';
                    $config['overwrite'] = true;
                    $config['upload_path'] = './uploads/profile/';
                    $this->load->library('upload', $config);


                    if($this->upload->do_upload('image')) {
                        $data = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                        $old_image= $data['image'];
                        if($old_image != 'default.jpg') {
                            unlink(FCPATH. 'uploads/profile/' . $old_image);
                        }
                        $new_image= $this->upload->data('file_name');
                        $this->db->set('image', $new_image);
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'
                        . $this->upload->display_errors().
                        '</div>');
                        redirect('user/akun');
                    }
                }
                $this->db->set('name', $name);
                $this->db->set('jenis_kelamin', $jk);
                $this->db->set('no_tlp', $no_tlp);
                $this->db->set('alamat', $alamat);
                $this->db->where('email', $email);
                $this->db->update('user');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Your account has been updated!</div>');
                redirect('user/akun');
            }


    }

    public function change_password()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if($this->form_validation->run() == false) 
        {
            $this->load->view('templates/shop_header', $data);
            $this->load->view('templates/shop_sidebar');
            $this->load->view('user/changePassword', $data);
            $this->load->view('templates/shop_footer');
        } else
            {
                $current_password = $this->input->post('current_password');
                $new_password = $this->input->post('new_password1');
                if (!password_verify($current_password, $data['user']['password'])) 
                    {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Your current password is wrong!</div>');
                        redirect('user/change_password'); 
                    } else
                        {
                            if ($current_password == $new_password) 
                                {
                                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                    New password cannot be the same as current password!</div>');
                                    redirect('user/change_password'); 
                                } else
                                    {
                                        //password sudah benar
                                        $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                                        $this->db->set('password', $password_hash);
                                        $this->db->where('email', $this->session->userdata('email'));
                                        $this->db->update('user');

                                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                        Your Password Changed!</div>');
                                        redirect('user/akun');
                                    }
                        }
            }
    }
}