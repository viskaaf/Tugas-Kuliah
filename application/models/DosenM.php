<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DosenM extends CI_Model{

	function __construct(){
    parent:: __construct();
    $this->load->database();
  }

  //untuk mengambil email sesuai yg login
  public function getUser($email){
    $q = $this->db->query("SELECT * from user u, universitas un WHERE u.id_univ=un.id_univ AND u.email='$email'");
    return $q;
  }

  //================================== EDIT PROFIL ==================================
  //untuk edit profil user
  public function ubahUser($dataUser,$id_user){
    $this->db->where('id_user',$id_user);
    $this->db->update('user',$dataUser);
    return true;
  }

  //untuk edit di tabel dosen
  public function ubahDosen($nip,$id_user){
    $cekNip = $this->db->query("SELECT * FROM dosen WHERE id_user = '$id_user' LIMIT 1")->result();

    if(!empty($cekNip)){
      $dataDosen = array(
        'nip' =>$nip,
      ); 
      $this->db->where('id_user',$id_user);
      $this->db->update('dosen',$dataDosen);
    } elseif(empty($cekNip)){
      $dataDosen = array(
        'nip' =>$nip,
        'id_user' =>$id_user
      );
      $this->db->insert('dosen',$dataDosen);
    }
    return true;
  }

  //untuk cek password lama
  public function cekPassword($passlama, $email)
  {
    $cekPass = $this->db->query("SELECT password FROM user WHERE password='$passlama' AND email='$email'");
    return $cekPass->result();
  }

  //untuk mereset password
  public function resetPassword($dataPassword,$id_user){
    $this->db->where('id_user',$id_user);
    $this->db->update('user',$dataPassword);
    return true;
  }

  //untuk mengambil data user
  public function getUser1($id){
    $q = $this->db->query("
      SELECT u.id_user, nama_depan, nama_belakang, jenis_kelamin, email, id_userrole, u.id_univ, nama_univ, foto_profil, nip  
      FROM user u
      JOIN universitas un on u.id_univ = un.id_univ AND u.id_user='$id'
      LEFT JOIN dosen d on u.id_user = d.id_user 
      ");

    return $q;
  }

  public function getUniv(){
    return $this->db->get("universitas")->result();
  }

  public function getUnivDosen($id){
      return $this->db->query("SELECT un.id_univ, un.nama_univ FROM user u, universitas un WHERE u.id_univ=un.id_univ AND u.id_user='$id'")->result();
}
  //=================================================================================


  //================================== DATA KELAS ==================================
  //untuk menambah data kelas
  public function insertKelas($data){
    $this->db->trans_start();

    $this->db->insert('kelas',$data);
    $insert_id = $this->db->insert_id();
    
    $this->db->trans_complete();
    return $insert_id;    
  }

  //untuk mengubah data kelas
  public function editKelas($data,$id_kelas){
    $this->db->where("id_kelas",$id_kelas);
    $this->db->update("kelas",$data);
    return true;
  }

  //untuk menghapus data kelas
  public function hapusKelas($id){
    $q = $this->db->delete('kelas', "id_kelas=$id");
    return $q;
  }

  //untuk menampilkan data kelas
  public function getKelas($id){
    $q = $this->db->query("SELECT * from kelas k, dosen d, user u WHERE u.id_user=d.id_user AND k.id_dosen=d.id_dosen AND k.id_kelas=$id");
    return $q;
  }

  //untuk menampilkan data kelas berdasarkan id_user
  public function getKelas_byUser($id){
    $q = $this->db->query("SELECT * from kelas k, dosen d, user u WHERE u.id_user=d.id_user AND k.id_dosen=d.id_dosen AND u.id_user=$id");
    return $q;
  }

  //untuk mengambil id dosen sesuai dengan user (dengan user_role=dosen) yg login
  public function getDosenId($id){
    $q = $this->db->query("SELECT id_dosen from dosen WHERE id_user=$id");
    return $q;
  }

  public function getUnivId($id){
    $q = $this->db->query("SELECT id_univ from user WHERE id_univ=$id");
    return $q;
  }

  public function getUnivId_byEmail($email){
    $q = $this->db->query("SELECT * from user WHERE email='$email'");
    return $q;
  }

  public function getDetailId($nama_fakultas,$nama_prodi){
    $q = $this->db->query("SELECT id_det_fakultasprodi FROM fakultas f, detail_fakultasprodi det, prodi p WHERE det.id_fakultas=f.id_fakultas AND det.id_prodi=p.id_prodi AND f.id_fakultas=$nama_fakultas AND p.id_prodi=$nama_prodi");
    return $q;
  }

  public function getFakultas($id){
    $q = $this->db->query("SELECT * FROM user u, universitas un, detail_univfakultas det, fakultas f WHERE u.id_univ=un.id_univ AND un.id_univ=det.id_univ AND det.id_fakultas=f.id_fakultas AND u.id_univ=$id");
    return $q->result();
  }

  public function getProdi($id){
    $q = $this->db->query("SELECT * FROM fakultas f, detail_fakultasprodi det, prodi p WHERE det.id_fakultas=f.id_fakultas AND det.id_prodi=p.id_prodi AND det.id_fakultas=$id");
    return $q;
  }

  public function getProdiAll(){
    $q = $this->db->query("SELECT * FROM fakultas f, detail_fakultasprodi det, prodi p WHERE det.id_fakultas=f.id_fakultas AND det.id_prodi=p.id_prodi");
    return $q;
  }

  public function getFakKelas($id){
      return $this->db->query("SELECT det.id_det_fakultasprodi, nama_fakultas FROM fakultas f, detail_fakultasprodi det, prodi p, kelas k WHERE det.id_fakultas=f.id_fakultas AND det.id_prodi=p.id_prodi AND det.id_det_fakultasprodi=k.id_det_fakultasprodi AND k.id_det_fakultasprodi=$id")->result();
}
  //=================================================================================

  //================================== DATA TUGAS ==================================
  //untuk menambah data tugas
  public function insertTugas($data){
    $this->db->trans_start();

    $this->db->insert('tugas',$data);
    $insert_id = $this->db->insert_id();
    
    $this->db->trans_complete();
    return $insert_id;    
  }

  public function editTugas($data,$id_tugas){
    $this->db->where("id_tugas",$id_tugas);
    $this->db->update("tugas",$data);
    return true;
  }

  //untuk menghapus data tugas
  public function hapusTugas($id){
    $q = $this->db->delete('tugas', "id_tugas=$id");
    return $q;
  }

  // public function getTugas($id){
  //     $q = $this->db->query("SELECT * FROM kelas k, tugas t WHERE k.id_kelas=t.id_kelas AND k.id_kelas=$id");
  //       return $q;
  //   }

  public function getTugas($id){
      $q = $this->db->query("SELECT * FROM user u, dosen d, kelas k, tugas t WHERE u.id_user=d.id_user AND d.id_dosen=k.id_dosen AND k.id_kelas=t.id_kelas AND k.id_kelas=$id");
        return $q;
    }

  public function getKelasId($id){
      $q = $this->db->query("SELECT * from kelas WHERE id_kelas=$id");
        return $q;
    }

  public function getFakultasProdi($id){
      $q = $this->db->query("SELECT * FROM fakultas f, detail_fakultasprodi det, prodi p, kelas k WHERE det.id_fakultas=f.id_fakultas AND det.id_prodi=p.id_prodi AND k.id_det_fakultasprodi=det.id_det_fakultasprodi AND k.id_kelas=$id");
        return $q;
    }
  //=================================================================================

  // //untuk menampilkan data kelas
  // public function getTugas(){
  //   $q = $this->db->query("SELECT * from tugas");
  //   return $q;
  // }

  //untuk menambah data soal essay
  public function insertSoalEssay($data){
    $this->db->trans_start();

    $this->db->insert('soal_essay',$data);
    $insert_id = $this->db->insert_id();
    
    $this->db->trans_complete();
    return $insert_id;    
  }

  //untuk menambah data soal pilgan
  public function insertSoalPilgan($data){
    $this->db->trans_start();

    $this->db->insert('soal_pilgan',$data);
    $insert_id = $this->db->insert_id();
    
    $this->db->trans_complete();
    return $insert_id;    
  }

  public function getNomor_byTugas($id){
    $query = $this->db->query("SELECT * FROM soal_pilgan WHERE id_tugas = '$id'");
    return $query;
  }

  public function getTugasMax(){
    $query = $this->db->query("SELECT MAX(id_tugas) AS id_tugas FROM tugas");
    return $query;
  }
  
  public function getSoalPilgan($id){
    $query = $this->db->query("SELECT * FROM soal_pilgan s, tugas t WHERE s.id_tugas=t.id_tugas AND t.id_tugas = '$id'");
    return $query;
  }

  public function getSoalPilgan1($id){
    $query = $this->db->query("SELECT * FROM soal_pilgan WHERE id_soal_pilgan = '$id'");
    return $query;
  }

  //untuk menghapus data tugas
  public function hapusSoalPilgan($id_soal_pilgan){
    $q = $this->db->delete('soal_pilgan', "id_soal_pilgan=$id_soal_pilgan");
    return $q;
  }

  //untuk menambah data pengumuman
  public function insertPengumuman($data){
    $this->db->trans_start();

    $this->db->insert('pengumuman',$data);
    $insert_id = $this->db->insert_id();
    
    $this->db->trans_complete();
    return $insert_id;    
  }

  //untuk menampilkan data kelas berdasarkan id_user
  public function getPengumuman($id){
    $q = $this->db->query("SELECT *, p.createDtm AS createDtm from pengumuman p, kelas k, dosen d, user u WHERE p.id_kelas=k.id_kelas AND u.id_user=d.id_user AND k.id_dosen=d.id_dosen AND u.id_user=$id ORDER BY id_pengumuman DESC");
    return $q;
  }

  public function insertData($data){
    $this->db->insert('soal_pilgan',$data);
    return TRUE;
  }

  public function getJawabanEssay($id){
    $query = $this->db->query("SELECT * FROM tugas t, soal_essay se, jawaban_essay je WHERE t.id_tugas=se.id_tugas AND se.id_soal_essay=je.id_soal_essay AND t.id_tugas='$id';");
    return $query;
  }

  public function getKetSoalbyIdTugas($id){
    $query = $this->db->query("SELECT * FROM tugas t, kelas k, dosen d, user u WHERE t.id_kelas=k.id_kelas AND k.id_dosen=d.id_dosen AND d.id_user=u.id_user AND t.id_tugas='$id'");
    return $query;
  }

    public function getSoalEssay($id){
    $query = $this->db->query("SELECT * FROM soal_essay s, tugas t WHERE s.id_tugas=t.id_tugas AND t.id_tugas = '$id'");
    return $query;
  }
}
?>