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
    $q = $this->db->query("SELECT * from user u, user_role ur WHERE u.id_userrole=ur.id_userrole AND ur.id_userrole=1");
    return $q;
  }

    public function tambahDosen($data){
    $this->db->trans_start();
      
    $this->db->insert('user',$data);
    $insert_id = $this->db->insert_id();
    
        $this->db->trans_complete();
      return $insert_id;    
  }


  public function getMahasiswa(){
    $q = $this->db->query("SELECT * from user u, user_role ur WHERE u.id_userrole=ur.id_userrole AND ur.id_userrole=2");
    return $q;
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