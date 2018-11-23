<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MahasiswaM extends CI_Model{

	function __construct(){
		parent:: __construct();
		$this->load->database();
	}

  //================================== LOGIN ==================================
  //untuk mengambil email sesuai yg login
	public function getUser($email){
		$q = $this->db->query("SELECT * FROM user u LEFT JOIN universitas un on u.id_univ=un.id_univ LEFT JOIN mahasiswa m on u.id_user = m.id_user WHERE u.email='$email'");
		return $q;
	}

  //untuk mengambil data user
	public function getUser1($id_user){
		$q = $this->db->query("
			SELECT u.id_user, nama_depan, nama_belakang, jenis_kelamin, email, id_userrole, u.id_univ, nama_univ, foto_profil, nim  
			FROM user u
			LEFT JOIN universitas un on u.id_univ = un.id_univ
			LEFT JOIN mahasiswa m on u.id_user = m.id_user
			WHERE u.id_user='$id_user'
			");

		return $q;
	}

  //================================== EDIT PROFIL ==================================
  //untuk edit profil user
	public function ubahProfil($dataUser,$id_user){
		$this->db->where('id_user',$id_user);
		$this->db->update('user',$dataUser);
		return true;
	}

  //untuk edit di tabel mahasiswa
	public function ubahNIM($nim,$id_user){
		$cekNim = $this->db->query("SELECT * FROM mahasiswa WHERE id_user = '$id_user' LIMIT 1")->result();

		if(!empty($cekNim)){
			$dataMahasiswa = array(
				'nim' =>$nim,
			);
			$this->db->where('id_user',$id_user);
			$this->db->update('mahasiswa',$dataMahasiswa);
		} elseif(empty($cekNim)){
			$dataMahasiswa = array(
				'nim' =>$nim,
				'id_user' =>$id_user
			);
			$this->db->insert('mahasiswa',$dataMahasiswa);
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

  //================================== GABUNG KELAS ==================================
  //untuk mengambil id_mahasiswa
	public function getIdMhs($id_user){
		$q = $this->db->query("SELECT id_mhs FROM mahasiswa m, user u WHERE m.id_user=u.id_user AND u.id_user='$id_user'");
		return $q;
	}
  //untuk mengambil id_kelas berdasarkan kode
	public function getIdKelasbyKode($kode){
		$q = $this->db->query("SELECT id_kelas FROM kelas WHERE kode='$kode'");
		return $q;
	}

  //untuk mengambil data kelas sesuai user
	public function getKelasbyUser($id_user){
		$q = $this->db->query("SELECT * FROM user u, mahasiswa m, kelas_mhs km, kelas k WHERE u.id_user=m.id_user AND m.id_mhs=km.id_mhs AND km.id_kelas=k.id_kelas AND u.id_user='$id_user'");
		return $q;
	}

  //untuk menambah data kelas
	public function insertKelasMhs($data){
		$this->db->trans_start();

		$this->db->insert('kelas_mhs',$data);
		$insert_id = $this->db->insert_id();

		$this->db->trans_complete();
		return $insert_id;    
	}

    //untuk mengambil data kelas sesuai user
	public function getKelas($id_kelas){
		$q = $this->db->query("SELECT * FROM user u, mahasiswa m, kelas_mhs km, kelas k WHERE u.id_user=m.id_user AND m.id_mhs=km.id_mhs AND km.id_kelas=k.id_kelas AND k.id_kelas='$id_kelas'");
		return $q;
	}
	public function getFakultasProdi($id_kelas){
		$q = $this->db->query("SELECT * FROM fakultas f, detail_fakultasprodi det, prodi p, kelas k WHERE det.id_fakultas=f.id_fakultas AND det.id_prodi=p.id_prodi AND k.id_det_fakultasprodi=det.id_det_fakultasprodi AND k.id_kelas=$id_kelas");
		return $q;
	}

  //untuk menampilkan data pengumuman sesuai kelas
	public function getPengumuman($id_kelas){
		$q = $this->db->query("SELECT *, p.createDtm AS createDtm from pengumuman p, kelas k, dosen d, user u WHERE p.id_kelas=k.id_kelas AND k.id_dosen=d.id_dosen AND d.id_user=u.id_user AND k.id_kelas=$id_kelas ORDER BY p.createDtm DESC");
		return $q;
	}

  //untuk menampilkan data tugas berdasarkan id_kelas
	public function getTugas($id_kelas){
		$q = $this->db->query("SELECT *, t.createDtm AS createDtm from tugas t, kelas k, dosen d, user u WHERE t.id_kelas=k.id_kelas AND k.id_dosen=d.id_dosen AND d.id_user=u.id_user AND k.id_kelas=$id_kelas ORDER BY t.id_tugas DESC");
		return $q;
	}

	public function getSoalPilgan($id){
		$query = $this->db->query("SELECT * FROM soal_pilgan s, tugas t WHERE s.id_tugas=t.id_tugas AND t.id_tugas = '$id'");
		return $query;
	}

    //untuk menambah data jawaban pilihan ganda
	public function insertJawabanPilgan($data){
		$this->db->trans_start();

		$this->db->insert('jawaban_pilgan',$data);
		$insert_id = $this->db->insert_id();

		$this->db->trans_complete();
		return $insert_id;    
	}

	//untuk menambahkan nilai soal pilihan ganda
	public function insertNilaiPilgan($id_tugas,$id_mhs){
		$jumlahSoal = $this->db->query("SELECT id_soal_pilgan FROM soal_pilgan s, tugas t WHERE s.id_tugas=t.id_tugas AND t.id_tugas ='$id_tugas'")->num_rows();

		$jumlahSalah = $this->db->query("SELECT jp.id_jawaban_pilgan FROM jawaban_pilgan jp, soal_pilgan s, tugas t WHERE jp.id_soal_pilgan=s.id_soal_pilgan AND s.id_tugas=t.id_tugas AND jp.status='S' AND t.id_tugas='$id_tugas' AND jp.id_mhs = '$id_mhs'")->num_rows();

		$hitungNilai = ((($jumlahSoal-$jumlahSalah)/$jumlahSoal)*100);
		// print($jumlahSoal); print($jumlahSalah); exit();
		$dataNilai = array(
			'nilai' =>$hitungNilai,
			'id_mhs' =>$id_mhs,
			'id_tugas' =>$id_tugas
		);
		$this->db->insert('nilai',$dataNilai);
		return true;
	}

}
?>