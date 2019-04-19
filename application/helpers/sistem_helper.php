<?php 
function in_accessadmin()
{
    $ci=& get_instance();
    if($ci->session->userdata('user')){
        redirect('AdminC');
    }
}
function no_access()
{
    $ci=& get_instance();
    if(!$ci->session->userdata('user')){
        redirect('LoginC');
    }
} 

function in_accessuser()
{
    $ci=& get_instance();
    if($ci->session->userdata('user')){
        if ($ci->session->userdata('id_userrole')==1) {
            redirect('DosenC');
        }
        elseif ($ci->session->userdata('id_userrole')==2) {
            redirect('MahasiswaC');
        }
        
    }
}
function no_accessuser()
{
    $ci=& get_instance();
    if(!$ci->session->userdata('user')){
        redirect('loginUserR');
    }
}
function no_access_dsn()
{
    $ci=& get_instance();
    if($ci->session->userdata('id_userrole')!=1 && $ci->session->userdata('akses')!='admin'){
        redirect('LoginC');
    }
}
function no_access_mhs()
{
    $ci=& get_instance();
    if($ci->session->userdata('id_userrole')!=2 && $ci->session->userdata('akses')!='admin'){
        redirect('LoginC');
    }
}
function no_access_adm()
{
    $ci=& get_instance();
    if ($ci->session->userdata('akses')!='admin') {
        redirect('noAksesR');
    }
}

function tgl_indo($tanggal){
    $bulan = array (1=>
        'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split = explode('-', $tanggal);
    return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}

function email($email){
    $ci=& get_instance();
    $ci->load->library('email');
    $config = array();
    $config['charset'] = 'utf-8';
    $config['useragent'] = 'Codeigniter';
    $config['protocol']= "smtp";
    $config['mailtype']= "html";
    //pengaturan smtp
    $config['smtp_host']= "ssl://smtp.gmail.com";
    $config['smtp_port']= "465";
    $config['smtp_timeout']= "400";
    // pengaturan akun email default pengirim
    $config['smtp_user']= "tugaskuliah473@gmail.com"; 
    $config['smtp_pass']= "Tugaskuliah1"; 
    //pengaturan isi email
    $config['crlf']="\r\n"; 
    $config['newline']="\r\n"; 
    $config['wordwrap'] = TRUE;
    //memanggil library email dan set konfigurasi untuk pengiriman email
    $ci->email->initialize($config);
    //konfigurasi pengiriman
    $ci->email->from($config['smtp_user'],'Administrator Tugas-Kuliah (No Replay)');
    //email tujuan
    $ci->email->to($email);

    return TRUE;
}

function batasPengerjaan($id_tugas) {
    $ci=& get_instance();

   $q = $ci->db->query("SELECT id_mhs, id_nilai, status_nilai, tgl_selesai FROM tugas t, nilai n WHERE n.id_tugas = t.id_tugas AND t.id_tugas = '$id_tugas'");
    // $id_mhs = $ci->db->query("SELECT km.id_mhs FROM tugas t, kelas k, kelas_mhs km WHERE t.id_kelas = k.id_kelas AND k.id_kelas = km.id_kelas AND t.id_tugas = '$id_tugas'");
    // $id_mhsNilai = $ci->db->query("SELECT id_mhs FROM nilai n, tugas t WHERE n.id_tugas = t.id_tugas AND t.id_tugas = '$id_tugas'");

        $tgl_sekarang=date("Y-m-d");//tanggal sekarang

        // foreach ($id_mhs->result() as $key_id) {
            foreach ($q->result() as $key) {
                // foreach ($id_mhsNilai->result() as $key_idNilai) {
                  $tgl_exp = $key->tgl_selesai;
                  $jangka_waktu = strtotime('+1 days',strtotime($tgl_exp));// jangka waktu + 365 hari
                  $tgl_exp=date("Y-m-d",$jangka_waktu);//tanggal expired

                  if ($tgl_sekarang >= $tgl_exp && $key->status_nilai == "Belum Dikerjakan"){
                    $data = array(
                        'status_nilai' => "Tidak Dikerjakan",
                        'updateDtm' => date('Y-m-d H:i:s')
                    );
                $id_nilai =     $key->id_nilai;
                  
                $ci->DosenM->ubahNilai($data, $id_nilai);
                }

            // } 
                // AND $key_id->id_mhs != $key_idNilai->id_mhs
        }
    // }
}
