<?php

class Import extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        // load library dan model yang dibutuhkan
        $this->load->library('excel');
        $this->load->model('Import_model');
    }
    
    public function process() {
        // baca file Excel yang diupload
        $file = $_FILES['file']['tmp_name'];
        $reader = $this->excel->load($file);
        
        // baca data dari sheet pertama
        $worksheet = $reader->getActiveSheet();
        $rows = $worksheet->toArray();
        
        // proses setiap baris data
        foreach ($rows as $row) {
            $data = array(
                'field1' => $row[0],
                'field2' => $row[1],
                'field3' => $row[2],
                // tambahkan field lainnya sesuai dengan kebutuhan
            );
            
            // simpan data ke database
            $this->Import_model->insert_data($data);
        }
        
        // tampilkan pesan berhasil dan redirect ke halaman utama
        $this->session->set_flashdata('success', 'Data imported successfully');
        redirect(base_url());
    }
    
}
 
?>