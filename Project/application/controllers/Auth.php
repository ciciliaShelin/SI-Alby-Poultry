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
                        Email Anda belum aktif. Silahkan cek email Anda untuk melakukan verfikasi akun!</div>');
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

            $email = $this->input->post('email', 'true');
            $data = [
                'name' => htmlspecialchars($this->input->post('name', 'true')),
                'email' => htmlspecialchars($email),
                'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', 'true')),
                'no_tlp' => htmlspecialchars($this->input->post('no_tlp', 'true')),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'image' => 'default.jpg',
                'role_id' => 2,
                'is_active' => 0,
                'date_creater' => time()
            ];
            // Siapkan token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];


            $this->db->insert('user', $data);
            $this->db->insert('token_user', $user_token);

            $this->_sendEmail($token, 'verify');


            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akun Anda berhasil dibuat. Silahkan lakukan verifikasi akun pada email Anda untuk login!</div>');
            redirect('auth/login');
        } 

    } 

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'mazinoke25@gmail.com',
            'smtp_pass' => 'bamke-25',
            // 'smtp_timeout' => '4',
            // 'smtp_crypto' => 'security',
            'smtp_port' =>  465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->email->initialize($config);
        // $this->load->library('email', $config);
        // $this->email->set_crlf( "\r\n" );

        $this->email->from('mazinoke25@gmail.com', 'Alby Poultry');
        $this->email->to($this->input->post('email'));

        if($type == 'verify')
        {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to veirfy your account : 
            <a href="'.base_url() . 'auth/verify?email=' . $this->input->post('email'). '&token=' .urlencode($token) . '">Activate</a>');
        } elseif($type == 'forgot') 
            {
                $this->email->subject('Reset Password');
                $this->email->message('Click this link to reset your password : 
                <a href="'.base_url() . 'auth/resetPassword?email=' . $this->input->post('email'). '&token=' .urlencode($token) . '">Reset Password</a>');
            }


        if($this->email->send())
        {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {

        $email = $this->input->get('email');
        $token = $this->input->get('token');
        
        $user = $this->db->get_where('user' , ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('token_user' , ['token' => $token])->row_array();

            if ($user_token) {
               if (time() - $user_token['date_created'] < (60*60*24)) {
                   
                    $this->db->set('is_active' , 1);
                    $this->db->where('email' ,$email);   
                    $this->db->update('user');

                    $this->db->delete('token_user', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">'
                    . $email .' sudah aktif. Silahkan login!
                    </div>');
                    redirect('auth/login');

               }else{
                   
                   $this->db->delete('user', ['email' => $email]);
                   $this->db->delete('token_user', ['email' => $email]);


                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Account Activation failed! Token Expired
                    </div>');
                    redirect('auth/login');
               }
            }else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Account Activation failed! Wrong Token
                </div>');
                redirect('auth/login');
            }
        }else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Account Activation failed! Wrong Email
            </div>');
            redirect('auth/login');
        }
    
    }


    public function resetPassword()
    {
       
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        
        $user = $this->db->get_where('user' , ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('token_user' , ['token' => $token])->row_array();

            if ($user_token) {
               $this->session->set_userdata('reset_email', $email);
               $this->changepassword();
            }else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Reset password failed! Wrong Token!
                </div>');
                redirect('auth/login');
            }
        }else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Reset password failed! Wrong Email!
            </div>');
            redirect('auth/login');
        }
    
    }


    public function changepassword()
    {
        if(!$this->session->userdata('reset_email') )
        {
            redirect('auth/login');
        }
        $this->form_validation->set_rules('password1', 'password', 'trim|required|min_length[3]|matches[password2]', 
        [
            'matches' => 'Password Dont Match!',
            'min_length' => 'Password too short'
        ]);
        $this->form_validation->set_rules('password2', 'repeat password', 'trim|required|min_length[3]|matches[password1]');
        if($this->form_validation->run() == false)
        {
            $data['title'] = 'Change Password';
            $this->load->view('templates/shop_header', $data);
            $this->load->view('templates/shop_sidebar', $data);
            $this->load->view('user/change-password', $data);
            $this->load->view('templates/shop_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Password has been changed. Please login!</div>');
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

    public function forgotPass()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if($this->form_validation->run() == false)
        {
            $data['title'] = 'Forgot Password';
            $this->load->view('templates/shop_header', $data);
            $this->load->view('templates/shop_sidebar', $data);
            $this->load->view('user/forgot-password', $data);
            $this->load->view('templates/shop_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if($user) 
            {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('token_user', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                please check your email to reset your password!</div>');
                redirect('auth/forgotPass');

            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email is not registered or activated!</div>');
                redirect('auth/forgotPass');
            }
        }
    }


}
