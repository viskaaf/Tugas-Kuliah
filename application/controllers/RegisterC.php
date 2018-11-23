<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterC extends CI_Controller {

	function __construct(){
        parent::__construct();
        
        $this->load->helper('url','form');
        $this->load->model('RegisterM'); //call model
        $this->model = $this->RegisterM;
	}

	public function index(){
		 // $data['level'] = $this->input->post('level');
        $data=array(
         "level"=>$this->input->post('level'),
         "universitas"=>$this->model->getUniv(),
        );
	 	 $this->load->view('registerV',$data);
	 	 // echo $level;
	} 

	 public function register() { 
 		 $this->load->library('form_validation');
         $this->form_validation->set_error_delimiters('<div style="color:#7E181B; font-size:12px; margin-bottom:2px;">','</div>');
         $this->form_validation->set_rules('nama_depan', 'nama_depan','required');
         $this->form_validation->set_rules('nama_belakang', 'nama_belakang','required');
         $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin','required');
         $this->form_validation->set_rules('nama_univ', 'nama_univ');
         $this->form_validation->set_rules('email', 'email','required');
         $this->form_validation->set_rules('password','password','required|min_length[6]');
         if($this->form_validation->run() == FALSE) {
             $this->session->set_flashdata('error',"Pastikan password minimal 6 karakter.");
             redirect('RegisterC');
         }else{
              
             $nama_depan	=    $this->input->post('nama_depan');
             $nama_belakang	=    $this->input->post('nama_belakang');
             $jenis_kelamin =    $this->input->post('jenis_kelamin');
             $nama_univ      =    $this->input->post('nama_univ');
             $email			=    $this->input->post('email');
             $password		=    md5($this->input->post('password'));
             $level			=    $this->input->post('level');

             if ($level == 1){
                 $data =  array(
    				"nama_depan"=>$nama_depan,
    				"nama_belakang"=>$nama_belakang,
    				"jenis_kelamin"=>$jenis_kelamin,
    				"email"=>$email,
    				"password"=>$password,
                    "status" => "Belum Aktif",
    				"id_userrole"=>$level,
                    "id_univ"=>$nama_univ,
    				"createDtm"=>date('Y-m-d H:s:i')
    			 );
             }else{
                $data =  array(
                    "nama_depan"=>$nama_depan,
                    "nama_belakang"=>$nama_belakang,
                    "jenis_kelamin"=>$jenis_kelamin,
                    "email"=>$email,
                    "password"=>$password,
                    "status" => "Belum Aktif",
                    "id_userrole"=>$level,
                    "createDtm"=>date('Y-m-d H:s:i')
                );
            }

             $result = $this->RegisterM->register($data);

             //enkripsi id
             $encrypted_id = md5($result);

             $this->load->library('email');
                $config = array();
                $config['charset'] = 'utf-8';
                $config['useragent'] = 'Codeigniter';
                $config['protocol']= "smtp";
                $config['mailtype']= "html";
                $config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
                $config['smtp_port']= "465";
                $config['smtp_timeout']= "400";
                $config['smtp_user']= "tugaskuliah473@gmail.com"; // isi dengan email kamu
                $config['smtp_pass']= "Tugaskuliah1"; // isi dengan password kamu
                $config['crlf']="\r\n"; 
                $config['newline']="\r\n"; 
                $config['wordwrap'] = TRUE;
                //memanggil library email dan set konfigurasi untuk pengiriman email

                $this->email->initialize($config);
                //konfigurasi pengiriman
                $this->email->from($config['smtp_user']);
                $this->email->to($email);
                $this->email->subject("Verifikasi Akun");
                $this->email->message(
                    "terimakasih telah melakukan registrasi, untuk memverifikasi silahkan klik tautan dibawah ini<br><br>".
                    site_url("RegisterC/verification/$encrypted_id")
                );

                if($this->email->send()){
                    $this->session->set_flashdata('sukses',"Pendaftaran berhasil silahkan cek email Anda untuk memverifikasi akun.");
                    redirect('LoginC');
                }else{
                    $this->session->set_flashdata('error',"Pendaftaran berhasil namun email verifikasi tidak terkirim.");
                    redirect('RegisterC');
                }
            }

     }
     //VERIFIKASI
            public function verification($key){
                $this->RegisterM->changeActiveState($key);
                echo "Selamat kamu telah memverifikasi akun kamu";
                echo "<br><br><a href='".site_url("LoginC")."'>Kembali ke Menu Login</a>";
            }
}