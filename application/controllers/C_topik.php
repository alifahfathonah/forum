<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_topik
 *
 * @author Yusuf Ramadhani
 */
class C_topik extends CI_Controller{
 function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('M_topik');
    }         
    //menampilkan view topik    
    function getViewBuatTopik() {
    	if($this->session->userdata('logged_in')){
       $data['notif']=$this->M_topik->getNotif();
			$this->load->view('V_buatTopik',$data);
    	}else{
    		$this->load->view('V_beranda');
    	}   
    }
    //menyompan komentar
    public function savekomentar(){
       if($this->input->post('submit')){
       	$isi = $this->input->post('isi_komentar');
       	$id = $this->input->post('id');
       	$this->load->model('M_topik');
       	$username = $this->session->userdata('username_member');
        $status = $this->session->userdata('status');
        $status_komen = "N";

        if(!empty($isi)&&!empty($id)){
          $query = $this->M_topik->tambahkomentar($id,$isi,$username,$status,$status_komen);
          if($status  == 'member' && $query != false ){
         redirect('controller/tampilKomentar/'.$id);

        }else if($status == 'dokter' && $query != false){
         redirect('controller/tampilKomentar2/'.$id);
        }
        }else{
          if($status  == 'member'){
          $mesage = '<div class="alert alert-warning">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      Please fill out this field
                     </div>';
          $this->session->set_flashdata('warning',$mesage);
          redirect('controller/tampilKomentar/'.$id);
          }else if($status == 'dokter'){
             $mesage = '<div class="alert alert-warning">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      Please fill out this field
                     </div>';
          $this->session->set_flashdata('warning',$mesage);
          redirect('controller/tampilKomentar2/'.$id);
          }
         
        }
       }
    }
    //update topik
    public function update_topik(){
    	if($this->input->post('submit')){
    		$id=$this->input->post('id_topik');
    		$judul = $this->input->post('judulTopik');
    		$isi_topik = $this->input->post('isiTopik');
    		$kategori = $this->input->post('kategoriTopik');
        if(!empty($id) && !empty($judul) && !empty($isi_topik) && !empty($kategori)){
          $update = $this->M_topik->topik_update($id,$judul,$isi_topik,$kategori);
            if($update != false){
              redirect('C_member/getViewProfil');
            }
        }else{
         $mesage = '<div class="alert alert-warning">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      Please fill out this field
                     </div>';
          $this->session->set_flashdata('warning',$mesage);
          redirect('C_member/Ubahtopik/'.$id);
    		
    	}
    }
  }
    // menampilkan jumlah notif
    public function notif(){
      $data['display_notif'] = $this->M_topik->tampil_notif();
      $data['username'] = $this->session->userdata('username_member');
      $this->load->view('notifikasi',$data);
    }
    // kembali ke halaman sebelumnya
    public function back(){
      if($this->session->userdata('status') == 'member'){
        redirect('Controller/V_beranda');
      }else if($this->session->userdata('status') == 'dokter'){
        redirect('Controller/V_dokter');
      }
      
    }
    // tampil notif
    public function lihat_notif($id_topik,$username){
         $update_komen = $this->M_topik->komen_status($id_topik,$username);
      if($update_komen !=false){
        redirect('controller/tampilKomentar/'.$id_topik);
      }
    }
      function tampilKategori() {
                
        // idKategori diambil dari url segment ke 2
        $idKategori = $this->uri->segment(2);
        // mengambil data kategori berdasarkan $idKategori
        $kategori = $this->M_topik->ambilKategori($idKategori);       
        // menyimpan hasil ambil topik ke array
        $data['query'] = $kategori;
        
        // menampilkan hasil di beranda
        $data['notif']=$this->M_topik->getNotif();
        if($this->session->userdata('status') == 'member'){
          $this->load->view('Halaman_member',$data);
        }else if($this->session->userdata('status') == 'dokter'){
          $this->load->view('Halaman_dokter',$data);
        }else{
          $this->load->view('V_beranda',$data);

        }
        
    }
}
