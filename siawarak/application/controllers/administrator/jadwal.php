<?php 

class Jadwal extends CI_Controller{
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
        $this->load->view('administrator/jadwal', $data);
        $this->load->view('admin/footer');  
    }
    public function list($kode_kls)
    {
      
        $data['kode_kls'] = $kode_kls;
        $data['mapel'] = $this->mapel_model->listMapel();
		$data['semester'] = $this->semester_model->listSemester();
		$data['jadwal']=$this->jadwal_model->getJadwalWhereId($kode_kls);
        
        


        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('administrator/jadwal_detail', $data);
        $this->load->view('admin/footer'); 
		
    }

    // public function _rules()
    // {
    //     $this->form_validation->set_rules('hari','hari','required',[
    //         'required' => 'Hari Wajib Diisi!'
    //     ]);
    //     $this->form_validation->set_rules('nama_mapel','nama_mapel','required',[
    //         'required' => 'Nama Guru Wajib Diisi!'
    //     ]);
    //     $this->form_validation->set_rules('semester','semester','required',[
    //         'required' => 'Semester Wajib Diisi!'
    //     ]);
    //     $this->form_validation->set_rules('kode_mapel','kode_mapel','required',[
    //         'required' => 'Kode_mapel Wajib Diisi!'
    //     ]);
    // }
    

    public function savejadwal()
	{
       
		$data = [

            'kode_kls' => $this->input->post('kode_kls'),
            'hari' => $this->input->post('hari'),
            'kode_smt' => $this->input->post('kode_smt'),
            'kode_mp' => $this->input->post('kode_mp'),
            'waktu_awal' =>$this->input->post('waktu_awal'),
            'waktu_akhir' => $this->input->post('waktu_akhir')
		];
        
		$this->jadwal_model->insert($data);
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Jadwal Berhasil Ditambahkan!
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
              </div>');
        // die(json_encode($data('jadwal')));
        // $data['jadwal']=$this->jadwal_model-->savejadwal($mapel);
        return redirect('administrator/jadwal/list/'. $data['kode_kls']);

	}

    // public function update($id, $kelas)
    // {
    //     $row = $this->jadwal_model->get_by_id($id);
    //     $th = $row->id_thn_akad;
    //     $kls = urldecode($kelas);

    //     if($row) {
    //         $data = array (
    //             'id_jadwal' => set_value('id_jadwal', $row->id_jadwal),
    //             'id_thn_akad' => set_value('id_thn_akad', $row->id_thn_akad),
    //             'nama_hari' => set_value('nama_hari', $row->nama_hari),
    //             'kode_mapel' => set_value('kode_mapel', $row->kode_mapel),
    //             'kelas' => set_value('kelas', $kls),
    //             'jam_masuk' => set_value('jam_masuk', $row->jam_masuk),
    //             'jam_keluar' => set_value('jam_keluar', $row->jam_keluar),
    //             'semester' => $this->tahunakademik_model->get_by_id($th)->semester==1?'Ganjil' : 'Genap',
                
    //         );

    //         $this->load->view('admin/header');
    //         $this->load->view('admin/sidebar');
    //         $this->load->view('administrator/jadwal_update', $data);
    //         $this->load->view('admin/footer');  
    //     }else{
    //         echo "Data Tidak Ada!";
    //     }
    // }

    public function editjadwal($kode_jadwal)
	{
		$data['jadwal']=$this->jadwal_model->getJadwal($kode_jadwal);
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('administrator/jadwal_edit', $data);
        $this->load->view('admin/footer'); 
	}

    public function update_aksi()
    {
        
        $data = array(
            'kode_jadwal'	=>	$this->input->post('kode_jadwal'),
            'kode_mp'	=>	$this->input->post('kode_mp'),
			'kode_kls'	=>	$this->input->post('kode_kls'),
			'kode_smt' => $this->input->post('kode_smt'),
			'hari' => $this->input->post('hari'),
			'waktu_awal' => $this->input->post('waktu_awal'),
            'waktu_akhir' => $this->input->post('waktu_akhir'),
            
        );
        $kode_kls=$this->input->post('kode_kls');
		$kode_jadwal=$this->input->post('kode_jadwal');

        $this->jadwal_model->update($data, $kode_kls, $kode_jadwal);
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Jadwal Berhasil Diupdate!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
         </div>');
        return redirect('administrator/jadwal/list/'. $kode_kls);
    }

    // make function update_aksi with kode_jadwal 


    public function delete($id)
    {
        $where = array('kode_kls' => $id);
        $this->jadwal_model->hapus_data($where,'jadwal');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Jadwal Berhasil Dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        return redirect('administrator/jadwal/list/'.$id);
    }

}