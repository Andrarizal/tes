<?php

class Mapel extends CI_Controller{
    function __construct(){
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
    public function index()
    {
       $data['mapel'] = $this->mapel_model->tampil_data('mapel')->result();
       $this->load->view('admin/header');
       $this->load->view('admin/sidebar');
       $this->load->view('administrator/mapel', $data);
       $this->load->view('admin/footer');  
    }
    public function tambah_mapel()
    {
        $data['kelas'] = $this->mapel_model->tampil_data('kelas')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('administrator/mapel_form', $data);
        $this->load->view('admin/footer');  
    }
    public function tambah_mapel_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE)
        {
            $this->tambah_mapel();
        }else{
            $kode_mapel = $this->input->post('kode_mapel');
            $nama_mapel = $this->input->post('nama_mapel');


            $data = array (
                'kode_mapel' => $kode_mapel,
                'nama_mapel' => $nama_mapel,

            );
            $this->mapel_model->insert_data($data, 'mapel');

            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Mata Pelajaran Berhasil Ditambah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('administrator/mapel');
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('kode_mapel','kode_mapel','required',[
            'required' => 'Kode Mata Pelajaran Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('nama_mapel','nama_mapel','required',[
            'required' => 'Nama Mata Pelajaran Wajib Diisi!'
        ]);

    }

    public function detail($kode)
    {
        $data['detail'] = $this->mapel_model->ambil_kode_mapel($kode);
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('administrator/mapel_detail', $data);
        $this->load->view('admin/footer');  
    }
    public function update($id)
    {
        $where= array('kode_mapel'=> $id);
        $data['mapel'] = $this->db->query("select * from mapel where kode_mapel  ='$id'")->result();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('administrator/mapel_update', $data);
        $this->load->view('admin/footer');  
    }
    public function update_aksi()
    {
        $id             = $this->input->post('kode_mapel');
        $kode_mapel     = $this->input->post('kode_mapel');
        $nama_mapel     = $this->input->post('nama_mapel');


        $data = array(
            'kode_mapel'    => $kode_mapel,
            'nama_mapel'    => $nama_mapel,
        );
        $where = array(
            'kode_mapel' => $id
        );
        $this->mapel_model->update_data($where,$data,'mapel');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Mata Pelajaran Berhasil Diupdate!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('administrator/mapel');
    }
    public function delete($id)
    {
        $where = array('kode_mapel' => $id);
        $this->mapel_model->hapus_data($where,'mapel');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Mata Kuliah Berhasil Dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('administrator/mapel');
    }
}