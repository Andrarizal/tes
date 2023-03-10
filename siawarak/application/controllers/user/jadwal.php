<?php

class Jadwal extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        if (!isset($this->session->userdata['username'])){
           $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
           Anda Belum Login!
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>');
         redirect('administrator/auth');
        }
     }
    //  make function list
    public function list($id)
    {
        $data['kode_kelas'] = $this->db->query('SELECT * FROM `kelas` WHERE `nama_wali` = "'. $this->session->userdata('username') .'"') -> result()[0]->kode_kelas;
        $data['id'] = $id;
        $data['mapel'] = $this->mapel_model->listMapel();
        $data['semester'] = $this->semester_model->listSemester();
        $data['jadwal'] = $this->jadwal_model->getJadwalWhereId($id);

        
        $this->load->view('admin/header');
        $this->load->view('users/sidebar', $data);
        $this->load->view('user/jadwal_detail', $data);
        $this->load->view('admin/footer');
    }
}

?>