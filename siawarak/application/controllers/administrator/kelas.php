<?php 

class Kelas extends CI_Controller{
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
        $data['kelas'] = $this->kelas_model->tampil_data()->result();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('administrator/kelas', $data);
        $this->load->view('admin/footer');  
    }
    public function input()
    {
        $data = array(
            'id_kelas' => set_value('id_kelas'),
            'kode_kelas' => set_value('kode_kelas'),
            'nama_kelas' => set_value('nama_kelas'),
            'nama_wali' => set_value('nama_wali'),
        );
        $data['guru'] = $this->guru_model->tampil_guru('guru')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('administrator/kelas_form', $data);
        $this->load->view('admin/footer'); 
    }
    public function input_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->input(); 
        }else{
            $data = array(
                'kode_kelas' => $this->input->post('kode_kelas', TRUE),
                'nama_kelas' => $this->input->post('nama_kelas', TRUE),
                'nama_wali' => $this->input->post('nama_wali', TRUE),
            );
            $this->kelas_model->input_data($data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Kelas Berhasil Ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('administrator/kelas');
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('kode_kelas','kode_kelas','required',[
            'required' => 'Kode Kelas Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('nama_kelas','nama_kelas','required',[
            'required' => 'Nama Kelas Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('nama_wali','nama_wali','required',[
            'required' => 'Nama Wali Wajib Diisi!'
        ]);


    }
    public function update($id)
    {
        $where= array('kode_kelas'=> $id);
        $data['guru'] = $this->guru_model->tampil_guru('guru')->result();
        $data['kelas'] = $this->kelas_model->edit_data($where,'kelas')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('administrator/kelas_update', $data);
        $this->load->view('admin/footer'); 

    }
    public function update_aksi()
    {
        
        $id = $this->input->post('kode_kelas');
        $kode_kelas = $this->input->post('kode_kelas');
        $nama_kelas = $this->input->post('nama_kelas');
        $nama_wali = $this->input->post('nama_wali');

        $data = array(
            'kode_kelas' => $kode_kelas,
            'nama_kelas' => $nama_kelas,
            'nama_wali' => $nama_wali,
        );
        $where = array(
            'kode_kelas' => $id
        );

        $this->kelas_model->update_data($where,$data,'kelas');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Kelas Berhasil Diupdate!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('administrator/kelas');
    }
    public function delete($id)
    {
        $where = array('kode_kelas' => $id);
        $this->kelas_model->hapus_data($where,'kelas');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Kelas Berhasil Dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('administrator/kelas');
    }
}