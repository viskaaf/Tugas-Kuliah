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
    $ci->email->from($config['smtp_user']);
    //email tujuan
    $ci->email->to($email);

    return TRUE;
}


