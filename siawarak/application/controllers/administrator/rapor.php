<?php

class Rapor extends CI_Controller{
    public function index()
    {
        $data = array (
            'siswa' => set_value('nama_siswa'),
            'id_thn_akad' => set_value('id_thn_akad'),
            'nama_kelas' => set_value('nama_kelas')
        );

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('administrator/masuk_rapor', $data);
        $this->load->view('admin/footer'); 
    }
}