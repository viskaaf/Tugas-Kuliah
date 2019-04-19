<?php
class AdminM extends CI_Model{

  function __construct(){
    parent:: __construct();
    $this->load->database();
  }

  //ini untuk nanti ruangan
  public function getUniversitas(){
    $q = $this->db->query("SELECT * from universitas");
    return $q;
  }

  public function insertUniversitas($data){
    $this->db->trans_start();

    $this->db->insert('universitas',$data);
    $insert_id = $this->db->insert_id();
    
    $this->db->trans_complete();
    return $insert_id;     
  }

  public function editUniversitas($data,$id_univ){
    $this->db->where("id_univ",$id_univ);
    $this->db->update("universitas",$data);
    return true;
  }

  public function getUnivId($id_univ){
    $q = $this->db->query("SELECT * from universitas WHERE id_univ=$id_univ");
    return $q;
  }

  public function getFakultas($id_univ){
    $q = $this->db->query("SELECT * FROM universitas un, detail_univfakultas det, fakultas f WHERE det.id_univ=un.id_univ AND det.id_fakultas=f.id_fakultas AND un.id_univ=$id_univ");
    return $q;
  }

  public function insertFakultas($data){
    $this->db->trans_start();

    $this->db->insert('fakultas',$data);
    $insert_id = $this->db->insert_id();
    
    $this->db->trans_complete();
    return $insert_id;     
  }

  public function insertDetUnivFakultas($data1){
    $this->db->trans_start();

    $this->db->insert('detail_univfakultas',$data1);
    $insert_id = $this->db->insert_id();
    
    $this->db->trans_complete();
    return $insert_id; 
  }

  public function editFakultas($data,$id_fakultas){
    $this->db->where("id_fakultas",$id_fakultas);
    $this->db->update("fakultas",$data);
    return true;
  }

  public function getFakultasId($id_fakultas){
    $q = $this->db->query("SELECT * from fakultas WHERE id_fakultas=$id_fakultas");
    return $q;
  }

  public function getProdi($id_fakultas){
    $q = $this->db->query("SELECT * FROM fakultas f, detail_fakultasprodi det, prodi p WHERE det.id_fakultas=f.id_fakultas AND det.id_prodi=p.id_prodi AND f.id_fakultas=$id_fakultas");
    return $q;
  }

  public function insertProdi($data){
    $this->db->trans_start();

    $this->db->insert('prodi',$data);
    $insert_id = $this->db->insert_id();
    
    $this->db->trans_complete();
    return $insert_id;     
  }

  public function insertDetFakultasProdi($data1){
    $this->db->trans_start();

    $this->db->insert('detail_fakultasprodi',$data1);
    $insert_id = $this->db->insert_id();
    
    $this->db->trans_complete();
    return $insert_id; 
  }

  public function editProdi($data,$id_prodi){
    $this->db->where("id_prodi",$id_prodi);
    $this->db->update("prodi",$data);
    return true;
  }

  public function getDosen(){
    $q = $this->db->query("SELECT * from user u, universitas un, user_role ur, dosen d WHERE u.id_userrole=ur.id_userrole AND u.id_univ=un.id_univ AND u.id_user=d.id_user AND ur.id_userrole=1");
    return $q;
  }

  public function tambahDosen($data){
    $this->db->trans_start();

    $this->db->insert('user',$data);
    $insert_id = $this->db->insert_id();
    
    $this->db->trans_complete();
    return $insert_id;    
  }

  public function getDetailDosen($id_user){
    $q = $this->db->query("SELECT * from user u, user_role ur, dosen d WHERE u.id_userrole=ur.id_userrole AND u.id_user=d.id_user AND u.id_user='$id_user'");
    return $q;
  }

    //untuk mengubah data kelas
  public function editUser($data,$id_user){
    $this->db->where("id_user",$id_user);
    $this->db->update("user",$data);
    return true;
  }

    // ubah status pembelian menjadi Sudah Dikonfirmasi
  public function nonaktifAkun($id_user){
    $hasil = $this->db->query("UPDATE user SET status = 'Belum Aktif' WHERE id_user = $id_user");
    return $hasil;
  }

    // Query memanggil email untuk mengirim email pemberitahuan
  public function getEmail($id_user){
    $query = $this->db->query("
      SELECT email 
      FROM user
      WHERE id_user = '$id_user'
      ");
    return $query;
  }

    //VERIFIKASI EMAIL
  public function changeActiveState($id_user){
    $data = array(
      'status' => 'Aktif'
    );

    $this->db->where('id_user', $id_user);
    $this->db->update('user', $data);

    return true;
  }


  public function getMahasiswa(){
    $q = $this->db->query("SELECT * from user u, universitas un, user_role ur, mahasiswa m WHERE u.id_userrole=ur.id_userrole AND u.id_univ=un.id_univ AND u.id_user=m.id_user AND ur.id_userrole=2");
    return $q;
  }

  public function getKelas(){
    $q = $this->db->query("SELECT * from user u, dosen d, kelas k, detail_fakultasprodi df, fakultas f, prodi p WHERE u.id_user=d.id_user AND d.id_dosen=k.id_dosen AND k.id_det_fakultasprodi=df.id_det_fakultasprodi AND df.id_fakultas=f.id_fakultas AND df.id_prodi=p.id_prodi");
    return $q;
  }

  public function getMateri(){
    $q = $this->db->query("SELECT * from user u, dosen d, kelas k, materi m WHERE u.id_user=d.id_user AND d.id_dosen=k.id_dosen AND k.id_kelas=m.id_kelas");
    return $q;
  }

  // ubah status kelas
  public function ubahStatusKelas($data, $id_kelas){
    $this->db->where("id_kelas",$id_kelas);
    $this->db->update("kelas",$data);
    return true;
  }

  public function getTugas(){
    $q = $this->db->query("SELECT * from user u, dosen d, kelas k, tugas t WHERE u.id_user=d.id_user AND d.id_dosen=k.id_dosen AND k.id_kelas=t.id_kelas");
    return $q;
  }

    // ubah status kelas
  public function ubahStatusTugas($data, $id_tugas){
    $this->db->where("id_tugas",$id_tugas);
    $this->db->update("tugas",$data);
    return true;
  }

  // ubah status materi
  public function ubahStatusMateri($data, $id_materi){
    $this->db->where("id_materi",$id_materi);
    $this->db->update("materi",$data);
    return true;
  }

    public function jumDosen(){
    return $this->db->query("select * from user u, user_role ur where u.id_userrole=ur.id_userrole AND u.id_userrole=1")->num_rows();
  }

  public function jumMahasiswa(){
    return $this->db->query("select * from user u, user_role ur where u.id_userrole=ur.id_userrole AND u.id_userrole=2")->num_rows();
  }

    public function jumUnivByUser($id_univ){
    return $this->db->query("SELECT u.id_univ FROM universitas un, user u WHERE un.id_univ=u.id_univ AND u.id_univ='$id_univ'")->num_rows();
  }


  public function tambahMahasiswa($data){
    $this->db->trans_start();

    $this->db->insert('user',$data);
    $insert_id = $this->db->insert_id();
    
    $this->db->trans_complete();
    return $insert_id;    
  }


}
?>