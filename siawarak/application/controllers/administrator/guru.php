<?php

class Guru extends CI_Controller{
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
        $data['guru'] = $this->guru_model->tampil_data('guru')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('administrator/guru', $data);
        $this->load->view('admin/footer');  
    }
    public function detail($id)
    {
        $data['detail'] = $this->guru_model->ambil_id_guru($id);
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('administrator/guru_detail', $data);
        $this->load->view('admin/footer');  
    }
    public function tambah_guru()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('administrator/guru_form');
        $this->load->view('admin/footer');  
    }
    public function tambah_guru_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE) {
            $this->tambah_guru();
        }else{
            $nip = $this->input->post('nip');
            $nama_guru = $this->input->post('nama_guru');
            $alamat = $this->input->post('alamat');
            $email = $this->input->post('email');
            $telp = $this->input->post('telp');
            $pengampu = $this->input->post('pengampu');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $photo = $_FILES['photo'];
            if($photo=''){}else{
                $config['upload_path'] = './assets/uploads';
                $config['allowed_types'] = 'jpg|png|gif|tiff';

                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('photo')){
                    echo "Gagal Upload"; die();
                }else{
                    $photo=$this->upload->data('file_name');
                }
            }
            $data = array(
                'nip' =>$nip,
                'nama_guru' =>$nama_guru,
                'alamat' =>$alamat,
                'telp' =>$telp,
                'pengampu' =>$pengampu,
                'email' =>$email,
                'jenis_kelamin' =>$jenis_kelamin,
                'photo' =>$photo,
            );

            $this->guru_model->insert_data($data,'guru');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Guru Berhasil Ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('administrator/guru');
        }
    }

    public function update($id)
    {
        $where = array('nip' => $id);
        $data['guru'] = $this->guru_model->edit_data($where, 'guru')->result();
        $data['detail'] = $this->guru_model->ambil_id_guru($id);
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('administrator/guru_update', $data);
        $this->load->view('admin/footer');  
    }

    public function update_guru_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE)
        {
            $this->update();
        }else{
            $id = $this->input->post('id_guru');
            $nip = $this->input->post('nip');
            $nama_guru = $this->input->post('nama_guru');
            $alamat = $this->input->post('alamat');
            $email = $this->input->post('email');
            $telp = $this->input->post('telp');
            $pengampu = $this->input->post('pengampu');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $photo = $_FILES['userfile'] ['name']; 

            if($photo){
                $config['upload_path'] = './assets/uploads';
                $config['allowed_types'] = 'jpg|png|gif|tiff';

                $this->load->library('upload',$config);
                if($this->upload->do_upload('userfile')){
                    $userfile = $this->upload->data('file_name');
                    $this->db->set('photo', $userfile);
                }else{
                    echo "Gagal Upload";
                }
            }
            $data = array(
                'nip' =>$nip,
                'nama_guru' =>$nama_guru,
                'alamat' =>$alamat,
                'telp' =>$telp,
                'pengampu' =>$pengampu,
                'email' =>$email,
                'jenis_kelamin' =>$jenis_kelamin,
               
            );

            $where = array (
                'id_guru' => $id
            );
            $this->guru_model->update_data($where, $data,'guru');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Guru Berhasil Diupdate!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('administrator/guru');

        }
    }

    public function delete($id)
    {
        $where = array('nip' => $id);
        $this->guru_model->hapus_data($where,'guru');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Guru Berhasil Dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('administrator/guru');
    }



    public function _rules()
    {
        $this->form_validation->set_rules('nip','Nip','required',[
            'required' => 'NIP Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('nama_guru','Nama_Guru','required',[
            'required' => 'Nama Guru Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('email','Email','required',[
            'required' => 'Email Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('alamat','Alamat','required',[
            'required' => 'Alamat Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('telp','Telepon','required',[
            'required' => 'Telepon Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('email','Email','required',[
            'required' => 'Email Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('jenis_kelamin','Jenis_Kelamin','required',[
            'required' => 'Jenis Kelamin Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('pengampu','Pengampu','required',[
            'required' => 'Pengampu Wajib Diisi!'
        ]);
 
    
    }
}