<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
        parent::__construct();

	}

	public function login(){
		$data['error']="";
		if($this->session->userdata('username'))
				redirect('Data/index');
		else
				$this->load->view('form_login',$data);
	}

	public function validate()
	{
			$this->load->model('auth_model');
			$login = $this->auth_model->login($this->input->post('email'), md5($this->input->post('password')));
			if($login==1)
			{
				//ambil detail data
				$row = $this->auth_model->data_login($this->input->post('email'), md5($this->input->post('password')));
				$data = array(
				        'logged'	 	=> TRUE,
				        'username' 	=> $row->username,
								'email' 		=> $row->email,
								'hak_akses' => $row->keterangan
				        );
				$this->session->set_userdata($data);
				$this->session->set_userdata('ci_session',$data);
				//redirect ke halaman sukses
				if($row->keterangan == 1)
					redirect('C_admin/admin');
				elseif ($row->keterangan == 2)
					redirect('C_kalangan_terbatas/kalangan_terbatas');
				else
					redirect('Data/index');
			}
			else {
				$data['error']="Email dan Password Tidak Sesuai";
				$this->load->view('form_login',$data);
//				echo "gagal";}
}

	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('data/index');
	}

/*
    public function index($error = NULL) {
        $data = array(
            //'title' => 'Login Page',
            //'action' => base_url('auth/login'),
						//'action' => 'auth/login',
            'error' => $error
        );
        $this->load->view('form_login', $data);
    }

    public function login() {
        $this->load->model('auth_model');
        $login = $this->auth_model->login($this->input->post('username'), ($this->input->post('password')));

        if ($login == 1) {
//          ambil detail data
            $row = $this->auth_model->data_login($this->input->post('username'), ($this->input->post('password')));

//          daftarkan session
            $data = array(
                'logged' => TRUE,
                'username' => $row->username
            );
            $this->session->set_userdata($data);

//            redirect ke halaman sukses
            redirect('Data/index');
            //header("location:192.168.175.128/harviacode/index.php/user");
        } else {
//            tampilkan pesan error
            $error = 'username / password salah';
            $this->index($error);
        }
    }

    function logout() {
//        destroy session
        $this->session->sess_destroy();

//        redirect ke halaman login
        redirect(site_url('auth'));
    }
*/
}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */
