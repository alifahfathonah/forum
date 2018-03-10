<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of M_topik
 *
 * @author Yusuf Ramadhani
 */
class M_topik extends CI_Model {
                
    function simpanTopik() {
        $this->load->database();
    
        $data = array('judul_topik'=> $this->input->post('judulTopik'),
            'isi_topik'=>$this->input->post('isiTopik'),
            'tanggal_topik' => date('Y-m-d'),
            'id_kategori' => $this->input->post('kategoriTopik'),
            'username_topik'=>$this->session->userdata('username_member'));
        
        $this->db->insert('topik',$data);
    }
    
    function ambilData() {
        $this->load->database();
        $query_sql = 'select member.id_member,member.username_member,member.foto_member,topik.id_topik,topik.judul_topik,topik.isi_topik,tanggal_topik from member,topik where member.username_member = topik.username_topik';
        $query = $this->db->query($query_sql);
        $get_data = $query->result();
        return $get_data;
    }
    
    function ambilDataKomentar($id_topik) {
        $this->load->database();
        $query_sql = 'select member.id_member,member.username_member,member.foto_member,topik.id_topik,topik.judul_topik,topik.isi_topik,tanggal_topik from member,topik where member.username_member = topik.username_topik and topik.id_topik ='.$id_topik;
        $query = $this->db->query($query_sql);
        $get_data = $query->result();
        return $get_data;
    }
    
    public function tambahkomentar($id,$isi,$username,$status,$status_komen){
        $data_array = array('id_topik'=>$id,'isi_komentar'=>$isi,
                    'username'=>$username,'sudahbaca'=>$status_komen,
                    'status'=>$status);
        $this->db->insert('komentar',$data_array);
        return true;
    }
    public function data_komentar($id_topik){
        $this->db->select('*');
        $this->db->from('komentar');
        $this->db->where('id_topik',$id_topik);
        $query = $this->db->get();
        return $query->result();
    }
    public function data_topik($usernama){
        $this->db->select('*');
        $this->db->from('topik');
        $this->db->where('username_topik',$usernama);
        $topik = $this->db->get();
        return $topik->result();

    }
    public function topik_data($id_topik){
        $this->db->select('*');
        $this->db->from('topik');
        $this->db->where('id_topik',$id_topik);
        $topik = $this->db->get();
        return $topik->row();

    }
    public function topik_update($id,$judul,$isi_topik,$kategori){
        $data_update = array('judul_topik'=>$judul,'isi_topik'=>$isi_topik,'
            id_kategori'=>$kategori);
        $this->db->where('id_topik',$id);
        $this->db->update('topik',$data_update);
        return true;
    }
    // tapik hapus
    public function topik_hapus($id_topik){
        $this->db->where('id_topik',$id_topik);
        $this->db->delete('topik');
        return true;
    }

    public function komentar_hapus($id_topik) {
        $this->db->where('id_topik',$id_topik);
        $this->db->delete('komentar');
        return true;
    }
    public function getTopik(){
        $this->db->select('*');
        $this->db->from('topik');
        $get = $this->db->get();
        return $get->result();
    }
    public function getTopikKategori($idKategori){
        $this->db->select('*');
        $this->db->from('topik');
        $this->db->where('id_kategori', $idKategori);
        $get = $this->db->get();
        return $get->result();
    }
   public function aksi_hapus($id_topik){
    $this->db->where('id_topik',$id_topik);
    $this->db->delete('topik');
    return true;
   }
   public function getNotif(){
    $username=$this->session->userdata('username_member');
    $status_komen ="N";
    $operasi_query = $this->db->query('select komentar.id_topik, komentar.sudahbaca,komentar.username, topik.id_topik,topik.username_topik from komentar,topik where komentar.id_topik = topik.id_topik');
    return $operasi_query->result();

   }
   public function tampil_notif(){
   $SQL = "select komentar.id_topik, komentar.sudahbaca,komentar.username, topik.id_topik,topik.judul_topik,topik.username_topik from komentar,topik where komentar.id_topik = topik.id_topik";
   $result_join = $this->db->query($SQL);
   $ambil_data = $result_join->result();
   return $ambil_data;
   }
   public function komen_status($id_topik,$username){
    $status = "Y";
    $data_ubah = array('sudahbaca'=>$status);
    $this->db->where('id_topik',$id_topik);
    $this->db->where('username',$username);
    $this->db->update('komentar',$data_ubah);
    return true;
   }
    function ambilKategori($idKategori) {
        $this->load->database();
        $query_sql = 'select member.id_member,member.username_member,member.foto_member,topik.id_topik,topik.judul_topik,topik.isi_topik,tanggal_topik from member,topik where member.username_member = topik.username_topik and topik.id_kategori='.$idKategori;
        $query = $this->db->query($query_sql);
        $get_data = $query->result();
        return $get_data;
    }
}
?>
