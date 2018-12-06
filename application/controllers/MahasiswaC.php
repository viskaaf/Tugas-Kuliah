<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MahasiswaC extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('MahasiswaM');
		$this->model = $this->MahasiswaM;
	}

	public function index()
	{ 
		$email=$this->session->userdata('email');
		$data=array(
			"user"=>$this->model->getUser($email)->row_array(),
			"aktif"=>"mahasiswa"
		);
		$this->load->view('mahasiswa/beranda_mahasiswaV', $data);
	}

	public function tampilProfil($id_user){
		$data=array(
			"user"=>$this->model->getUser1($id_user)->row_array(),
            "id_mhs"=>$this->model->getIdMhs($id_user)->row_array(),
			"aktif"=>"mahasiswa"
		);
		$this->load->view('mahasiswa/edit_profilV', $data);
	}

	public function ubahProfil() 
	{
		//get id user yang ingin di edit
		$id_user = $this->input->post('id_user');

		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_depan','nama_depan','required');
		$this->form_validation->set_rules('nama_belakang','nama_belakang','required');
		$this->form_validation->set_rules('nim','nim','required');
		$this->form_validation->set_rules('nama_univ','nama_univ');
		$this->form_validation->set_rules('jenis_kelamin','jenis_kelamin','required');
		$this->form_validation->set_rules('email','email','required');

		if($this->form_validation->run() == FALSE){
      //jika form tidak lengkap maka akan dikembalikan ke route "akunAdminR"
			redirect('MahasiswaC/tampilProfil/'.$id_user);
		}else{
			$nama_depan = $this->input->post('nama_depan');
			$nama_belakang = $this->input->post('nama_belakang');
			$nim = $this->input->post('nim');
			$nama_univ = $this->input->post('nama_univ');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$email = $this->input->post('email');

            $config['upload_path'] = FCPATH.'gambar'; //path folder
            $config['allowed_types'] = "jpg|png|jpeg"; //type yang dapat diakses bisa anda sesuaikan
            $config['overwrite'] = TRUE;
            $config['max_size'] = 3072;
            $config['remove_spaces'] = TRUE;

            $this->load->library('upload');
            $this->upload->initialize($config);

            $this->upload->do_upload('foto_profil');
            $gambar = $this->upload->data('file_name');

            if ($gambar == ""){
            	$dataUser =  array(
            		"nama_depan"=>$nama_depan,
            		"nama_belakang"=>$nama_belakang,
            		"jenis_kelamin"=>$jenis_kelamin,
            		"id_univ"=>$nama_univ,
            		"email"=>$email,
            		"updateDtm"=>date('Y-m-d H:s:i')
            	);
            	$result = $this->MahasiswaM->ubahProfil($dataUser,$id_user);
            	$result2 = $this->MahasiswaM->ubahNIM($nim,$id_user);
            }else{ 
            	$gambarubah = $gambar;
            	$dataUser =  array(
            		"nama_depan"=>$nama_depan,
            		"nama_belakang"=>$nama_belakang,
            		"jenis_kelamin"=>$jenis_kelamin,
            		"id_univ"=>$nama_univ,
            		"email"=>$email,
            		"foto_profil"=>$gambarubah,
            		"updateDtm"=>date('Y-m-d H:s:i')
            	);
            	$result = $this->MahasiswaM->ubahProfil($dataUser,$id_user);
            	$result2 = $this->MahasiswaM->ubahNIM($nim,$id_user);
            }

            if($result2 == TRUE)
            {
            	$this->session->set_flashdata('sukses', 'Akun berhasil diubah.');
            }
            else
            {
            	$this->session->set_flashdata('error', 'Akun gagal diubah.');
            } 

            redirect('MahasiswaC/tampilProfil/'.$id_user);
        }
    }

    public function resetPassword() {
    //get id user yang akan diubah
    	$id_user = $this->input->post('id_user');

    	$this->load->library('form_validation');

    	$this->form_validation->set_rules('passlama','Password Lama','required');
    	$this->form_validation->set_rules('passbaru1','Password Baru','required');
    	$this->form_validation->set_rules('passbaru2','Password Baru','required');

    	if($this->form_validation->run() == FALSE)
    	{
      //jika form tidak lengkap maka akan dikembalikan ke route "profilDosenR"
    		redirect('MahasiswaC/tampilProfil/'.$id_user);
    	}
    	else
    	{
    		$email = $this->session->userdata('email');
    		$pass = $this->input->post('passlama');
    		$passbaru1 = $this->input->post('passbaru1');
    		$passbaru2 = $this->input->post('passbaru2');
    		$passlama = md5($pass);

    		$cek = $this->MahasiswaM->cekPassword($passlama, $email);
    		if(!empty($cek)){
    			if($passbaru1 == $passbaru2){
    				$dataPassword = array(
    					"password"=>md5($passbaru1)
    				);

    				$result = $this->MahasiswaM->resetPassword($dataPassword,$id_user);

    				if($result == TRUE){
    					$this->session->set_flashdata('sukses','Reset password berhasil');
    				}else{
    					$this->session->set_flashdata('error','Reset password gagal');
    				}
    			}else{
    				$this->session->set_flashdata('error','Password baru tidak sesuai');
    			}
    		}else{
    			$this->session->set_flashdata('error','Password lama tidak sesuai');
    		}

    		redirect('MahasiswaC/tampilProfil/'.$id_user);
    	}
    }

    public function gabungKelas() {
    // $id=$this->input->post('id_univ');

    	$this->load->library('form_validation');
    	$this->form_validation->set_rules('kode', 'kode','required');
    	if($this->form_validation->run() == FALSE) {
    		redirect('MahasiswaC/');
    	}else{
    		$id_mhs = $this->input->post('id_mhs');
    		$kode = $this->input->post('kode');
    		$getIdKelasbyKode = $this->model->getIdKelasbyKode($kode);

    		foreach ($getIdKelasbyKode->result_array() as $key) {
    			$data =  array(
    				"id_mhs"=>$id_mhs,
    				"id_kelas"=> $key['id_kelas'],
    				"createDtm"=>date('Y-m-d H:s:i')
    			);
    		}

    		$result = $this->model->insertKelasMhs($data);

    		if($result == TRUE)
    		{
    			$this->session->set_flashdata('sukses', 'Anda berhasil bergabung ke kelas.');
    		}
    		else
    		{
    			$this->session->set_flashdata('error', 'Anda gagal bergabung ke kelas.');
    		}

    		redirect('MahasiswaC/');
    	}
    }

    public function tampilKelas($id_user){
    	$email=$this->session->userdata('email');
    	$data=array(
    		"user"=>$this->model->getUser($email)->row_array(),
    		"id_mhs"=>$this->model->getIdMhs($id_user)->row_array(),
    		"kelas"=>$this->model->getKelasbyUser($id_user)->result(),
    		"aktif"=>"mahasiswa"
    	);
    	$this->load->view('mahasiswa/daftar_kelasV', $data);
    }

    public function detailKelas($id_kelas){ 
    	$email=$this->session->userdata('email');
        $kelas=$this->model->getKelas($id_kelas);
        $id_mhs = $this->model->getUser($email);

        foreach ($id_mhs->result_array() as $key) {  
        	foreach ($kelas->result_array() as $row) {
        		$data=array(
        			"user"=>$this->model->getUser($email)->row_array(),
                    "id_mhs"=>$key['id_mhs'],
        			// "id_mhs"=>$this->model->getIdMhsbyEmail($email)->row_array(),
        			"kelas"=>$this->model->getKelasbyUser($row['id_user'])->row_array(),
        			"getFakultasProdi"=>$this->model->getFakultasProdi($id_kelas)->row_array(),
        			"pengumuman"=>$this->model->getPengumuman($id_kelas)->result(),
        			"tugas"=>$this->model->getTugas($id_kelas)->result(),
        			"aktif"=>"mahasiswa"
        		);
        	}
    	   $this->load->view('mahasiswa/detail_kelasV', $data);
        }
    }

    public function tampilSoalPilgan($id)
    {
    	$email=$this->session->userdata('email');
    	$nomor=0;

    	$data=array(
    		"nomor" => $nomor,
    		"nama_tugas"=>$this->model->getSoalPilgan($id)->row_array(),
    		"soal"=>$this->model->getSoalPilgan($id)->result(),
    		"aktif"=>"mahasiswa"
    	);

    	$this->load->view('mahasiswa/soal_pilganV',$data);
    }

    public function jawabSoal() {
     $email=$this->session->userdata('email');
     $id_tugas = $this->input->post('id_tugas');
     $id_mhs = $this->model->getUser($email);

     foreach ($id_mhs->result_array() as $row) {    	
      foreach ($_POST['pilihan'] as $pilihan) {
         $pilih = $pilihan['id_soal_pilgan'];
         $kunci = $this->db->query("SELECT * FROM soal_pilgan WHERE id_soal_pilgan = '$pilih'")->result_array();
         foreach ($kunci as $key) {
            if($pilihan['jawaban'] == $key['kunci']){
                $status = 'B';
            }else{
                $status = 'S';
            }

            $data =  array(
                "jawaban"=>$pilihan['jawaban'],
                "status"=>$status,
                "id_soal_pilgan"=>$pilihan['id_soal_pilgan'],
                "id_mhs"=>$row['id_mhs'],
                "createDtm"=>date('Y-m-d H:s:i')
            );

            $result = $this->model->insertJawabanPilgan($data);
        }
    }
    $result2 = $this->model->insertNilaiPilgan($id_tugas,$row['id_mhs']);
}
redirect('MahasiswaC/tampilSelesai/'.$id_tugas);
}

public function tampilSelesai($id)
{
    $email=$this->session->userdata('email');
    $id_mhs = $this->model->getUser($email);
    $id_tugas = $this->input->post('id_tugas');

    foreach ($id_mhs->result_array() as $row) {  
        $data=array(
            "id_mhs"=>$row['id_mhs'],
            "soal"=>$this->model->getSoalPilgan($id)->row_array(),
            "aktif"=>"mahasiswa"
        );
    }

    $this->load->view('mahasiswa/selesaiV',$data);
}

public function tampilHasilPilgan($id)
{ 
    $email=$this->session->userdata('email');
    $id_mhs = $this->model->getUser($email);

    foreach ($id_mhs->result_array() as $row) {  
        $data=array(
            "id_mhs"=>$row['id_mhs'],
            // "nama_tugas"=>$this->model->getSoalPilgan($id)->row_array(),
            "jawaban"=>$this->model->getJawabanPilgan($id, $row['id_mhs'])->result(),
            "nilai"=>$this->model->getNilai($id, $row['id_mhs'])->row_array(),
            "ket_soal"=>$this->model->getKetSoalbyIdTugas($id)->row_array(),
            "aktif"=>"mahasiswa"
        );
    }

    $this->load->view('mahasiswa/hasil_soal_pilganV',$data);
}

public function tampilSoalEssay($id) 
{
    $email=$this->session->userdata('email');
    $id_mhs = $this->model->getUser($email);

    foreach ($id_mhs->result_array() as $row) {
        $data=array(
            "id_mhs"=>$row['id_mhs'],
            "soal"=>$this->model->getSoalEssay($id)->row_array(),
            "ket_soal"=>$this->model->getKetSoalbyIdTugas($id)->row_array(),
            "aktif"=>"mahasiswa"
        );
    }

    $this->load->view('mahasiswa/soal_essayV',$data);
}

public function jawabSoalEssay() {
  $email = $this->session->userdata('email');
  $id_mhs = $this->model->getUser($email);
  $id_tugas = $this->input->post('id_tugas');
  $id_soal_essay = $this->input->post('id_soal_essay'); 

  $this->load->library('form_validation');
  $this->form_validation->set_rules('jawaban','jawaban','required');
  if($this->form_validation->run() == FALSE) {
    $this->session->set_flashdata('error', 'File gagal diunggah!');
    redirect('MahasiswaC/tampilSoalEssay/'.$id_tugas);
  }else{

      $jawaban = $this->input->post('jawaban');

      $config['upload_path'] = FCPATH.'file_upload'; //path folder
      $config['allowed_types'] = "pdf|zip|rar"; //type yang dapat diakses bisa anda sesuaikan
      $config['overwrite'] = TRUE;
      $config['max_size'] = 5048;
      $config['remove_spaces'] = TRUE;

      $this->load->library('upload');
      $this->upload->initialize($config);

      $this->upload->do_upload('file_soal');
      $file_soal = $this->upload->data('file_name');

      foreach ($id_mhs->result_array() as $row) {
          $data =  array(
            "jawaban"=>$jawaban,
            "path_file"=>$file_soal, 
            "id_soal_essay"=>$id_soal_essay,
            "id_mhs"=>$row['id_mhs'],
            "createDtm"=>date('Y-m-d H:s:i')
        );
 
          $result = $this->model->insertJawabanEssay($data);
          // $result2 = $this->model->insertNilaiEssay($id_tugas,$row['id_mhs']);
      }
      redirect('MahasiswaC/tampilHasilEssay/'.$id_tugas);
  }
}

public function tampilHasilEssay($id)
{ 
    $email=$this->session->userdata('email');
    $id_mhs = $this->model->getUser($email);
    $id_tugas = $this->input->post('id_tugas'); 

    foreach ($id_mhs->result_array() as $row) {  
        $data=array(
            "id_mhs"=>$row['id_mhs'],
            "jawaban"=>$this->model->getJawabanEssay($id, $row['id_mhs'])->row_array(),
            "nilai"=>$this->model->getNilai($id, $row['id_mhs'])->row_array(),
            "ket_soal"=>$this->model->getKetSoalbyIdTugas($id)->row_array(),
            "soal"=>$this->model->getSoalEssay($id)->row_array(),
            "aktif"=>"mahasiswa"
        );
    }

    $this->load->view('mahasiswa/hasil_soal_essayV',$data);
}

}
