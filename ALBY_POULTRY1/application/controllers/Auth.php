<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->library(['form_validation', 'email', 'session']);
	// 	$this->load->helper(['form', 'security']);
	// }
	function state(){
		$country_id = $this->input->post('count_id');
		$data['provinsi'] = $this->model_app->view_where_ordering('rb_state',array('country_id' => $country_id),'state_id','DESC');
		$this->load->view('phpmu-one/view_state',$data);
	}

	function city(){
		$state_id = $this->input->post('stat_id');
		$data['kota'] = $this->model_app->view_where_ordering('rb_city',array('state_id' => $state_id),'city_id','DESC');
		$this->load->view('phpmu-one/view_city',$data);
	}

	public function register(){

		
		if (isset($_POST['submit'])){
			
			$this->form_validation->set_rules('c', 'name', 'required|trim');
			$this->form_validation->set_rules('j', 'no telepon/hp', 'required|trim|min_length[10]',['min_length' => 'Karakter minimal 10 digit']);
			$this->form_validation->set_rules('e', 'alamat', 'required|trim');
			$this->form_validation->set_rules('h', 'kota', 'required|trim');
			$this->form_validation->set_rules('a', 'username', 'required|trim|is_unique[rb_konsumen.username]',['is_unique' => 'Username ini sudah digunakan! Masukan username lainnya']);
			$this->form_validation->set_rules('b', 'password', 'required|trim');
			$this->form_validation->set_rules('email','email','required|trim|valid_email|is_unique[rb_konsumen.email]',['is_unique' => 'Email ini sudah digunakan! Masukan email lainnya']);
			
			// $cek  = $this->model_app->view_where('rb_konsumen',array('username'=>$this->input->post('a')))->num_rows();
			// $cek_email  = $this->model_app->view_where('rb_konsumen',array('email'=>$this->input->post('email')))->num_rows();
			// if ($cek >= 1){
			// 	$username = $this->input->post('a', 'true');
			// 	$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			// 	Username sudah dipakai orang lain. Silahkan gunakan username yang lain!</div>');
			// 	redirect('auth/register');
			// 	echo "<script>window.alert('Maaf, Username $username sudah dipakai oleh orang lain!');
			// 					  window.location=('".base_url()."/auth/register')</script>";
			// }
			// if ($cek_email >= 1){
			// 	$email = $this->input->post('email', 'true');
			// 	$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			// 	Email sudah dipakai orang lain. Silahkan gunakan email yang lain!</div>');
			// 	redirect('auth/register');
			// 	echo "<script>window.alert('Maaf, Email $email sudah dipakai oleh orang lain!');
			// 					  window.location=('".base_url()."/auth/register')</script>";				  
			// }else{
			// 	$route = array('administrator','agenda','auth','berita','contact','download','gallery','konfirmasi','main','members','page','produk','reseller','testimoni','video');
			// 	if (in_array($this->input->post('a'), $route)){
			// 		$username = $this->input->post('a', 'true');
			// 		echo "<script>window.alert('Maaf, Username $username sudah dipakai oleh orang lain!');
			// 						  window.location=('".base_url()."/".$this->input->post('i')."')</script>";
			// 	}				  
			// 	if (in_array($this->input->post('email'), $route)){
			// 		$email = $this->input->post('email', 'true');
			// 		echo "<script>window.alert('Maaf, Email $email sudah dipakai oleh orang lain!');
	        //                           window.location=('".base_url()."/".$this->input->post('i')."')</script>";
			// 	}else{


			if ($this->form_validation->run() == false) {
				$data['title'] = 'Formulir Pendaftaran';
				$data['kota'] = $this->model_app->view_ordering('rb_kota','kota_id','ASC');
				$this->template->load('phpmu-one/template','phpmu-one/view_register',$data);
			} else {

			$data = array('username'=>htmlspecialchars($this->input->post('a')),
	        			  'password'=>hash("sha512", md5($this->input->post('b'))),
	        			  'nama_lengkap'=>htmlspecialchars($this->input->post('c')),
	        			  'email'=>htmlspecialchars($this->input->post('email')),
	        			  'alamat_lengkap'=>htmlspecialchars($this->input->post('e')),
	        			  'kota_id'=>$this->input->post('h'),
						  'no_hp'=>htmlspecialchars($this->input->post('j')),
						  'is_active' => 0,
						  'tanggal_daftar'=>date('Y-m-d H:i:s'));

			// Siapkan token
			$email = $this->input->post('email', 'true');
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
				'tanggal_daftar'=>date('Y-m-d H:i:s')
			];

			$this->model_app->insert('rb_konsumen',$data);
			// $id = $this->db->insert_id();
			// $this->session->set_userdata(array('id_konsumen'=>$id, 'level'=>'konsumen'));

			$this->db->insert('token', $user_token);
            $this->_sendEmail($token, 'verify');
			
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akun Anda berhasil dibuat. Silahkan lakukan verifikasi akun pada email Anda untuk login!</div>');
            redirect('auth/login');
				

		// }elseif (isset($_POST['submit2'])){
		// 	$cek  = $this->model_app->view_where('rb_reseller',array('username'=>$this->input->post('a')))->num_rows();
		// 	if ($cek >= 1){
		// 		$username = $this->input->post('a');
		// 		echo "<script>window.alert('Maaf, Username $username sudah dipakai oleh orang lain!');
        //                           window.location=('".base_url()."/auth/register')</script>";
		// 	}else{
		// 		$route = array('administrator','agenda','auth','berita','contact','download','gallery','konfirmasi','main','members','page','produk','reseller','testimoni','video');
		// 		if (in_array($this->input->post('a'), $route)){
		// 			$username = $this->input->post('a');
		// 			echo "<script>window.alert('Maaf, Username $username sudah dipakai oleh orang lain!');
	    //                               window.location=('".base_url()."/".$this->input->post('i')."')</script>";
		// 		}else{
		// 		$data = array('username'=>$this->input->post('a'),
		//         			  'password'=>hash("sha512", md5($this->input->post('b'))),
		//         			  'nama_reseller'=>$this->input->post('c'),
		//         			  'jenis_kelamin'=>$this->input->post('d'),
		//         			  'alamat_lengkap'=>$this->input->post('e'),
		//         			  'no_telpon'=>$this->input->post('f'),
		// 					  'email'=>$this->input->post('g'),
		// 					  'kode_pos'=>$this->input->post('h'),
		// 					  'referral'=>$this->input->post('i'),
		// 					  'tanggal_daftar'=>date('Y-m-d H:i:s'));
		// 		$this->model_app->insert('rb_reseller',$data);
		// 		$id = $this->db->insert_id();
		// 		$this->session->set_userdata(array('id_reseller'=>$id, 'level'=>'reseller'));
		// 		redirect('reseller/home');
			//	}
			}
		}else{
			$data['title'] = 'Formulir Pendaftaran';
			$data['kota'] = $this->model_app->view_ordering('rb_kota','kota_id','ASC');
			$this->template->load('phpmu-one/template','phpmu-one/view_register',$data);
		}
	}

	public function login()
	{
		if (isset($_POST['login']))
		{
				$username = strip_tags($this->input->post('a'));
				$password = hash("sha512", md5(strip_tags($this->input->post('b'))));
				$konsumen =  $this->db->get_where('rb_konsumen', ['username' => $username]);
				$row = $konsumen->row_array();
			    $total = $konsumen->num_rows();

				//$cek = $this->db->query("SELECT * FROM rb_konsumen where username='".$this->db->escape_str($username)."' AND email='".$this->db->escape_str($username)."' AND password='".$this->db->escape_str($password)."'");

				// $cek = $this->db->query("SELECT * FROM rb_konsumen where username='".$this->db->escape_str($username)."' AND password='".$this->db->escape_str($password)."'");
			    // $row = $cek->row_array();
			    // $total = $cek->num_rows();
				// if ($total > 0){
				// 	$this->session->set_userdata(array('id_konsumen'=>$row['id_konsumen'], 'level'=>'konsumen'));
				// 	redirect('members/profile');
				// }else{
				// 	$data['title'] = 'Gagal Login';
				// 	$this->template->load('phpmu-one/template','phpmu-one/view_login',$data);
				// 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				// 	Password has been changed. Please login!</div>');
				// 	redirect('auth/login');
				// }


				//jika konsumennya ada
				if($row >0)
				{
					if($row['is_active'] == 1)
					{
						//cek password
						if($row['password']==$password)
						{
							$data_session = 
							[
								'id_konsumen' => $row['id_konsumen'],
								'level'=>'konsumen'
							];
							$this->session->set_userdata($data_session);
							redirect('members/profile');
						} else {
								$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
								Wrong password!</div>');
								redirect('auth/login');
							   }
					}else{
						  $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
						  Email Anda belum aktif. Silahkan cek email Anda untuk melakukan verfikasi akun!</div>');
						  redirect('auth/login');
						}
				} else {
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
						Username Anda Salah! Silahkan periksa kembali..</div>');
						redirect('auth/login');
					   }
		} else{
				$data['title'] = 'User Login';
				$this->template->load('phpmu-one/template','phpmu-one/view_login',$data);
			  }
	}

	public function lupass(){
		if (isset($_POST['lupa'])){
			$email = strip_tags($this->input->post('a'));
			$cek = $this->db->query("SELECT * FROM rb_konsumen where email='".$this->db->escape_str($email)."'");
		    $row = $cek->row_array();
		    $total = $cek->num_rows();
			if ($total > 0){
				$identitas = $this->db->query("SELECT * FROM identitas where id_identitas='1'")->row_array();
				$randompass = generateRandomString(10);
				$passwordbaru = hash("sha512", md5($randompass));
				$this->db->query("UPDATE rb_konsumen SET password='$passwordbaru' where email='".$this->db->escape_str($email)."'");

				if ($row['jenis_kelamin']=='Laki-laki'){ $panggill = 'Bpk.'; }else{ $panggill = 'Ibuk.'; }
				$email_tujuan = $row['email'];
				$tglaktif = date("d-m-Y H:i:s");
				$subject      = 'Permintaan Reset Password ...';
				$message      = "<html><body>Halooo! <b>$panggill ".$row['nama_lengkap']."</b> ... <br> Hari ini pada tanggal <span style='color:red'>$tglaktif</span> Anda Mengirimkan Permintaan untuk Reset Password
					<table style='width:100%; margin-left:25px'>
		   				<tr><td style='background:#336699; color:#fff; pading:20px' cellpadding=6 colspan='2'><b>Berikut Data Informasi akun Anda : </b></td></tr>
						<tr><td><b>Nama Lengkap</b></td>			<td> : ".$row['nama_lengkap']."</td></tr>
						<tr><td><b>Alamat Email</b></td>			<td> : ".$row['email']."</td></tr>
						<tr><td><b>No Telpon</b></td>				<td> : ".$row['no_hp']."</td></tr>
						<tr><td><b>Jenis Kelamin</b></td>			<td> : ".$row['jenis_kelamin']." </td></tr>
						<tr><td><b>Tempat Lahir</b></td>			<td> : ".$row['tempat_lahir']." </td></tr>
						<tr><td><b>Tanggal Lahir</b></td>			<td> : ".$row['tanggal_lahir']." </td></tr>
						<tr><td><b>Alamat Lengkap</b></td>			<td> : ".$row['alamat_lengkap']." </td></tr>
						<tr><td><b>Waktu Daftar</b></td>			<td> : ".$row['tanggal_daftar']."</td></tr>
					</table>
					<br> Username Login : <b style='color:red'>$row[username]</b>
					<br> Password Login : <b style='color:red'>$randompass</b>
					<br> Silahkan Login di : <a href='$identitas[url]'>$identitas[url]</a> <br>
					Admin, $identitas[nama_website] </body></html> \n";
				
				$this->email->from($identitas['email'], $identitas['nama_website']);
				$this->email->to($email_tujuan);
				$this->email->cc('');
				$this->email->bcc('');

				$this->email->subject($subject);
				$this->email->message($message);
				$this->email->set_mailtype("html");
				$this->email->send();
				
				$config['protocol'] = 'sendmail';
				$config['mailpath'] = '/usr/sbin/sendmail';
				$config['charset'] = 'utf-8';
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';
				$this->email->initialize($config);

				$data['email'] = $email;
				$data['title'] = 'Permintaan Reset Password Sudah Terkirim...';
				$this->template->load('phpmu-one/template','phpmu-one/view_lupass_success',$data);
			}else{
				$data['email'] = $email;
				$data['title'] = 'Email Tidak Ditemukan...';
				$this->template->load('phpmu-one/template','phpmu-one/view_lupass_error',$data);
			}
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
        
        $user = $this->db->get_where('rb_konsumen' , ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('token' , ['token' => $token])->row_array();

            if ($user_token) {
               if (date('Y-m-d H:i:s') - $user_token['tanggal_daftar'] < (60*60*24)) {
                   
                    $this->db->set('is_active' , 1);
                    $this->db->where('email' ,$email);   
                    $this->db->update('rb_konsumen');

                    $this->db->delete('token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">'
                    . $email .' sudah aktif. Silahkan login!
                    </div>');
                    redirect('auth/login');

               }else{
                   
                   $this->db->delete('rb_konsumen', ['email' => $email]);
                   $this->db->delete('token', ['email' => $email]);


                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Aktivasi akun gagal! Token kadaluwarsa
                    </div>');
                    redirect('auth/login');
               }
            }else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Aktivasi akun gagal! Token salah
                </div>');
                redirect('auth/login');
            }
        }else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Aktivasi akun gagal! Email salah
            </div>');
            redirect('auth/login');
        }
    
	}	
	

	public function resetPassword()
    {
       
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        
        $user = $this->db->get_where('rb_konsumen' , ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('token' , ['token' => $token])->row_array();

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
        $this->form_validation->set_rules('password1', 'password', 'trim|required|min_length[4]|matches[password2]', 
        [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2', 'repeat password', 'trim|required|min_length[3]|matches[password1]');
        if($this->form_validation->run() == false)
        {
			$data['title'] = 'Ubah Password';
			$this->template->load('phpmu-one/template','phpmu-one/view_change-password',$data);
        } else {
            $password = hash("sha512", md5($this->input->post('password1')));
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('rb_konsumen');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Password has been changed. Please login!</div>');
            redirect('auth/login'); 
        }
    }




	public function forgotPass()
    {
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        if($this->form_validation->run() == false)
        {
			$data['title'] = 'User Login';
			$this->template->load('phpmu-one/template','phpmu-one/view_forgot-password',$data);
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('rb_konsumen', ['email' => $email, 'is_active' => 1])->row_array();

            if($user) 
            {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'tanggal_daftar'=>date('Y-m-d H:i:s')
                ];

                $this->db->insert('token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Silahkan cek email Anda untuk melakukan reset ulang password!</div>');
                redirect('auth/forgotPass');

            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email ini tidak terdaftar atau belum diaktivasi!</div>');
                redirect('auth/forgotPass');
            }
        }
    }
}
