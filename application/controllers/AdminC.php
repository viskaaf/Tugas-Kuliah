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
    	$this->load->view('admin/beranda_adminV');
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
    $this->load->view('admin/data_dosenV', $data);

}

}
