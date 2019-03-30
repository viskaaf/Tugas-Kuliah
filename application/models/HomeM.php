<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HomeM extends CI_Model{

  function __construct(){
    parent:: __construct();
    $this->load->database();
  }

      //untuk mengambil email sesuai yg login
  public function getUser($email){
    $q = $this->db->query("SELECT * FROM user u LEFT JOIN universitas un on u.id_univ=un.id_univ LEFT JOIN dosen d on u.id_user = d.id_user LEFT JOIN mahasiswa m on u.id_user = m.id_user WHERE u.email='$email'");
    return $q;
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

      //query pencarian 
  public function cari($keyword){
    $this->db->like('nama_materi', $keyword); //mencari data yang serupa dengan keyword
    return $this->db->get('materi');
  }

  public function cariMateri(){
    $query = $this->db->query("SELECT * FROM materi ORDER BY id_materi DESC LIMIT 4")->result();
    return $query;
  }
}
?>