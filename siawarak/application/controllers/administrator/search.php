<?php

class Search extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('jadwal_model');
        $this->load->model('kelas_model');
        $this->load->model('mapel_model');
        $this->load->model('guru_model');
        $this->load->model('semester_model');
        $this->load->model('user_model');
        $this->load->model('tahunakademik_model');
        $this->load->model('siswa_model');
        
    }

    public function search() 
    {
        // get a keyword from post
        $keyword = $this->input->post('keyword');

        // search in all table columns
        // in search function in each model
        $data['jadwal'] = $this->jadwal_model->search($keyword);
        $data['kelas'] = $this->kelas_model->search($keyword);
        $data['mapel'] = $this->mapel_model->search($keyword);
        $data['guru'] = $this->guru_model->search($keyword);
        $data['semester'] = $this->semester_model->search($keyword);
        $data['user'] = $this->user_model->search($keyword);
        $data['tahunakademik'] = $this->tahunakademik_model->search($keyword);
        $data['siswa'] = $this->siswa_model->search($keyword);

        // load view
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('administrator/search', $data);
        $this->load->view('admin/footer');

    }
}