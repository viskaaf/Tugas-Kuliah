<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HomeM extends CI_Model{
  
  function __construct(){
    parent:: __construct();
    $this->load->database();
  }

  //query Lupa password
    public function cekemail($email){
      $query = $this->db->query("SELECT id_user FROM user WHERE email = '$email'");
      return $query;
    }
    public function lupapassword($data,$email_def){

      if($email_def == md5("tugaskuliah473@gmail.com")){
        // $cekUserAdmin = $this->db->query("SELECT * FROM admin WHERE email='$email'")->num_rows();

        // if($cekUserAdmin > 0){
          $this->db->where('md5(email)',$email_def);
          $this->db->update('admin',$data);
          
          return true;
        }else{
          $cekUser = $this->db->query("SELECT * FROM user WHERE md5(email)='$email_def'")->num_rows();

          if($cekUser > 0){
            $this->db->where('md5(email)',$email_def);
            $this->db->update('user',$data);

            return true;
          }else{
            $this->session->set_flashdata('error',"Email tidak tersedia.");
            redirect('HomeC/halamanLupaPassword/'.$email_def);
        }
      }
    }
}
?>