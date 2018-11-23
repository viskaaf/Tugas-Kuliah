<?php if(!defined('BASEPATH'))exit('No direct	script access allowed');	

class LoginC extends CI_Controller		
{	
	 public function __construct()	
	 {	
	 	 parent::__construct();	
	 	 // in_access();
	 	 $this->load->model('LoginM');	
	 } 

	 public function index(){

	 	$this->load->view('loginv.php');
	 }

	 public function signin(){
	 	$email=$this->input->post('email');
	 	$password=$this->input->post('password');
		$ceknum=$this->LoginM->ceknum($email,$password)->num_rows();
		$query=$this->LoginM->ceknum($email,$password)->row();
		// $cekstatus=$this->LoginM->cekstatus($email,md5($password))->result();
		if($ceknum>0){
			
              $userData = array(
              	'id' => $query->id_user,
		        'email' => $query->email,
		        'password' => $query->password,
		        'peran' => $query->id_userrole,
		        'logged_in' => TRUE
		      );
		      $this->session->set_userdata($userData);
				if ($this->session->userdata('peran') == "1"){redirect('DosenC');}
				else if ($this->session->userdata('peran') == "2"){redirect('MahasiswaC');}
				// else if ($this->session->userdata('peran') == "analis"){redirect('InputC');}

		}else{
	
				$this->session->set_flashdata('error','Username atau password salah');
				redirect('LoginC');
			}
		}

}