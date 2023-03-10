<?php 

class Semester extends CI_Controller{
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
        $data['semester'] = $this->semester_model->tampil_data('semester')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('administrator/semester', $data);
        $this->load->view('admin/footer');  
    }
    public function tambah_semester()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('administrator/semester_form');
        $this->load->view('admin/footer');  
    }
    public function tambah_semester_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE)
        {
            $this->tambah_semester();
        }else{
            $nama_semester= $this->input->post('nama_semester');
            $kode_semester = $this->input->post('kode_semester');

            $data = array (
                'nama_semester' => $nama_semester,
                'kode_semester' => $kode_semester,
            );
            $this->semester_model->insert_data($data, 'semester');

            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
           Semester Berhasil Ditambah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('administrator/semester');
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('nama_semester','nama_semester','required',[
            'required' => 'Semester Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('kode_semester','kode_semester','required',[
            'required' => 'Kode Semester Wajib Diisi!'
        ]);
    }
    public function update($id)
    {
        $where = array('kode_semester' => $id);
        $data['semester'] = $this->semester_model->edit_data($where,'semester')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('administrator/semester_update', $data);
        $this->load->view('admin/footer');
    }
    public function update_aksi()
    {
        $id = $this->input->post('kode_semester');
        $nama_semester = $this->input->post('nama_semester');
        $kode_semester = $this->input->post('kode_semester');

        $data = array(
            'nama_semester' => $nama_semester,
            'kode_semester' => $kode_semester,
        );
        $where = array(
            'kode_semester' => $id
        );
        $this->semester_model->update_data($where, $data,'semester'); 
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Semester Berhasil Diupdate!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    redirect('administrator/semester');
    }
    // public function update_aksi()
    // {
    //     $id             = $this->input->post('kode_mapel');
    //     $kode_mapel     = $this->input->post('kode_mapel');
    //     $nama_mapel     = $this->input->post('nama_mapel');


    //     $data = array(
    //         'kode_mapel'    => $kode_mapel,
    //         'nama_mapel'    => $nama_mapel,
    //     );
    //     $where = array(
    //         'kode_mapel' => $id
    //     );
    //     $this->mapel_model->update_data($where,$data,'mapel');
    //     $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
    //         Data Mata Pelajaran Berhasil Diupdate!
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //           <span aria-hidden="true">&times;</span>
    //         </button>
    //       </div>');
    //     redirect('administrator/mapel');
    // }
    public function delete($id)
    {
        $where = array('kode_semester' => $id);
        $this->semester_model->hapus_data($where,'semester');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Semester Berhasil Dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('administrator/semester');
    }
}
?>