<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_member extends CI_Controller {
	public function ___construct(){
		parent:: ___construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->model('M_member');
		$this->load->model('M_topik');
	}
	// menampilkan profil dokter
	public function profil_dokter(){
		if($this->session->userdata('logged_in')){
			$usernama = $this->session->userdata('username_member');
			$data['notif']=$this->M_topik->getNotif();
			$data['data'] =$this->M_member->member2($usernama);
			$this->load->view('profil_dokter',$data);
		}
	}
	// menampilkan view profil
	public function getViewProfil(){
		if($this->session->userdata('logged_in')){
			$usernama = $this->session->userdata('username_member');
			$data['data_member'] =$this->M_member->member($usernama);
			$data['data_topik']=$this->M_topik->data_topik($usernama);
			$data['notif']=$this->M_topik->getNotif();
			if($this->session->userdata('status')== 'member'){
			$this->load->view('V_profil',$data);
		    }else if($this->session->userdata('status') == 'dokter'){
			redirect('C_member/profil_dokter');
		   }
			
		}		
	}
	
	//menampilkan halaman update profil
	public function ubahProfil($username){
		$data['edit_data'] = $this->M_member->ambildata_member($username);
		$data['notif']=$this->M_topik->getNotif();
		if($this->session->userdata('status')== 'member'){
			$this->load->view('Halaman_ubah_profil',$data);
		    }else if($this->session->userdata('status') == 'dokter'){
			$this->load->view('ubah_dokter',$data);
		   }
		
	}
	public function updateProfil($username){
		$this->form_validation->set_rules('nama_member','nama_member','trim|required');
		$this->form_validation->set_rules('TTL_member','TTL_member','trim|required');
		$this->form_validation->set_rules('jenisKelamin_member','jenisKelamin_member','trim|required');

		if($this->form_validation->run() == false){
			$mesage ='<div class="alert alert-warning">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          Please fill out this field
                        </div>';
            $this->session->set_flashdata('warning',$mesage);
            redirect('C_member/ubahProfil/'.$username);
		}else{
			 $this->load->library('upload');
            $file = "file_".time();
            $config['upload_path'] ='./img/gambar/';
            $config['allowed_types'] ='png||jpg||bmp';
            $config['max_size'] ='5000';
            $config['max_width']='5000';
            $config['max_height']='5000';
            $config['file_name']=$file;

            $this->upload->initialize($config);
            if($_FILES['foto_member']['name']){
            	if($this->upload->do_upload('foto_member'))
				{
            	$picture=$this->upload->data();
                $foto = $picture['file_name'];
                $nama = set_value('nama_member');
				$TTL = set_value('TTL_member');
				$jenisKelamin = set_value('jenisKelamin_member');

				$query = $this->M_member->setMember($username,$foto,$nama,$TTL,$jenisKelamin);
				if($query != false){
					$this->load->model('M_topik');
       			    $data['query'] = $this->M_topik->ambilData();
       			    redirect('C_member/getViewProfil');
				}
            }
            }else{
            $mesage ='<div class="alert alert-warning">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          Please fill out this field
                        </div>';
            $this->session->set_flashdata('warning',$mesage);
            redirect('C_member/ubahProfil/'.$username);
		}
    }

}
	// menampilkan halaman admin
	public function Halaman_admin(){
		$data['admin_topik']=$this->M_topik->getTopik();
		$this->load->view('Halaman_admin',$data);
	}
	// menampilkan kategori
	public function tampil_kategori($idKategori){
	$data['admin_topik']=$this->M_topik->getTopikKategori($idKategori);
	$this->load->view('Halaman_admin',$data);
	}


	// menampilkan halaman tambah dokter
	public function Tambah_dokter(){
		$this->load->view('Tambah_dokter');
	}
	// aksi simpan dokter
	public function simpanDokter(){
		$this->form_validation->set_rules('nip_dokter','nip_dokter','trim|required|min_length[6]|max_length[6]');
		$this->form_validation->set_rules('email_member','email_member','trim');
		$this->form_validation->set_rules('nama_member','nama_member','trim');
		$this->form_validation->set_rules('TTL_member','TTL_member','trim');
		$this->form_validation->set_rules('jenisKelamin_member','jenisKelamin_member','trim'); 
		$this->form_validation->set_rules('username_member','username_member','trim');
        $this->form_validation->set_rules('password_member','password_member','trim');

        if($this->form_validation->run() == false){
        	$this->load->view('pesan');
        }else{
        	$this->load->library('upload');
            $file_img = "file_".time();
            $config_img['upload_path'] ='./img/gambar/';
            $config_img['allowed_types'] ='png||jpg||bmp';
            $config_img['max_size'] ='5000';
            $config_img['max_width']='5000';
            $config_img['max_height']='5000';
            $config_img['file_name']=$file_img;

            $this->upload->initialize($config_img);
            if($_FILES['foto_member']['name']){
            	if($this->upload->do_upload('foto_member'))
				{
					$img = $this->upload->data();
					$nip =set_value('nip_dokter');
					$email_member1 = set_value('email_member');
					$nama= set_value('nama_member');
					$TTL_member1 = set_value('TTL_member');
					$jenisKelamin1 = set_value('jenisKelamin_member');
					$username1 = set_value('username_member');
					$password1 = set_value('password_member');
					$gambar = $img['file_name'];
					$status = 'dokter';

					$aksi_insert = $this->M_member->simpanDokter($nip,$email_member1,$nama,
									$TTL_member1,$jenisKelamin1,$username1,$password1,$status,$gambar);
					if($aksi_insert != false){
						redirect('C_member/Halaman_admin');
					}


				}
            }

        }
	}
	//menampilkan ubah topik
	  public function Ubahtopik($id_topik){
	  	$usernama = $this->session->userdata('username_member');
	  	$data['id_topik']=$id_topik;
    	$data['tampil_data']=$this->M_topik->topik_data($id_topik);
    	$data['notif']=$this->M_topik->getNotif();
    	$this->load->view('ubah_topik',$data);
    }
    // hapus topik
    public function Hapustopik($id_topik){
    	$this->M_topik->komentar_hapus($id_topik);
    	$query_hapus = $this->M_topik->topik_hapus($id_topik);

    	if($query_hapus != false){

    		redirect('C_member/getViewProfil');
    	}

    }
    // remove post tidak pantas 
    public function topik_tidakpantas($id_topik){
    	$this->M_topik->komentar_hapus($id_topik);
    	$queryhapus2 = $this->M_topik->aksi_hapus($id_topik);
    	if($queryhapus2 != false){
    		redirect('C_member/Halaman_admin');
    	}
    }
}
