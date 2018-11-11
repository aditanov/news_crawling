<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin','data_admin');
        $this->load->helper('url');
        date_default_timezone_set('Asia/Jakarta');
    }

    function admin()
    {
      //*********************************** USER *******************************************************
      $listUser = $this->data_admin->tampil_user($this->session->userdata('email'));
      $data['listUser']= $listUser;
      //*********************************** USER *******************************************************
      //*************************** ADD ADMIN - LIST HAK AKSES *************************************************
      $data['listHak_Akses'] = $this->data_admin->tampil_hak_akses();
      //*************************** ADD ADMIN - LIST HAK AKSES ******************************************
      //*********************************** LOGIN *******************************************************
      $data['username'] = $data['email'] = "";
      if($this->session->userdata('logged')<>1 || $this->session->userdata('hak_akses') != 1){
        redirect('data/index');
      }else{
        $data['status']   = 'login';
        $data['username'] = $this->session->userdata('username');
        $data['email']    = $this->session->userdata('email');
        $this->load->view('admin',$data);
      }
      //*********************************** LOGIN *******************************************************
    }

    function update()
    {
      $email     = $this->input->get('email');
      $hak_akses = $this->input->get('otorisasi');
      $data      = array('keterangan' => $hak_akses);
      $where     = array('email' => $email );
      $this->data_admin->update($data,$where,'user');
      redirect('C_admin/admin');
    }

    function tambah_user()
    {
      $email      = $this->input->post('email');
      $username   = $this->input->post('nama');
      $password   = $this->input->post('password');
      $keterangan = $this->input->post('otorisasi');
      //cek email sudah ada atau belum
      $listUser = $this->data_admin->cek_user($email);
      if(empty($listUser->email)){
        $data_user = array('email' => $email, 'username' => $username, 'password' => md5($password) , 'keterangan' => $keterangan);
        $this->data_admin->tambah_user($data_user, 'user');
        redirect('C_admin/admin');
      }else {
        echo "<script language='javascript'> window.alert('email telah terdaftar'); window.history.go(-1);</script>";
      }
    }

//******************************************* HAPUS USER ******************************************************
    function hapus_user()
    {
      $where = array('email' => $this->input->get('id'));
      $this->data_admin->hapus_user($where, 'user');
      echo "<script language='javascript'> window.alert('user berhasil dihapus'); window.history.go(-1);</script>";
    }
//******************************************* HAPUS USER ******************************************************
//**************************************** GANTI PASSWORD *****************************************************
    function ganti_password()
    {
      $email          = $this->session->userdata('email');
      $password_lama  = $this->input->post('password_lama');
      $password_baru  = $this->input->post('password');
      $listUser = $this->data_admin->cek_user($email);
      //cek benar atau tidak passwordnya
      if($listUser->password == md5($password_lama)){
        $data   = array('password' => md5($password_baru));
        $where  = array('email'    => $email );
        $this->data_admin->ganti_password($data, $where, 'user');
        redirect('C_admin/admin');
      }else{
        echo "<script language='javascript'> window.alert('Password Salah'); window.history.go(-1);</script>";
      }
    }
//**************************************** GANTI PASSWORD *****************************************************
}
