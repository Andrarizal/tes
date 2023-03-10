<?php 

class Tahun_akademik extends CI_Controller{
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
        $data['tahun_akademik'] = $this->tahunakademik_model->tampil_data('tahun_akademik')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('administrator/tahun_akademik', $data);
        $this->load->view('admin/footer');  
    }
    public function tambah_tahun_akademik()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('administrator/tahun_akademik_form');
        $this->load->view('admin/footer');  
    }
    public function tambah_tahun_akademik_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE)
        {
            $this->tambah_tahun_akademik();
        }else{
            $tahun_akademik= $this->input->post('tahun_akademik');
            $kode_tahunakademik = $this->input->post('kode_tahunakademik');
            $status = $this->input->post('status');

            $data = array (
                'tahun_akademik' => $tahun_akademik,
                'kode_tahunakademik' => $kode_tahunakademik,
                'status' => $status,
            );
            $this->tahunakademik_model->insert_data($data, 'tahun_akademik');

            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
           Tahun Akademik Berhasil Ditambah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('administrator/tahun_akademik');
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('tahun_akademik','tahun_akademik','required',[
            'required' => 'Tahun Akademik Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('kode_tahunakademik','kode_tahunakademik','required',[
            'required' => 'Kode Tahun Akademik Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('status','status','required',[
            'required' => 'Status Wajib Diisi!'
        ]);
    }
    public function update($id)
    {
        $where = array('id_thn_akad' => $id);
        $data['tahun_akademik'] = $this->tahunakademik_model->edit_data($where,'tahun_akademik')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('administrator/tahun_akademik_update', $data);
        $this->load->view('admin/footer');
    }
    public function update_aksi()
    {
        $id = $this->input->post('id_thn_akad');
        $tahun_akademik = $this->input->post('tahun_akademik');
        $kode_tahunakademik = $this->input->post('kode_tahunakademik');
        $status = $this->input->post('status');

        $data = array(
            'tahun_akademik' => $tahun_akademik,
            'kode_tahunakademik' => $kode_tahunakademik,
            'status' => $status,
        );
        $where = array(
            'id_thn_akad' => $id
        );
        $this->tahunakademik_model->update_data($where, $data,'tahun_akademik'); 
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Tahun Akademik Berhasil Diupdate!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    redirect('administrator/tahun_akademik');
    }
    public function delete($id)
    {
        $where = array('id_thn_akad' => $id);
        $this->tahunakademik_model->hapus_data($where,'tahun_akademik');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Tahun Akademik Berhasil Dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('administrator/tahun_akademik');
    }
}
?>