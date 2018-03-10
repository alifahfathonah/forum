<?php
class Controller extends CI_Controller {            
            
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
    // tampil halaman utama
    function index() {
        $data['query'] = $this->bacaTopik();
        $this->load->view('V_beranda', $data);
    }
    //method save topik    
    function setTopik() {
        $judulTopik = $this->input->post('judulTopik');
        $isiTopik = $this->input->post('isiTopik');
        $kategoriTopik = $this->input->post('kategoriTopik');
        //trigger data yang akan disimpan
        if ($this->input->post('submit')){
            if(!empty($judulTopik) && !empty($isiTopik) && !empty($kategoriTopik)){
                $this->M_topik->simpanTopik();
               redirect('C_member/getViewProfil');
        }else{
          $mesage = '<div class="alert alert-warning">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      Please fill out this field
                     </div>';
          $this->session->set_flashdata('warning',$mesage);
          redirect('C_topik/getViewBuatTopik');
        }
       
        }  
    }
    // tampil data topik
    function bacaTopik() {
    $this->load->model('M_topik');
    $topik = $this->M_topik->ambilData();
    return $topik;
    }
    // tampil halaman buat akun
    public function V_BuatAkun()
    {
        $this->load->view('Halaman_BuatAkun');
    }
    // proses login
    public function getDatalogin(){
        $this->form_validation->set_rules('username_member','username_member','trim');
        $this->form_validation->set_rules('password_member','password_member','trim');

        if($this->form_validation->run() == false){
          $mesage = '<div class="alert alert-warning">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      Please fill out this field
                    </div>';
          $this->session->set_flashdata('warning',$mesage);
          redirect('Controller/index');
        }else{
            $username = set_value('username_member');
            $password = set_value('password_member');

            $validasi_login = $this->M_member->validasi_login($username,$password);
            if($validasi_login > 0){
                $status='';
                foreach ($validasi_login as $value) {
                $this->session->set_userdata('username_member',$value->username_member);
                $this->session->set_userdata('status',$value->status);
                $this->session->set_userdata('logged_in',true);
                $status = $value->status;
                }
                if($status == 'member'){
                 $this->V_beranda();
                }else if($status == 'dokter'){
                 $this->V_dokter();
                }
               
            }else{
                $mesage ='<div class="alert alert-warning">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          Username atau Password salah
                        </div>';
                $this->session->set_flashdata('warning',$mesage);
               redirect('Controller/index');
            }

        }
    }
    // menampilkan view dokter
    public function V_dokter(){
        $this->load->model('M_topik');
        $data['query'] = $this->M_topik->ambilData();
        $data['notif']=$this->M_topik->getNotif();
        $this->load->view('Halaman_dokter', $data);
    }
    // logout
    function logout() { 
        $this->session->sess_destroy();
        $this->index();

}
// save data akun
public function savedata(){
         $this->form_validation->set_rules('email_member','email_member','trim|required');
         $this->form_validation->set_rules('TTL_member','TTL_member','trim|required');
         $this->form_validation->set_rules('jenisKelamin_member','jenisKelamin_member','trim|required');
         $this->form_validation->set_rules('username_member','username_member','trim|required');
         $this->form_validation->set_rules('password_member','password_member','trim|required');


            if($this->form_validation->run() == false){
                $mesage ='<div class="alert alert-warning">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          Please fill out this field
                        </div>';
                $this->session->set_flashdata('warning',$mesage);
                redirect('Controller/V_BuatAkun');
            }else{
            $nama_user = set_value('nama_member');
            $email = set_value('email_member');
            $TTL = set_value('TTL_member');
            $jenis_kelamin =  set_value('jenisKelamin_member');
            $username = set_value('username_member');
            $password = set_value('password_member');
            $Validasi = $this->M_member->Validasi($username);
            if($Validasi != false){
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
                $nip = "tidak ada";
                $status = 'member';
                $picture=$this->upload->data();
                $foto = $picture['file_name'];

                $insert = $this->M_member->inserdata($nama_user,$email,$TTL,$jenis_kelamin,$foto,$username,$password,$status,$nip);
                if($insert != false){
                    $this->index();
                }else{
                }
                }
                
            }else{   
             $mesage ='<div class="alert alert-warning">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          Please fill out this field
                        </div>';
                $this->session->set_flashdata('warning',$mesage);
                redirect('Controller/V_BuatAkun'); 
            }
            }else{
                $mesage ='<div class="alert alert-warning">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                         This username is already used
                         </div>';
                $this->session->set_flashdata('warning',$mesage);
                redirect('Controller/V_BuatAkun'); 
            }
            }   
    }
    // tampil halaman member
    public function V_beranda(){
        $this->load->model('M_topik');
        $data['query'] = $this->M_topik->ambilData();
        $data['notif']=$this->M_topik->getNotif();
        $this->load->view('Halaman_member',$data);
    }
    // tampil form komen member
      function tampilKomentar($id_topik) {
        $data['id']=$id_topik;
        $data['topik']= $this->M_topik->ambilDataKomentar($id_topik);
        $data['data_komentar']=$this->M_topik->data_komentar($id_topik);
        $data['notif']=$this->M_topik->getNotif();
        $this->load->view('V_komentar',$data);  
    }
    // tampil form form komen dokter
    function tampilKomentar2($id_topik) {
        $data['id']=$id_topik;
        $data['topik']= $this->M_topik->ambilDataKomentar($id_topik);
        $data['data_komentar']=$this->M_topik->data_komentar($id_topik);
        $this->load->view('V_komentar2',$data);  
    }
    
}

