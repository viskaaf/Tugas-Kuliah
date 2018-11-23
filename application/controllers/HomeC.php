<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeC extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('HomeM');
		$this->model = $this->HomeM;
	}

	public function index()
	{
		$this->load->view('homeV.php');
	}

	public function halamanLupaPass()
	{
		$this->load->view('lupa_passwordV.php');
	}

	public function lupaPass() {
		$this->form_validation->set_rules('email','email','required');

		$email = $this->input->post('email');
		$cekAkun = $this->db->query("SELECT * FROM user WHERE email ='$email'")->num_rows();

		if($cekAkun==0){
			if($email == "tugaskuliah473@gmail.com"){
				$encrypted_email = md5($email);
				email($email);
				$this->email->subject("Konfirmasi perubahan password");
				$this->email->message(
					"Silahkan klik link di bawah ini untuk mengganti password Anda<br><br>".
					site_url("HomeC/halamanLupaPassword/$encrypted_email")
				);

				if($this->email->send()){
					$this->session->set_flashdata('sukses',"Email perubahan password telah dikirim ke email Anda, silahkan cek dan ikuti link yang tertaut!");
					redirect('LoginC');
				}else{
					$this->session->set_flashdata('error',"Email perubahan password gagal dikirim, silahkan coba lagi!");
					redirect('LoginC');
				}
			}else{
				$this->session->set_flashdata('error',"Email yang Anda masukkan belum terdaftar.");
				redirect('LoginC');
			}
		} else{
			if($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('error',"Pastikan mengisi email dengan benar!");
				redirect('LoginC');
			}else{
				$encrypted_email = md5($email);
				email($email);
				$this->email->subject("Konfirmasi perubahan password");
				$this->email->message(
					"Silahkan klik link di bawah ini untuk mengganti password Anda<br><br>".
					site_url("HomeC/halamanLupaPassword/$encrypted_email")
				);

				if($this->email->send()){
					$this->session->set_flashdata('sukses',"Email perubahan password telah dikirim ke email Anda, silahkan cek dan ikuti link yang tertaut!");
					redirect('LoginC');
				}else{
					$this->session->set_flashdata('error',"Email perubahan password gagal dikirim, silahkan coba lagi!");
					redirect('LoginC');
				}
			}
		}
	}

    //menampilkan halaman lupa password
	public function halamanLupaPassword($encrypted_email){
		$data = array(
			'email' => $encrypted_email,
		);
		$this->load->view('lupa_password1V',$data);
	}

    //fungsi ubah password untuk lupa password
	public function lupaPassword(){
		$this->form_validation->set_error_delimiters('<div style="color:#7E181B; font-size:12px; margin-bottom:2px;">','</div>');
		$this->form_validation->set_rules('password','password','required|min_length[6]');
		$this->form_validation->set_rules('password_konf','password_konf','required|min_length[6]');

		$email_def = $this->input->post('email_def');
		// $email = $this->input->post('email');
		$password = $this->input->post('password');
		$password_konf = $this->input->post('password_konf');

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error',"Pastikan password minimal 6 karakter.");
			redirect('HomeC/halamanLupaPassword/'.$email_def);
		} else{

			if($password == $password_konf){
	  		//memasukan ke array
				$data = array(  
					'password' => md5($password)
				);
	    	//tambahkan akun ke database
				$this->model->lupapassword($data,$email_def);
				$this->session->set_flashdata('sukses',"Password berhasil diubah!");
				redirect('LoginC');
			}else{
				$this->session->set_flashdata('error',"Password tidak sesuai!");
				redirect('HomeC/halamanLupaPassword/'.$email_def);
			}
		}
	}
	

}
