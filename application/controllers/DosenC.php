<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DosenC extends CI_Controller {

	function __construct(){
    parent::__construct();
    $this->load->helper('url','form');
    $this->load->model('DosenM');
    $this->model = $this->DosenM;
    $this->load->library('Excel');
  }

  public function index()
  {
    $email=$this->session->userdata('email');
    $id = $this->model->getUnivId_byEmail($email);
    foreach ($id->result() as $key) {
      $data=array(
       "nama"=>$this->model->getUser($email)->row_array(),
       "fakultas"=>$this->model->getFakultas($key->id_univ),
       "prodi"=>$this->model->getProdiAll(),
       "getdosen"=>$this->model->getDosenId($key->id_univ)->row_array(),
       "getuniv"=>$this->model->getUnivId($key->id_univ)->row_array(),
       "kelas"=>$this->model->getKelas_byUser($key->id_user)->result(),
       "pengumuman"=>$this->model->getPengumuman($key->id_user)->result(),
       "aktif"=>"user"
     );
    }
    $this->load->view('dosen/beranda_dosenV',$data);
  }

  public function ubahProfil($id){
    $data=array(
      "nama"=>$this->model->getUser1($id)->row_array(),
      "univ"=>$this->model->getUniv(),
      "univ_dosen"=>$this->model->getUnivDosen($id),
      "fakultas"=>$this->model->getFakultas($id),
      "prodi"=>$this->model->getProdiAll(),
      "getdosen"=>$this->model->getDosenId($id)->row_array(),
      "getuniv"=>$this->model->getUnivId($id)->row_array(),
      "aktif"=>"user"
    );
    $this->load->view('dosen/edit_dosenV', $data);
  }

  public function ubahProfilDosen()
  {
		//get id user yang ingin di edit
    $id_user = $this->input->post('id_user');
    
    $this->load->library('form_validation');
    
    $this->form_validation->set_rules('nama_depan','nama_depan','required');
    $this->form_validation->set_rules('nama_belakang','nama_belakang','required');
    $this->form_validation->set_rules('nip','nip','required');
    $this->form_validation->set_rules('nama_univ','nama_univ','required');
    $this->form_validation->set_rules('jenis_kelamin','jenis_kelamin','required');
    $this->form_validation->set_rules('email','email','required');

    if($this->form_validation->run() == FALSE){
      //jika form tidak lengkap maka akan dikembalikan ke route "akunAdminR"
      redirect('DosenC/ubahProfil/'.$id_user);
    }else{
     $nama_depan = $this->input->post('nama_depan');
     $nama_belakang = $this->input->post('nama_belakang');
     $nip = $this->input->post('nip');
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
             $result = $this->DosenM->ubahUser($dataUser,$id_user);
             $result2 = $this->DosenM->ubahDosen($nip,$id_user);
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
            $result = $this->DosenM->ubahUser($dataUser,$id_user); 
            $result2 = $this->DosenM->ubahDosen($nip,$id_user);
          }

          if($result2 == TRUE)
          {
           $this->session->set_flashdata('sukses', 'Akun berhasil diubah.');
         }
         else
         {
           $this->session->set_flashdata('error', 'Akun gagal diubah.');
         } 

         redirect('DosenC/ubahProfil/'.$id_user);
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
        redirect('DosenC/ubahProfil/'.$id_user);
      }
      else
      {
        $email = $this->session->userdata('email');
        $pass = $this->input->post('passlama');
        $passbaru1 = $this->input->post('passbaru1');
        $passbaru2 = $this->input->post('passbaru2');
        $passlama = md5($pass);

        $cek = $this->DosenM->cekPassword($passlama, $email);
        if(!empty($cek)){
          if($passbaru1 == $passbaru2){
            $dataPassword = array(
              "password"=>md5($passbaru1)
            );

            $result = $this->DosenM->resetPassword($dataPassword,$id_user);

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

        redirect('DosenC');
      }
    }

    public function tambahPengumuman() {
    // $id=$this->input->post('id_univ');

      $this->load->library('form_validation');
      $this->form_validation->set_rules('nama_kelas', 'nama_kelas','required');
      $this->form_validation->set_rules('pengumuman', 'pengumuman','required');
      if($this->form_validation->run() == FALSE) {
       redirect('DosenC/'.$id);
     }else{

       $nama_kelas =    $this->input->post('nama_kelas');
       $pengumuman =    $this->input->post('pengumuman');

       $data =  array(
        "pengumuman"=>$pengumuman,
        "id_kelas"=>$nama_kelas,
        "createDtm"=>date('Y-m-d H:s:i')
      );

       $result = $this->DosenM->insertPengumuman($data);

       if($result == TRUE)
       {
        $this->session->set_flashdata('sukses', 'Pengumuman berhasil ditambahkan');
      }
      else
      {
        $this->session->set_flashdata('error', 'Pengumuman gagal ditambahkan');
      }

      redirect('DosenC/'.$id);
    }
  }

  public function daftarKelas($id)
  {
    $email=$this->session->userdata('email');
    $id_univ = $this->model->getUnivId_byEmail($email);
    foreach ($id_univ->result() as $key) {
      $data=array(
        "nama"=>$this->model->getUser($email)->row_array(),
        "kelas"=>$this->model->getKelas_byUser($key->id_user)->result(),
        "fakultas"=>$this->model->getFakultas($key->id_univ),
        "fakultas_kelas"=>$this->model->getFakKelas($id),
        "prodi"=>$this->model->getProdiAll(),
        "getdosen"=>$this->model->getDosenId($key->id_univ)->row_array(),
        "getuniv"=>$this->model->getUnivId($key->id_univ)->row_array(),
        "aktif"=>"dosen"
      );
    }
    $this->load->view('dosen/daftar_kelasV',$data);
  }

  public function get_prodi($id_fakultas){
    $dataProdi=$this->model->getProdi($id_fakultas);
    $output   = '<option value=""></option>';

    if(! empty($dataProdi)){
      foreach ($dataProdi->result() as $row) {
        $output .='<option value="'.$row->id_det_fakultasprodi.'">'.$row->nama_prodi.'</option>';
      }
    }else{
      $output .='<option value="">- Data Belum Tersedia -</option>';
    } 
    echo $output;
  }

  public function tambahKelas() { 
      //get id jadwal yang ingin di edit
   $id=$this->input->post('id_univ');
   // $id_kelas = $this->input->post('id_kelas');

   $this->load->library('form_validation');
   $this->form_validation->set_rules('nama_kelas', 'nama_kelas','required');
   $this->form_validation->set_rules('nama_fakultas', 'nama_fakultas','required');
   $this->form_validation->set_rules('nama_prodi', 'nama_prodi','required');
   $this->form_validation->set_rules('kode', 'kode','required');
   $this->form_validation->set_rules('status_kelas', 'status_kelas','required');
   $this->form_validation->set_rules('id_dosen', 'id_dosen','required');
   $this->form_validation->set_rules('id_univ', 'id_univ','required');
   if($this->form_validation->run() == FALSE) {
     redirect('DosenC/daftarKelas/'.$id);
   }else{

    $nama_kelas =    $this->input->post('nama_kelas');
    $q = $this->db->query("SELECT * FROM kelas WHERE nama_kelas = '$nama_kelas'");

    if($q->num_rows() == 0){
     $nama_fakultas =    $this->input->post('nama_fakultas');
     $nama_prodi =    $this->input->post('nama_prodi');
     $kode =    $this->input->post('kode');
     $status_kelas =    $this->input->post('status_kelas');
     $id_dosen = $this->input->post('id_dosen');

     $getDetailId = $this->model->getDetailId($nama_fakultas,$nama_prodi);

     foreach ($getDetailId->result_array() as $key) {
       $data =  array(
        "nama_kelas"=>$nama_kelas,
        "id_det_fakultasprodi"=> $key['id_det_fakultasprodi'],
        "kode"=>$kode,
        "status_kelas"=>$status_kelas,
        "id_dosen"=>$id_dosen,
        "createDtm"=>date('Y-m-d H:s:i')
      ); 
     }

     $result = $this->DosenM->insertKelas($data);

     if($result == TRUE)
     {

      foreach ($q->result_array() as $key) {
        redirect('DosenC/detailKelas/'.$key['id_kelas']);
      }

    }else{
      $this->session->set_flashdata('error', 'Kelas gagal ditambahkan');
    }
  }else{
    $this->session->set_flashdata('error', 'Nama kelas sudah digunakan.');
    redirect('DosenC/daftarKelas/'.$id);
  }
  }
}

public function ubahKelas() {
    //get id jadwal yang ingin di edit
  $id_kelas = $this->input->post('id_kelas');

  $this->load->library('form_validation');
  $this->form_validation->set_rules('nama_kelas', 'nama_kelas','required');
  $this->form_validation->set_rules('nama_fakultas', 'nama_fakultas','required');
  $this->form_validation->set_rules('nama_prodi', 'nama_prodi','required');
  $this->form_validation->set_rules('kode', 'kode','required');
  $this->form_validation->set_rules('status_kelas', 'status_kelas','required');
  $this->form_validation->set_rules('id_dosen', 'id_dosen','required');
  $this->form_validation->set_rules('id_univ', 'id_univ','required');
  if($this->form_validation->run() == FALSE) {

    if($this->form_validation->run() == FALSE)
    {
      //jika form tidak lengkap maka akan dikembalikan ke route "jadwalAdminR"
      redirect('DosenC/daftarKelas');
    }
    else
    {
      $nama_kelas = $this->input->post('nama_kelas');
      $status_kelas = $this->input->post('status_kelas');

      $data =  array(
        "nama_kelas"=>$nama_kelas,
        "status_kelas"=>$status_kelas,
        "updateDtm"=>date('Y-m-d H:s:i')
      );

      $result = $this->DosenM->editKelas($data, $id_kelas);

      if($result == TRUE)
      {
        $this->session->set_flashdata('sukses', 'Kelas berhasil diubah');
      }
      else
      {
        $this->session->set_flashdata('error', 'Kelas gagal diubah');
      } 

      redirect('DosenC/daftarKelas');
    }
  }
}

public function hapusKelas($id){
  if($this->model->hapusKelas($id)){
    $this->session->set_flashdata('sukses','Kelas telah dihapus!');
    redirect('DosenC/daftarKelas/');
  }

}

public function detailKelas($id)
{
  $email=$this->session->userdata('email');
  $id_univ = $this->model->getUnivId_byEmail($email);
  foreach ($id_univ->result() as $key) {
    $data=array(
      "nama"=>$this->model->getUser($email)->row_array(),
      "fakultas"=>$this->model->getFakultas($key->id_univ),
      "prodi"=>$this->model->getProdiAll(),
      "getdosen"=>$this->model->getDosenId($key->id_univ)->row_array(),
      "getuniv"=>$this->model->getUnivId($key->id_univ)->row_array(),
      "kelas"=>$this->model->getKelas($id)->row_array(),
      // "getKelas"=>$this->model->getKelasId($id)->row_array(),
      "getFakultasProdi"=>$this->model->getFakultasProdi($id)->row_array(),
      // "fakultas_kelas"=>$this->model->getFakKelas($id),
      "tugas"=>$this->model->getTugas($id)->result(),
      "id_user"=>$this->model->getUser($email)->row_array(),
      "aktif"=>"user"
    );
  }
  $this->load->view('dosen/detail_kelasV',$data);
}

public function tambahTugas() {
  $id=$this->input->post('id_univ');

  $this->load->library('form_validation');
  $this->form_validation->set_rules('nama_tugas', 'nama_tugas','required');
  $this->form_validation->set_rules('tgl_mulai', 'tgl_mulai','required');
  $this->form_validation->set_rules('tgl_selesai', 'tgl_selesai','required');
  $this->form_validation->set_rules('jenis_tugas', 'jenis_tugas','required');
  $this->form_validation->set_rules('waktu', 'waktu','required');
  $this->form_validation->set_rules('status_tugas', 'status_tugas','required');
  if($this->form_validation->run() == FALSE) {
   redirect('DosenC/detailKelas/'.$id_kelas);
 }else{

   $nama_tugas =    $this->input->post('nama_tugas');
   $tgl_mulai =    $this->input->post('tgl_mulai');
   $tgl_selesai =    $this->input->post('tgl_selesai');
   $jenis_tugas =    $this->input->post('jenis_tugas');
   $waktu =    $this->input->post('waktu');
   $status_tugas =    $this->input->post('status_tugas');
   $id_kelas =    $this->input->post('id_kelas');

   $data =  array(
    "nama_tugas"=>$nama_tugas,
    "tgl_mulai"=>$tgl_mulai,
    "tgl_selesai"=>$tgl_selesai,
    "jenis_tugas"=>$jenis_tugas,
    "waktu"=>$waktu,
    "status_tugas"=>$status_tugas,
    "id_kelas"=>$id_kelas,
    "createDtm"=>date('Y-m-d H:s:i')
  );

   $result = $this->DosenM->insertTugas($data);

   if($result == TRUE)
   {

    if($jenis_tugas == "Essay"){
      $this->session->set_flashdata('sukses', 'Tugas berhasil ditambahkan.');
      redirect('DosenC/soalEssay/'.$id.'/'.$id_kelas);
    }else{
      $this->session->set_flashdata('sukses', 'Tugas berhasil ditambahkan.');
      redirect('DosenC/buatSoal/'.$id.'/'.$id_kelas);
    }
  }
  else
  {
    $this->session->set_flashdata('error', 'Tugas gagal ditambahkan.');
  }

  redirect('DosenC/detailKelas');
}
}

public function ubahTugas() {
    //get id jadwal yang ingin di edit
  $id_tugas = $this->input->post('id_tugas');
  $id=$this->input->post('id_univ');

  $this->load->library('form_validation');
  $this->form_validation->set_rules('nama_tugas', 'nama_tugas','required');
  $this->form_validation->set_rules('tgl_mulai', 'tgl_mulai','required');
  $this->form_validation->set_rules('tgl_selesai', 'tgl_selesai','required');
  $this->form_validation->set_rules('jenis_tugas', 'jenis_tugas','required');
  $this->form_validation->set_rules('status_tugas', 'status_tugas','required');
  if($this->form_validation->run() == FALSE)
  {
    redirect('DosenC/detailKelas/');
  }
  else
  {
    $nama_tugas =    $this->input->post('nama_tugas');
    $tgl_mulai =    $this->input->post('tgl_mulai');
    $tgl_selesai =    $this->input->post('tgl_selesai');
    $jenis_tugas =    $this->input->post('jenis_tugas');
    $status_tugas =    $this->input->post('status_tugas');

    $data =  array(
      "nama_tugas"=>$nama_tugas,
      "tgl_mulai"=>$tgl_mulai,
      "tgl_selesai"=>$tgl_selesai,
      "jenis_tugas"=>$jenis_tugas,
      "status_tugas"=>$status_tugas,
      "updateDtm"=>date('Y-m-d H:s:i')
    );

    $result = $this->model->editTugas($data, $id_tugas);

    if($result == TRUE)
    {
      $this->session->set_flashdata('sukses', 'Tugas berhasil diubah.');
    }
    else
    {
      $this->session->set_flashdata('error', 'Tugas gagal diubah.');
    } 

    redirect('DosenC/detailKelas/'.$id);
  }
}

public function hapusTugas($id,$id_kelas){
  if($this->model->hapusTugas($id)){
    $this->session->set_flashdata('sukses','Tugas telah dihapus!');
    redirect('DosenC/detailKelas/'.$id_kelas);
  }

}

public function tampilSoal($id)
{
  $email=$this->session->userdata('email');
  $data=array(
    "nama"=>$this->model->getUser($email)->row_array(),
    "fakultas"=>$this->model->getFakultas($id),
    "prodi"=>$this->model->getProdiAll(),
    "getdosen"=>$this->model->getDosenId($id)->row_array(),
    "getuniv"=>$this->model->getUnivId($id)->row_array(),

    // "kelas"=>$this->model->getKelas($id)->result(),
    //"tugas"=>$this->model->getTugas()->result(),
    "id_user"=>$this->model->getUser($email)->row_array(),
    "aktif"=>"user"
  );
  $this->load->view('dosen/buat_soalV', $data);
}

public function buatSoal($id,$id_kelas)
{
  $email=$this->session->userdata('email');
  $id_univ = $this->model->getUnivId_byEmail($email);
  foreach ($id_univ->result() as $key) { 
    $data=array(
      "nama"=>$this->model->getUser($email)->row_array(),
      "fakultas"=>$this->model->getFakultas($key->id_univ),
      "prodi"=>$this->model->getProdiAll(),
      "getdosen"=>$this->model->getDosenId($key->id_univ)->row_array(),
      "getuniv"=>$this->model->getUnivId($key->id_univ)->row_array(),

      "kelas"=>$this->model->getKelas($id)->result(),
      "tugas"=>$this->model->getTugasMax()->row_array(),
      "id_user"=>$this->model->getUser($email)->row_array(),
      "id_kelas"=>$id_kelas,
      "aktif"=>"user"
    );
  }
  $this->load->view('dosen/buat_soalV', $data);
}

public function soalPilgan($id_kelas,$id_tugas)
{
  $email=$this->session->userdata('email');
  $id_univ = $this->model->getUnivId_byEmail($email);
  foreach ($id_univ->result() as $key) {
    $nomor = $this->model->getNomor_byTugas($id_tugas)->num_rows();
    if($nomor == '0'){
      $nomor_soal = '1';
    } else{
      $nomor_soal = $nomor + 1;
    }

    $data=array(
      "nama"=>$this->model->getUser($email)->row_array(),
      "fakultas"=>$this->model->getFakultas($key->id_univ),
      "prodi"=>$this->model->getProdiAll(),
      "getdosen"=>$this->model->getDosenId($key->id_univ)->row_array(),
      "getuniv"=>$this->model->getUnivId($key->id_univ)->row_array(),

    // "kelas"=>$this->model->getKelas($id)->result(),
      "tugas"=>$id_tugas,
      "nomor" => $nomor_soal,
      "tugasbyID"=>$this->model->getTugasMax()->row_array(),
      "id_user"=>$this->model->getUser($email)->row_array(),
      "id_kelas"=>$id_kelas,
      "aktif"=>"user"
    );
  }
  $this->load->view('dosen/buat_soal_pilganV', $data);
}

public function soalEssay($id_kelas)
{
  $email=$this->session->userdata('email');
  $id_univ = $this->model->getUnivId_byEmail($email);
  foreach ($id_univ->result() as $key) {
    $data=array(
      "nama"=>$this->model->getUser($email)->row_array(),
      "fakultas"=>$this->model->getFakultas($key->id_univ),
      "prodi"=>$this->model->getProdiAll(),
      "getdosen"=>$this->model->getDosenId($key->id_univ)->row_array(),
      "getuniv"=>$this->model->getUnivId($key->id_univ)->row_array(),

    // "kelas"=>$this->model->getKelas($id)->result(),
      "tugas"=>$this->model->getTugasMax()->row_array(),
      "id_user"=>$this->model->getUser($email)->row_array(),
      "id_kelas"=>$id_kelas,
      "aktif"=>"user"
    );
  }
  $this->load->view('dosen/buat_soal_essayV', $data);
}

public function tambahSoalEssay() { 
  //get id jadwal yang ingin di edit
  $id_tugas=$this->input->post('id_tugas');
  $id_kelas=$this->input->post('id_kelas');

  $this->load->library('form_validation');
  $this->form_validation->set_rules('keterangan', 'keterangan','required');
  if($this->form_validation->run() == FALSE) {
    $this->session->set_flashdata('error', 'File gagal diunggah!');
    redirect('DosenC/tampilSoal/'.$id_tugas);
  }else{

    $keterangan =    $this->input->post('keterangan');

  $config['upload_path'] = FCPATH.'file_upload'; //path folder
  $config['allowed_types'] = "pdf|zip|rar"; //type yang dapat diakses bisa anda sesuaikan
  $config['overwrite'] = TRUE;
  $config['max_size'] = 5048;
  $config['remove_spaces'] = TRUE;

  $this->load->library('upload');
  $this->upload->initialize($config);

  $this->upload->do_upload('file_soal');
  $file_soal = $this->upload->data('file_name');

  $data =  array(
    "keterangan"=>$keterangan,
    "path_file"=>$file_soal,
    "id_tugas"=>$id_tugas,
    "createDtm"=>date('Y-m-d H:s:i')
  );

  $result = $this->model->insertSoalEssay($data);

  if($result == TRUE)
  {
    $this->session->set_flashdata('sukses', 'Soal berhasil ditambahkan');
  }
  else
  {
    $this->session->set_flashdata('error', 'Soal gagal ditambahkan');
  }

  redirect('DosenC/');
}
}

public function tambahSoalPilgan($id_kelas) { 
  //get id jadwal yang ingin di edit
  $id_tugas=$this->input->post('id_tugas');

  $this->load->library('form_validation');
  $this->form_validation->set_rules('soal_pilgan', 'soal_pilgan','required');
  $this->form_validation->set_rules('pil_a', 'pil_a','required');
  $this->form_validation->set_rules('pil_b', 'pil_b','required');
  $this->form_validation->set_rules('pil_c', 'pil_c');
  $this->form_validation->set_rules('pil_d', 'pil_d');
  $this->form_validation->set_rules('pil_e', 'pil_e');
  $this->form_validation->set_rules('kunci', 'kunci','required');
  if($this->form_validation->run() == FALSE) {
    $this->session->set_flashdata('error', 'File gagal diunggah!');
    redirect('DosenC/tampilSoal/'.$id_tugas);
  }else{

    $soal_pilgan =    $this->input->post('soal_pilgan');
    $pil_a =    $this->input->post('pil_a');
    $pil_b =    $this->input->post('pil_b');
    $pil_c =    $this->input->post('pil_c');
    $pil_d =    $this->input->post('pil_d');
    $pil_e =    $this->input->post('pil_e');
    $kunci =    $this->input->post('kunci');

  $config['upload_path'] = FCPATH.'gambar/gambar_pilgan'; //path folder
  $config['allowed_types'] = "jpg|png|jpeg"; //type yang dapat diakses bisa anda sesuaikan
  $config['overwrite'] = TRUE;
  $config['max_size'] = 3072;
  $config['remove_spaces'] = TRUE;

  $this->load->library('upload');
  $this->upload->initialize($config);

  $this->upload->do_upload('gambar');
  $gambar = $this->upload->data('file_name');

  // if(empty($pil_c)){
  //   $pil_c = "-";
  // }
  // if(empty($pil_d)){
  //   $pil_d = "-";
  // }
  // if(empty($pil_e)){
  //   $pil_e = "-";
  // }

  $data =  array(
    "soal_pilgan"=>$soal_pilgan,
    "gambar"=>$gambar,
    "pil_a"=>$pil_a,
    "pil_b"=>$pil_b,
    "pil_c"=>$pil_c,
    "pil_d"=>$pil_d,
    "pil_e"=>$pil_e,
    "kunci"=>$kunci,
    "id_tugas"=>$id_tugas,
    "createDtm"=>date('Y-m-d H:s:i')
  );

  $result = $this->model->insertSoalPilgan($data);

  if($result == TRUE)
  {
    $this->session->set_flashdata('sukses', 'Soal berhasil ditambahkan');
  }
  else
  {
    $this->session->set_flashdata('error', 'Soal gagal ditambahkan');
  }

  redirect('DosenC/soalPilgan/'.$id_kelas.'/'.$id_tugas);
}
}

  //IMPORT EXCEL
public function importexcel(){
  $this->load->helper('file');
  $fileName = time().$_FILES['file']['name'];

        $config['upload_path'] = './berkas'; //buat folder dengan nama assets di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if(! $this->upload->do_upload('file') )
          $this->upload->display_errors();

        $media = $this->upload->data('file');
        $inputFileName = './berkas/'.$fileName;

        try {
          $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
          $objReader = PHPExcel_IOFactory::createReader($inputFileType);
          $objPHPExcel = $objReader->load($inputFileName);
        } catch(Exception $e) {
          die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $judul = $sheet->rangeToArray('A' . 1 . ':' . $highestColumn . 1,NULL,TRUE,FALSE);
        // $barangDitolak = array();
        // $barangDiterima = array();
        $tolak = 0;
        $terima = 0;
        unlink($inputFileName);
        $jum=0;
        if ($judul[0][0]=="Soal*" OR $judul[0][0] == "Soal") {
           $id_tugas=$this->input->post('id_tugas');
              for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                  NULL,
                  TRUE,
                  FALSE);
               
                //memanggil id kategori dari database sesuai kategori
                // $kategori = $rowData[0][7];
                // print_r($rowData[0][8]);
                // $query = $this->model->getIdKat($kategori);
                // foreach ($query->result_array() as $id_kategori) {
                //Sesuaikan sama nama kolom tabel di database                                
                  // print_r($id_kategori['id_kategori']);
                  // if($rowData[0][6] == 0){
                    $dataSoal = array(
                      "soal_pilgan" => $rowData[0][0],
                      "pil_a" => $rowData[0][1],
                      "pil_b" => $rowData[0][2],
                      "pil_c" => $rowData[0][3],
                      "pil_d" => $rowData[0][4],
                      "pil_e" => $rowData[0][5],
                      "kunci" => $rowData[0][6],
                      "id_tugas" => $id_tugas,
                      "createDtm"=>date('Y-m-d H:s:i')
                    );
                  // } elseif($rowData[0][6] > 0){
                    // $dataBarang = array(
                    //   "nama_barang" => $rowData[0][0],
                    //   "harga_barang" => $rowData[0][1],
                    //   "ukuran" => $rowData[0][2],
                    //   "bahan" => $rowData[0][3],
                    //   "deskripsi" => $rowData[0][4],
                    //   "berat" => $rowData[0][5],
                    //   "stok" => $rowData[0][6],
                    //   "status_barang" => "Tersedia",
                    //   "id_kategori" => $id_kategori['id_kategori'],
                    // );
                  // }
                  // $barang=$rowData[0][0];
                  // $cekBarang = $this->db->query("SELECT * from barang where nama_barang = '$barang'")->num_rows();

                  // if($cekBarang > 0){
                  // //jika nama desa sudah ada
                  //   array_push($barangDitolak, $rowData[0][0], $rowData[0][1]);
                  // }else{
                  // //jika nama desa belum ada
                  //   array_push($barangDiterima, $rowData[0][0], $rowData[0][1]);
                  // //sesuaikan nama dengan nama tabel
                    $insert = $this->db->insert("soal_pilgan",$dataSoal);
                    // print_r($rowData[0][0]);  exit();
                    // $terima++;
                  // }
                // }

                delete_files($media['file_path']);
                // $jum++;

              }
              $highestRow--;
                $this->session->set_flashdata('sukses','Import data berhasil! Isikan gambar untuk melengkapi!');
              // $pesan = "(".$terima." data berhasil dimasukan dari total ".$highestRow." data!)";
              // $this->session->set_flashdata('success', $pesan);
          }else{
            // $pesanerror = "('Gagal import excel, Kolom tidak sesuai!')";
            // $this->session->set_flashdata('error', $pesanerror);
            $this->session->set_flashdata('error','Gagal import excel, Kolom tidak sesuai!');
          }
          redirect('DosenC');
      }

public function tampilSoalPilgan($id)
{
  $email=$this->session->userdata('email');
  $nomor=0;

  $data=array(
    "nomor" => $nomor,
    "soal"=>$this->model->getSoalPilgan($id)->result(),
    "aktif"=>"user"
  );

  $this->load->view('dosen/soal_pilganV',$data);
}

public function hapusSoalPilgan($id_soal_pilgan,$id_tugas){
  if($this->model->hapusSoalPilgan($id_soal_pilgan)){
    $this->session->set_flashdata('sukses','Soal telah dihapus!');
    redirect('DosenC/tampilSoalPilgan/'.$id_tugas);
  }

}

public function editSoalPilgan($id)
{
  $email=$this->session->userdata('email');
  $id_univ = $this->model->getUnivId_byEmail($email);
  $nomor = $this->input->post('nomor');
  foreach ($id_univ->result() as $key) {
    $data=array(
      "nama"=>$this->model->getUser($email)->row_array(),
      "fakultas"=>$this->model->getFakultas($key->id_univ),
      "prodi"=>$this->model->getProdiAll(),
      "getdosen"=>$this->model->getDosenId($key->id_univ)->row_array(),
      "getuniv"=>$this->model->getUnivId($key->id_univ)->row_array(),
      "nomor" => $nomor,
      "soal"=>$this->model->getSoalPilgan1($id)->row_array(),
      "aktif"=>"user"
    );
  }

  $this->load->view('dosen/edit_soal_pilganV',$data);
}

}
