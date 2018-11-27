<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginC extends CI_Controller{
	
	function __construct(){
		parent:: __construct();
		$this->load->helper('url');
		// in_accessadmin();
		// in_accessuser();

		//ini untuk memanggil model 
		$this->load->model('LoginM');
	}
		 
	public function index(){
		//load view untuk halaman login
	 	 $this->load->view('loginV');
	}

	//function untuk validasi login
	public function signin(){
	 	$email=$this->input->post('email');
	 	$password=$this->input->post('password');

		$cekuseradmin=$this->LoginM->cekuseradmin($email,md5($password))->num_rows();
		$cekuser1=$this->LoginM->cekuser($email,md5($password))->num_rows();
		$cekuser2=$this->LoginM->cekuser($email,md5($password))->result();

		if($cekuseradmin>0){
			$this->session->set_userdata('email', $email);
			$this->session->set_userdata('status', $status);
			$this->session->set_userdata('akses',"admin");
			redirect('AdminC');
		}else if($cekuser1>0){
			$id_userrole=$cekuser2[0]->id_userrole;//index ke 0
			$status=$cekuser2[0]->status;
			// $this->session->set_userdata('id_user', $id_user);
			$this->session->set_userdata('email', $email);
			$this->session->set_userdata('id_userrole', $id_userrole);
			$this->session->set_userdata('status', $status);
			$this->session->set_userdata('akses',"user");
			$this->session->set_userdata('masuk',TRUE);


			if ($status == "Belum Aktif"){
				$this->session->set_flashdata('error','Email belum diverifikasi silahkan buka email Anda untuk memverifikasi akun');
				redirect('LoginC');
			}else{
				if ($id_userrole==1) {
				redirect('DosenC');
				}else if ($id_userrole==2) {
				redirect('MahasiswaC');
				}
			}
		}else{
			$this->session->set_flashdata('error','Email atau password salah');
			redirect('LoginC');
		}
	}

	public function logout(){
		// $this->session->unset_userdata('user');
		// $this->session->unset_userdata('status');
		// $this->session->unset_userdata('akses');	
		$this->session->sess_destroy();
		// $this->session->set_flashdata('sukses', 'Anda telah keluar dari Sistem');
		redirect('HomeC');
	}
}
?>