<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminC extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url','form');
        $this->load->model('AdminM'); //call model
        $this->model = $this->AdminM;
        // no_access_adm();
      }

      public function index()	{
        // $id_univ=$this->model->getUnivId($id_univ);
       $data['dosen']=$this->model->jumDosen();
       $data['mahasiswa']=$this->model->jumMahasiswa();
       // $data['univ']=$this->model->jumUnivByUser($id_univ);
       $this->load->view('admin/dashboardV', $data);
     }

     public function daftarUniversitas() {
       $data['universitas']=$this->AdminM->getUniversitas()->result();
       $this->load->view('admin/universitasV', $data);

     }

     public function tambahUniversitas() { 
       $this->load->library('form_validation');
       $this->form_validation->set_rules('nama_univ', 'nama_univ','required');
       $this->form_validation->set_rules('status_univ', 'status_univ','required');
       if($this->form_validation->run() == FALSE) {
        redirect('AdminC');
      }else{

        $nama_univ	=    $this->input->post('nama_univ');
        $status_univ	=    $this->input->post('status_univ');

        $data =  array(
         "nama_univ"=>$nama_univ,
         "status_univ"=>$status_univ,
         "createDtm"=>date('Y-m-d H:s:i')
       );
        $result = $this->AdminM->insertUniversitas($data);

        if($result == TRUE)
        {
          $this->session->set_flashdata('sukses', 'Universitas berhasil ditambahkan.');
        }
        else
        {
          $this->session->set_flashdata('error', 'Universitas gagal ditambahkan.');
        } 

        redirect('AdminC/daftarUniversitas');
      }
    }

    public function ubahUniversitas() {
		//get id jadwal yang ingin di edit
    	$id_univ = $this->input->post('id_univ');

    	$this->load->library('form_validation');

    	$this->form_validation->set_rules('nama_univ','nama_univ','required|xss_clean');
    	$this->form_validation->set_rules('status_univ','status_univ','required|xss_clean');

    	if($this->form_validation->run() == FALSE)
    	{
			//jika form tidak lengkap maka akan dikembalikan ke route "jadwalAdminR"
    		redirect('AdminC');
    	}
    	else
    	{
    		$nama_univ = $this->input->post('nama_univ');
    		$status_univ = $this->input->post('status_univ');

    		$data =  array(
    			"nama_univ"=>$nama_univ,
    			"status_univ"=>$status_univ,
    			"updateDtm"=>date('Y-m-d H:s:i')
    		);

    		$result = $this->AdminM->editUniversitas($data, $id_univ);

    		if($result == TRUE)
    		{
    			$this->session->set_flashdata('sukses', 'Universitas berhasil diubah');
    		}
    		else
    		{
    			$this->session->set_flashdata('error', 'Universitas gagal diubah');
    		}	

    		redirect('AdminC/daftarUniversitas');
    	}
    }

    public function daftarFakultas($id_univ) {
    	$data=array(
    		"getuniv"=>$this->model->getUnivId($id_univ)->row_array(),
    		// "getdetunivfakultas"=>$this->AdminM->getDetUnivFakultas($id_univ)->result(),
    		"fakultas"=>$this->AdminM->getFakultas($id_univ)->result(),
    		"aktif"=>"admin"
    	);
    	$this->load->view('admin/fakultasV', $data);
    }

    public function tambahFakultas() {

    	$nama_fakultas		=   $this->input->post('nama_fakultas');
    	$status_fakultas	=	$this->input->post('status_fakultas');
    	$id_univ 			=	$this->input->post('id_univ');

    	$this->load->library('form_validation');
    	$this->form_validation->set_rules('nama_fakultas', 'nama_fakultas','required');
    	$this->form_validation->set_rules('status_fakultas', 'status_fakultas','required');
    	$this->form_validation->set_rules('id_univ', 'id_univ','required');
    	if($this->form_validation->run() == FALSE) {
    		redirect('AdminC');
    	}else{

    		$data =  array(
    			"nama_fakultas"=>$nama_fakultas,
    			"status_fakultas"=>$status_fakultas,
    			"createDtm"=>date('Y-m-d H:s:i')
    		);
    		$result = $this->AdminM->insertFakultas($data);

    		$id_fakultas_db = $this->db->query("SELECT MAX(id_fakultas) as id_fakultas FROM fakultas");
    		foreach ($id_fakultas_db->result_array() as $fakultas) {
    			$data1 =  array(
    				"id_univ"=>$id_univ,
            "id_fakultas"=>$fakultas['id_fakultas'],
            "createDtm"=>date('Y-m-d H:s:i')
          );
    		}    		
    		$result2 = $this->AdminM->insertDetUnivFakultas($data1);

    		if($result2 > 0){
    			$this->session->set_flashdata('sukses', 'Data Fakultas berhasil ditambahkan');
    		}else{
    			$this->session->set_flashdata('error', 'Data Fakultas gagal ditambahkan');
    		}

    		redirect('AdminC/daftarFakultas/'.$id_univ);
    	}
    }

    public function ubahFakultas() {
		//get id jadwal yang ingin di edit
    	$id_fakultas = $this->input->post('id_fakultas');

    	$this->load->library('form_validation');

    	$this->form_validation->set_rules('nama_fakultas','nama_fakultas','required|xss_clean');
    	$this->form_validation->set_rules('status_fakultas','status_fakultas','required|xss_clean');

    	if($this->form_validation->run() == FALSE)
    	{
			//jika form tidak lengkap maka akan dikembalikan ke route "jadwalAdminR"
    		redirect('AdminC');
    	}
    	else
    	{
    		$nama_fakultas = $this->input->post('nama_fakultas');
    		$status_fakultas = $this->input->post('status_fakultas');

    		$data =  array(
    			"nama_fakultas"=>$nama_fakultas,
    			"status_fakultas"=>$status_fakultas,
    			"updateDtm"=>date('Y-m-d H:s:i')
    		);

    		$result = $this->AdminM->editFakultas($data, $id_fakultas);

    		if($result == TRUE)
    		{
    			$this->session->set_flashdata('sukses', 'Fakultas berhasil diubah');
    		}
    		else
    		{
    			$this->session->set_flashdata('error', 'Fakultas gagal diubah');
    		}	

    		redirect('AdminC/daftarFakultas');
    	}
    }

    public function daftarProdi($id_fakultas) {
    	$data=array(
            // "getuniv"=>$this->model->getUnivId($id_univ)->row_array(),
    		"getfakultas"=>$this->model->getFakultasId($id_fakultas)->row_array(),
    		"prodi"=>$this->AdminM->getProdi($id_fakultas)->result(),
    		"aktif"=>"admin"
    	);
    	$this->load->view('admin/prodiV', $data);

    }

    public function tambahProdi() {

    	$this->load->library('form_validation');
    	$this->form_validation->set_rules('nama_prodi', 'nama_prodi','required');
    	$this->form_validation->set_rules('status_prodi', 'status_prodi','required');
    	$this->form_validation->set_rules('id_fakultas', 'id_fakultas','required');
    	if($this->form_validation->run() == FALSE) {
    		redirect('AdminC');
    	}else{

    		$nama_prodi	=    $this->input->post('nama_prodi');
    		$status_prodi	=    $this->input->post('status_prodi');
    		$id_fakultas = $this->input->post('id_fakultas');

    		$data =  array(
    			"nama_prodi"=>$nama_prodi,
    			"status_prodi"=>$status_prodi,
    			"createDtm"=>date('Y-m-d H:s:i')
    		);

    		$result = $this->AdminM->insertProdi($data);

    		$id_prodi_db = $this->db->query("SELECT MAX(id_prodi) as id_prodi FROM prodi");
    		foreach ($id_prodi_db->result_array() as $prodi) {
          $data1 =  array(
            "id_fakultas"=>$id_fakultas,
            "id_prodi"=>$prodi['id_prodi'],
            "createDtm"=>date('Y-m-d H:s:i')
          );
        }
        $result2 = $this->AdminM->insertDetFakultasProdi($data1);

        if($result2 > 0){
         $this->session->set_flashdata('sukses', 'Data Program Studi berhasil ditambahkan');
       }else{
         $this->session->set_flashdata('error', 'Data Program Studi gagal ditambahkan');
       }

       redirect('AdminC/daftarProdi/'.$id_fakultas);
     }
   }

   public function ubahProdi() {
		//get id jadwal yang ingin di edit
     $id_prodi = $this->input->post('id_prodi');

     $this->load->library('form_validation');

     $this->form_validation->set_rules('nama_prodi','nama_prodi','required|xss_clean');
     $this->form_validation->set_rules('status_prodi','status_prodi','required|xss_clean');

     if($this->form_validation->run() == FALSE)
     {
			//jika form tidak lengkap maka akan dikembalikan ke route "jadwalAdminR"
      redirect('AdminC');
    }
    else
    {
      $nama_prodi = $this->input->post('nama_prodi');
      $status_prodi = $this->input->post('status_prodi');

      $data =  array(
       "nama_prodi"=>$nama_prodi,
       "status_prodi"=>$status_prodi,
       "updateDtm"=>date('Y-m-d H:s:i')
     );

      $result = $this->AdminM->editProdi($data, $id_prodi);

      if($result == TRUE)
      {
       $this->session->set_flashdata('sukses', 'Program Studi berhasil diubah');
     }
     else
     {
       $this->session->set_flashdata('error', 'Program Studi gagal diubah');
     }	

     redirect('AdminC/daftarProdi');
   }
 }

 public function daftarDosen() {
  $data['dosen']=$this->AdminM->getDosen()->result();
    // $data['detaildosen']=$this->AdminM->getDetailDosen($id_user)->row_array();
  $this->load->view('admin/data_dosenV', $data);

}

// public function tambahDosen() { 
//    $this->load->library('form_validation');
//    $this->form_validation->set_error_delimiters('<div style="color:#7E181B; font-size:12px; margin-bottom:2px;">','</div>');
//    $this->form_validation->set_rules('nama_depan', 'nama_depan','required');
//    $this->form_validation->set_rules('nama_belakang', 'nama_belakang','required');
//    $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin','required');
//    $this->form_validation->set_rules('nama_univ', 'nama_univ');
//    $this->form_validation->set_rules('email', 'email','required');
//    $this->form_validation->set_rules('password','password','required|min_length[6]');
//    if($this->form_validation->run() == FALSE) {
//        $this->session->set_flashdata('error',"Pastikan password minimal 6 karakter.");
//        redirect('RegisterC');
//    }else{

//        $nama_depan    =    $this->input->post('nama_depan');
//        $nama_belakang =    $this->input->post('nama_belakang');
//        $jenis_kelamin =    $this->input->post('jenis_kelamin');
//        $nama_univ      =    $this->input->post('nama_univ');
//        $email         =    $this->input->post('email');
//        $password      =    md5($this->input->post('password'));
//              // $level         =    $this->input->post('level');

//        $data =  array(
//         "nama_depan"=>$nama_depan,
//         "nama_belakang"=>$nama_belakang,
//         "jenis_kelamin"=>$jenis_kelamin,
//         "email"=>$email,
//         "password"=>$password,
//         "status" => "Aktif",
//         "id_userrole"=>1,
//         "id_univ"=>$nama_univ,
//         "createDtm"=>date('Y-m-d H:s:i') 
//     );

//    } 

//    $result = $this->AdminM->tambahDosen($data);
//    if($result == TRUE)
//    {
//        $this->session->set_flashdata('sukses', 'Dosen berhasil ditambahkan');
//    }
//    else
//    {
//        $this->session->set_flashdata('error', 'Dosen gagal ditambahkan');
//    }  

//    redirect('AdminC/daftarDosen');
// }

public function detailDosen($id_user) {
  $data['dosen']=$this->AdminM->getDosen()->row_array($id_user);
  $data['universitas']=$this->AdminM->getUniversitas()->result();
  $this->load->view('admin/detail_dosenV', $data);
}

public function daftarMahasiswa() {
  $data['mahasiswa']=$this->AdminM->getMahasiswa()->result();
  $data['universitas']=$this->AdminM->getUniversitas()->result();
  $this->load->view('admin/data_mahasiswaV', $data);
}

public function nonAktifAkun($id_user){
  $data =  array(
    "status" => "Belum Aktif",
    "updateDtm"=>date('Y-m-d H:s:i')
  );

  $result = $this->model->editUser($data, $id_user);

  //enkripsi id
  $encrypted_id = $result;

  $getEmail = $this->model->getEmail($id_user);

  foreach ($getEmail->result_array() as $key) {
    email($key['email']);
    $this->email->subject("Verifikasi Akun");
    $this->email->message(
      "Akun Anda telah dinonaktifkan oleh Admin. Jika ingin mengaktifkan kembali akun Anda silahkan memverifikasi akun Anda dengan cara klik link dibawah ini<br><br>".
      site_url("AdminC/verification/$encrypted_id")
    );
  }

  $q = $this->db->query("SELECT * FROM user WHERE id_userrole = '$id_userrole'");
  if ($q->result_array() == 1){
    if($this->email->send()){
      $this->session->set_flashdata('sukses', 'Akun berhasil dinonaktifkan dan email verifikasi berhasil dikirim.');
      redirect('AdminC/daftarDosen');
    }else{
      $this->session->set_flashdata('error', 'Akun berhasil dinonaktifkan namun email verifikasi gagal terkirim.');
      redirect('AdminC/daftarDosen');
    }
  }else{
    if($this->email->send()){
      $this->session->set_flashdata('sukses', 'Akun berhasil dinonaktifkan dan email verifikasi berhasil dikirim.');
      redirect('AdminC/daftarMahasiswa');
    }else{
      $this->session->set_flashdata('error', 'Akun berhasil dinonaktifkan namun email verifikasi gagal terkirim.');
      redirect('AdminC/daftarMahasiswa');
    }
  }
}

//VERIFIKASI
public function verification($id_user){
  $this->model->changeActiveState($id_user);
  $this->load->view('verifikasiV');
}

public function aktifkanAkun($id_user){
  $data =  array(
    "status"=>'Aktif',
    "updateDtm"=>date('Y-m-d H:s:i')
  );

  $result = $this->model->editUser($data, $id_user);

  $q = $this->db->query("SELECT * FROM user WHERE id_userrole = '$id_userrole'");
  if ($q->result_array() == 1){
    if($result == TRUE)
    {
      $this->session->set_flashdata('sukses', 'Akun dosen berhasil diaktifkan.');
    }
    else
    {
      $this->session->set_flashdata('error', 'Akun dosen gagal diaktifkan.');
    }
    redirect('AdminC/daftarDosen');
  }else{
    if($result == TRUE)
    {
      $this->session->set_flashdata('sukses', 'Akun mahasiswa berhasil diaktifkan.');
    }
    else
    {
      $this->session->set_flashdata('error', 'Akun mahasiswa gagal diaktifkan.');
    }
    redirect('AdminC/daftarMahasiswa');
  }
}

// public function tambahMahasiswa() { 
//    $this->load->library('form_validation');
//    $this->form_validation->set_error_delimiters('<div style="color:#7E181B; font-size:12px; margin-bottom:2px;">','</div>');
//    $this->form_validation->set_rules('nama_depan', 'nama_depan','required');
//    $this->form_validation->set_rules('nama_belakang', 'nama_belakang','required');
//    $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin','required');
//    $this->form_validation->set_rules('nama_univ', 'nama_univ');
//    $this->form_validation->set_rules('email', 'email','required');
//    $this->form_validation->set_rules('password','password','required|min_length[6]');
//    if($this->form_validation->run() == FALSE) {
//        $this->session->set_flashdata('error',"Pastikan password minimal 6 karakter.");
//        redirect('RegisterC');
//    }else{

//        $nama_depan    =    $this->input->post('nama_depan');
//        $nama_belakang =    $this->input->post('nama_belakang');
//        $jenis_kelamin =    $this->input->post('jenis_kelamin');
//        $nama_univ      =    $this->input->post('nama_univ');
//        $email         =    $this->input->post('email');
//        $password      =    md5($this->input->post('password'));
//              // $level         =    $this->input->post('level');

//        $data =  array(
//         "nama_depan"=>$nama_depan,
//         "nama_belakang"=>$nama_belakang,
//         "jenis_kelamin"=>$jenis_kelamin,
//         "email"=>$email,
//         "password"=>$password,
//         "status" => "Aktif",
//         "id_userrole"=>2,
//         "id_univ"=>$nama_univ,
//         "createDtm"=>date('Y-m-d H:s:i') 
//     );

//    }

//    $result = $this->AdminM->tambahMahasiswa($data);
//    if($result == TRUE)
//    {
//        $this->session->set_flashdata('sukses', 'Mahasiswa berhasil ditambahkan');
//    }
//    else
//    {
//        $this->session->set_flashdata('error', 'Mahasiswa gagal ditambahkan');
//    }  

//    redirect('AdminC/daftarMahasiswa');
// }

public function daftarKelas() {
  $data['kelas']=$this->AdminM->getKelas()->result();
  $this->load->view('admin/data_kelasV', $data);
}

// ubah status kelas menjadi Tidak Aktif
public function ubahStatusTidakAktifKelas($id_kelas){
  $data =  array(
    "status_kelas" => "Tidak Aktif",
    "updateDtm"=>date('Y-m-d H:s:i') 
  );

  $result = $this->model->ubahStatusKelas($data, $id_kelas);

  if($result == TRUE)
  {
   $this->session->set_flashdata('sukses', 'Kelas berhasil dinonaktifkan.');
  }
  else
  {
    $this->session->set_flashdata('error', 'Kelas gagal diaktifkan.');
  }  

  redirect('AdminC/daftarKelas');
}

// ubah status kelas menjadi Aktif
public function ubahStatusAktifKelas($id_kelas){
  $data =  array(
    "status_kelas" => "Aktif", 
    "updateDtm"=>date('Y-m-d H:s:i') 
  );

  $result = $this->model->ubahStatusKelas($data, $id_kelas);

  if($result == TRUE)
  {
   $this->session->set_flashdata('sukses', 'Kelas berhasil diaktifkan.');
  }
  else
  {
    $this->session->set_flashdata('error', 'Kelas gagal dinonaktifkan.');
  }  

  redirect('AdminC/daftarKelas');
}

public function daftarTugas() {
  $data['tugas']=$this->AdminM->getTugas()->result();
  $this->load->view('admin/data_tugasV', $data);
}

// ubah status tugas menjadi Tidak Aktif
public function ubahStatusTidakAktifTugas($id_tugas){
  $data =  array(
    "status_tugas" => "Tidak Aktif",
    "updateDtm"=>date('Y-m-d H:s:i') 
  );

  $result = $this->model->ubahStatusTugas($data, $id_tugas);

  if($result == TRUE)
  {
   $this->session->set_flashdata('sukses', 'Tugas berhasil dinonaktifkan.');
  }
  else
  {
    $this->session->set_flashdata('error', 'Tugas gagal diaktifkan.');
  }  

  redirect('AdminC/daftarTugas');
}

// ubah status tugas menjadi Aktif
public function ubahStatusAktifTugas($id_tugas){
  $data =  array(
    "status_tugas" => "Aktif",
    "updateDtm"=>date('Y-m-d H:s:i') 
  );

  $result = $this->model->ubahStatusTugas($data, $id_tugas);

  if($result == TRUE)
  {
   $this->session->set_flashdata('sukses', 'Tugas berhasil diaktifkan.');
  }
  else
  {
    $this->session->set_flashdata('error', 'Tugas gagal dinonaktifkan.');
  }  

  redirect('AdminC/daftarTugas');
}

public function daftarMateri() {
  $data['materi']=$this->AdminM->getMateri()->result();
  $this->load->view('admin/data_materiV', $data);
}

// ubah status materi menjadi Tidak Aktif
public function ubahStatusTidakAktifMateri($id_materi){
  $data =  array(
    "status_materi" => "Tidak Aktif",
    "updateDtm"=>date('Y-m-d H:s:i') 
  );

  $result = $this->model->ubahStatusMateri($data, $id_materi);

  if($result == TRUE)
  {
   $this->session->set_flashdata('sukses', 'Materi berhasil dinonaktifkan.');
  }
  else
  {
    $this->session->set_flashdata('error', 'Materi gagal diaktifkan.');
  }  

  redirect('AdminC/daftarMateri');
}

// ubah status materi menjadi Aktif
public function ubahStatusAktifMateri($id_materi){
  $data =  array(
    "status_materi" => "Aktif",
    "updateDtm"=>date('Y-m-d H:s:i') 
  );

  $result = $this->model->ubahStatusMateri($data, $id_materi);

  if($result == TRUE)
  {
   $this->session->set_flashdata('sukses', 'Materi berhasil diaktifkan.');
  }
  else
  {
    $this->session->set_flashdata('error', 'Materi gagal dinonaktifkan.');
  }  

  redirect('AdminC/daftarMateri');
}

}
