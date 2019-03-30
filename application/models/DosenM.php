<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DosenM extends CI_Model{

	function __construct(){
    parent:: __construct();
    $this->load->database(); 
  }

  //untuk mengambil email sesuai yg login 
  public function getUser($email){
    $q = $this->db->query("
      SELECT u.id_user, nama_depan, nama_belakang, email, foto_profil, un.nama_univ, d.id_dosen, d.nip, u.id_userrole FROM user u 
      LEFT JOIN universitas un on u.id_univ=un.id_univ 
      LEFT JOIN dosen d on u.id_user = d.id_user 
      WHERE u.email='$email'
      ");
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

    //untuk menghapus data kelas
  public function hapusPengumuman($id_pengumuman){
    $q = $this->db->delete('pengumuman', "id_pengumuman=$id_pengumuman");
    return $q;
  }
    //untuk mengambil id_dosen
  public function getIdDosen($id_user){
    $q = $this->db->query("SELECT id_dosen FROM dosen d, user u WHERE d.id_user=u.id_user AND u.id_user='$id_user'");
    return $q;
  }

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
  public function getKelas($id_kelas){
    $q = $this->db->query("SELECT * from kelas k, dosen d, user u WHERE u.id_user=d.id_user AND k.id_dosen=d.id_dosen AND k.id_kelas=$id_kelas");
    return $q;
  }

    //untuk menampilkan data kelas
  public function getKelasAktif($id_user){
    $q = $this->db->query("SELECT * from kelas k, dosen d, user u WHERE u.id_user=d.id_user AND k.id_dosen=d.id_dosen AND k.status_kelas='Aktif' AND u.id_user=$id_user");
    return $q;
  }

    //untuk menampilkan data kelas
  public function getKelasNonAktif($id_user){
    $q = $this->db->query("SELECT * from kelas k, dosen d, user u WHERE u.id_user=d.id_user AND k.id_dosen=d.id_dosen AND k.status_kelas='Tidak Aktif' AND u.id_user=$id_user");
    return $q;
  }

  //untuk menampilkan data kelas berdasarkan id_user
  public function getKelas_byUser($id_user){
    $q = $this->db->query("SELECT * from kelas k, dosen d, user u WHERE u.id_user=d.id_user AND k.id_dosen=d.id_dosen AND u.id_user=$id_user");
    return $q;
  }

  public function getIdUniv($id_univ){
    $q = $this->db->query("SELECT id_univ from user WHERE id_univ=$id_univ");
    return $q;
  }

  public function getDetailId($nama_fakultas,$nama_prodi){
    $q = $this->db->query("SELECT id_det_fakultasprodi FROM fakultas f, detail_fakultasprodi det, prodi p WHERE det.id_fakultas=f.id_fakultas AND det.id_prodi=p.id_prodi AND f.id_fakultas=$nama_fakultas AND p.id_prodi=$nama_prodi");
    return $q;
  }

  public function getFakultas($id_user){
    $q = $this->db->query("SELECT * FROM user u, universitas un, detail_univfakultas det, fakultas f WHERE u.id_univ=un.id_univ AND un.id_univ=det.id_univ AND det.id_fakultas=f.id_fakultas AND u.id_user=$id_user");
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
  public function hapusTugas($id_tugas){
    $q = $this->db->delete('tugas', "id_tugas=$id_tugas");
    return $q;
  }

    //untuk menghapus data tugas
  public function hapusAnggota($id){
    $q = $this->db->delete('kelas_mhs', "id_kelas_mhs=$id");
    return $q;
  }

    //untuk menghapus data tugas
  public function hapusMateri($id_materi){
    $q = $this->db->delete('materi', "id_materi=$id_materi");
    return $q;
  }

    //untuk edit profil user
  public function ubahMateri($data,$id_materi){
    $this->db->where('id_materi',$id_materi);
    $this->db->update('materi',$data);
    return true;
  }

  // public function getTugas($id){
  //     $q = $this->db->query("SELECT * FROM kelas k, tugas t WHERE k.id_kelas=t.id_kelas AND k.id_kelas=$id");
  //       return $q;
  //   }

  public function getTugas($id_kelas){
    $q = $this->db->query("SELECT * FROM user u, dosen d, kelas k, tugas t WHERE u.id_user=d.id_user AND d.id_dosen=k.id_dosen AND k.id_kelas=t.id_kelas AND k.id_kelas=$id_kelas");
    return $q;
  }

    public function getMateri($id_kelas){
    $q = $this->db->query("SELECT * FROM user u, dosen d, kelas k, materi m WHERE u.id_user=d.id_user AND d.id_dosen=k.id_dosen AND k.id_kelas=m.id_kelas AND k.id_kelas=$id_kelas");
    return $q;
  }

  public function getAnggota($id_kelas){
    $q = $this->db->query("SELECT * FROM user u, mahasiswa m, kelas k, kelas_mhs km WHERE u.id_user=m.id_user AND m.id_mhs=km.id_mhs AND k.id_kelas=km.id_kelas AND k.id_kelas=$id_kelas");
    return $q;
  }

  public function getKelasId($id){
    $q = $this->db->query("SELECT * from kelas WHERE id_kelas=$id");
    return $q;
  }

  public function getFakultasProdi($id_kelas){
    $q = $this->db->query("SELECT * FROM fakultas f, detail_fakultasprodi det, prodi p, kelas k WHERE det.id_fakultas=f.id_fakultas AND det.id_prodi=p.id_prodi AND k.id_det_fakultasprodi=det.id_det_fakultasprodi AND k.id_kelas=$id_kelas");
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

  // //untuk menampilkan data kelas berdasarkan id_user
  // public function getPengumuman($id_user){
  //   $q = $this->db->query("SELECT *, p.createDtm AS createDtm from pengumuman p, kelas k, dosen d, user u WHERE p.id_kelas=k.id_kelas AND u.id_user=d.id_user AND k.id_dosen=d.id_dosen AND u.id_user=$id_user ORDER BY id_pengumuman DESC");
  //   return $q;
  // }

    //untuk menampilkan data pengumuman sesuai kelas
  public function getPengumuman($id_kelas){
    $q = $this->db->query("SELECT *, p.createDtm AS createDtm from pengumuman p, kelas k, dosen d, user u WHERE p.id_kelas=k.id_kelas AND k.id_dosen=d.id_dosen AND d.id_user=u.id_user AND k.id_kelas=$id_kelas ORDER BY p.createDtm DESC");
    return $q;
  }

  public function insertData($data){
    $this->db->insert('soal_pilgan',$data);
    return TRUE;
  }

  public function getDaftarNilaiPilgan($id){
    $q = $this->db->query("SELECT t.nama_tugas, n.id_nilai, n.nilai, m.nim, u.nama_depan, u.nama_belakang, t.id_tugas
      from nilai n
      right join tugas t on t.id_tugas = n.id_tugas
      join mahasiswa m on m.id_mhs = n.id_mhs
      join user u on u.id_user = m.id_user
      WHERE t.id_tugas ='$id'");
    return $q;
  }

  public function getDaftarNilaiEssay($id){
    // return $this->db
    // ->select('t.nama_tugas, n.nilai, m.nim, u.nama_depan, u.nama_belakang, t.id_tugas, je.jawaban, je.path_file, je.id_jawaban_essay')
    // ->from('nilai n')
    // ->join('tugas t', 't.id_tugas = n.id_tugas', 'right')
    // ->join('soal_essay se', 'se.id_tugas = t.id_tugas')
    // ->join('jawaban_essay je', 'je.id_soal_essay = se.id_soal_essay')
    // ->join('mahasiswa m', 'm.id_mhs = je.id_mhs')
    // // ->join('mahasiswa m', 'm.id_mhs = n.id_mhs')
    // ->join('user u', 'u.id_user = m.id_user') 
    // ->where('t.id_tugas', $id)
    // ->get();
    $q = $this->db->query("SELECT t.nama_tugas, n.id_nilai, n.nilai, m.nim, u.nama_depan, u.nama_belakang, t.id_tugas, je.id_jawaban_essay
      from nilai n
      right join tugas t on t.id_tugas = n.id_tugas
      join soal_essay se on se.id_tugas = t.id_tugas
      join jawaban_essay je on je.id_soal_essay = se.id_soal_essay
      join mahasiswa m on m.id_mhs = je.id_mhs
      join user u on u.id_user = m.id_user
      WHERE t.id_tugas ='$id'");
    return $q;
  }

  public function getEssayBelum($id){
    // return $this->db
    // ->select('t.nama_tugas, n.nilai, m.nim, u.nama_depan, u.nama_belakang, t.id_tugas')
    // ->from('nilai n')
    // ->join('tugas t', 't.id_tugas = n.id_tugas', 'right')
    // ->join('soal_essay se', 'se.id_tugas = t.id_tugas')
    // ->join('jawaban_essay je', 'je.id_soal_essay = se.id_soal_essay')
    // ->join('mahasiswa m', 'm.id_mhs = je.id_mhs')
    // ->join('user u', 'u.id_user = m.id_user')
    // ->where('t.id_tugas', $id)
    // ->where('n.nilai = ""')
    // ->get();
    $q = $this->db->query("SELECT t.nama_tugas, n.nilai, m.nim, u.nama_depan, u.nama_belakang, t.id_tugas, je.jawaban, je.path_file, je.id_jawaban_essay
      from nilai n
      right join tugas t on t.id_tugas = n.id_tugas
      join mahasiswa m on m.id_mhs = n.id_mhs
      join soal_essay se on se.id_tugas = t.id_tugas
      join jawaban_essay je on je.id_soal_essay = se.id_soal_essay AND m.id_mhs = je.id_mhs
      join user u on u.id_user = m.id_user
      WHERE t.id_tugas = '$id' AND n.nilai =''");
    return $q;
  }

  public function getEssaySudah($id){
    // return $this->db
    // ->select('t.nama_tugas, n.nilai, m.nim, u.nama_depan, u.nama_belakang, t.id_tugas')
    // ->from('nilai n')
    // ->join('tugas t', 't.id_tugas = n.id_tugas', 'right')
    // ->join('soal_essay se', 'se.id_tugas = t.id_tugas')
    // ->join('jawaban_essay je', 'je.id_soal_essay = se.id_soal_essay')
    // ->join('mahasiswa m', 'm.id_mhs = je.id_mhs')
    // ->join('user u', 'u.id_user = m.id_user')
    // ->where('t.id_tugas', $id)
    // ->where('n.nilai != ""')
    // ->get();
    $q = $this->db->query("SELECT t.nama_tugas, n.nilai, m.nim, u.nama_depan, u.nama_belakang, t.id_tugas, je.jawaban, je.path_file, je.id_jawaban_essay
      from nilai n
      right join tugas t on t.id_tugas = n.id_tugas
      join mahasiswa m on m.id_mhs = n.id_mhs
      join soal_essay se on se.id_tugas = t.id_tugas
      join jawaban_essay je on je.id_soal_essay = se.id_soal_essay AND m.id_mhs = je.id_mhs
      join user u on u.id_user = m.id_user
      WHERE t.id_tugas = '$id' AND n.nilai !=''");
    return $q;
  }

  public function getKetSoalbyIdTugas($id){
    $query = $this->db->query("SELECT * FROM tugas t, kelas k, dosen d, user u WHERE t.id_kelas=k.id_kelas AND k.id_dosen=d.id_dosen AND d.id_user=u.id_user AND t.id_tugas='$id'");
    return $query;
  }

  public function getSoalEssay($id){
    $query = $this->db->query("SELECT * FROM soal_essay s, tugas t WHERE s.id_tugas=t.id_tugas AND t.id_tugas = '$id'");
    return $query;
  }

  public function getJawabanEssay($id){
    return $this->db
    ->select('je.id_jawaban_essay, je.jawaban, je.path_file, je.id_mhs, t.id_tugas, u.nama_depan, u.nama_belakang, m.nim')
    ->from('jawaban_essay je')
    ->join('soal_essay se', 'se.id_soal_essay = je.id_soal_essay', 'left')
    ->join('tugas t', 't.id_tugas = se.id_tugas')
    ->join('mahasiswa m', 'm.id_mhs = je.id_mhs')
    ->join('user u', 'u.id_user = m.id_user')
    ->where('je.id_jawaban_essay', $id)
    ->get();
  }

  public function getNilaibyId($id){
    $q = $this->db->query("SELECT t.nama_tugas, n.id_nilai, n.nilai, m.nim, u.nama_depan, u.nama_belakang, t.id_tugas, je.id_jawaban_essay
      from nilai n
      right join tugas t on t.id_tugas = n.id_tugas
      join soal_essay se on se.id_tugas = t.id_tugas
      join jawaban_essay je on je.id_soal_essay = se.id_soal_essay
      join mahasiswa m on m.id_mhs = je.id_mhs
      join user u on u.id_user = m.id_user
      WHERE n.nilai ='$id'");
    return $q;
  }

    //untuk menambah data pengumuman
  public function insertNilai($data){
    $this->db->trans_start();

    $this->db->insert('nilai',$data);
    $insert_id = $this->db->insert_id();
    
    $this->db->trans_complete();
    return $insert_id;    
  }

    public function editNilaiEssay($data,$id_nilai){
    $this->db->where("id_nilai",$id_nilai);
    $this->db->update("nilai",$data);
    return true;
  }

  public function daftarMahasiswa($id_kelas){
    $query = $this->db->query("SELECT km.id_kelas_mhs, u.nama_depan, u.nama_belakang, m.nim FROM kelas_mhs km left JOIN mahasiswa m on m.id_mhs=km.id_mhs JOIN user u on u.id_user=m.id_user JOIN kelas k on k.id_kelas=km.id_kelas WHERE k.id_kelas=$id_kelas");
    return $query;
  }

    //untuk menambah data tugas
  public function insertMateri($data){
    $this->db->trans_start();

    $this->db->insert('materi',$data);
    $insert_id = $this->db->insert_id();
    
    $this->db->trans_complete();
    return $insert_id;    
  }
}
?>