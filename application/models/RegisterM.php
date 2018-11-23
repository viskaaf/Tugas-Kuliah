<?php
class RegisterM extends CI_Model{
  
  function __construct(){
    parent:: __construct();
    $this->load->database();
  }

  public function getUniv(){
    return $this->db->get("universitas")->result();
  }

  public function register($data){
    $this->db->trans_start();
      
    $this->db->insert('user',$data);
    $insert_id = $this->db->insert_id();
    
        $this->db->trans_complete();
      return $insert_id;    
  }

    //VERIFIKASI EMAIL
    public function changeActiveState($key){
    $data = array(
      'status' => 'Aktif'
    );

    $this->db->where('md5(id_user)', $key);
    $this->db->update('user', $data);

    return true;
  }
}
?>