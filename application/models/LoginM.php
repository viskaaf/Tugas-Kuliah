<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginM extends CI_Model{

  public function cekuseradmin($email, $password){
    $this->db->where('email', $email);
    $this->db->where('password', $password);
    return $this->db->get('admin'); 
  }

  public function cekuser($email, $password){
    $this->db->select("id_userrole, status");
    $this->db->where('email', $email);
    $this->db->where('password', $password);
    return $this->db->get('user'); 
  }
  
  public function getUser($email){
    $q = $this->db->query("SELECT * from user u,user_role WHERE u.email='$email'");
        return $q;
  }
}
?>