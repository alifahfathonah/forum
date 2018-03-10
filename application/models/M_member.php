<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_member extends CI_Model {
	function __construct(){
		parent::__construct();
	}
	public function Validasi($username){
		$this->db->select('username_member');
		$this->db->from('member');
		$this->db->where('username_member',$username);
		$hasil = $this->db->get();

		if($hasil->num_rows() > 0){
			return false;
		}else{
			return true;
		}
	}
	public function inserdata($nama,$email,$TTL,$jenis_kelamin,$foto,$username,$password,$status,$nip){
		$data_insert= array('nama_member'=>$nama,'username_member'=>$username,
					'email_member'=>$email,
					'TTL_member'=>$TTL,'jenisKelamin_member'=>$jenis_kelamin,
					'foto_member'=>$foto,'password_member'=>$password,'status'=>$status,
					'nip_dokter'=>$nip);
		$this->db->insert('member',$data_insert);
		return true;
	}
	public function validasi_login($username,$password){
		$this->db->select('username_member,password_member,status');
		$this->db->from('member');
		$this->db->where('username_member',$username);
		$this->db->where('password_member',$password);
		$this->db->limit(1);
		$data = $this->db->get();

		if($data->num_rows() > 0){
			foreach ($data->result() as $value) {
				$hasil[] = $value;
				return $hasil;
			}
		}else{
			return 0;
		}

	}
	public function member($usernama){
		$this->db->select('*');
		$this->db->from('member');
		$this->db->where('username_member',$usernama);
		$this->db->limit(1);
		$data_member = $this->db->get();
		return $data_member->result_object();
	}
	public function member2($usernama){
		$this->db->select('*');
		$this->db->from('member');
		$this->db->where('username_member',$usernama);
		$this->db->limit(1);
		$data_member = $this->db->get();
		return $data_member->row();
	}
	public function ambildata_member($username){
		$this->db->select('username_member,nama_member,TTL_member,
						jenisKelamin_member,foto_member,password_member');
		$this->db->from('member');
		$this->db->where('username_member',$username);
		$data_member = $this->db->get();
		return $data_member->row();
	}

	public function setMember($username,$foto,$nama,$TTL,$jenisKelamin){
		$data_update = array('nama_member'=>$nama,
							'TTL_member'=>$TTL,'jenisKelamin_member'=>$jenisKelamin,
							'foto_member'=>$foto);
		$this->db->where('username_member',$username);
		$this->db->update('member',$data_update);
		return true;
	}
	public function simpanDokter($nip,$email_member1,$nama,
									$TTL_member1,$jenisKelamin1,$username1,$password1,
									$status,$gambar){
		$data_insert = array('nama_member'=>$nama,'username_member'=>$username1,
						'email_member'=>$email_member1,'TTL_member'=>$TTL_member1,
						'jenisKelamin_member'=>$jenisKelamin1,'foto_member'=>$gambar,
						'password_member'=>$password1,'status'=>$status,'nip_dokter'=>$nip);
		$this->db->insert('member',$data_insert);
		return true;
	}
}
?>