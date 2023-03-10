<?php

require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

class Presensi extends CI_Controller
{
    // make function __construct()
    public function __construct()
    {
        parent::__construct();
        $this->load->model('presensi_model');
        $this->load->model('mapel_model');
        $this->load->model('semester_model');
        $this->load->model('tahunakademik_model');
        if (!isset($this->session->userdata['username'])) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
           Anda Belum Login!
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>');
            redirect('administrator/auth');

       
        }
    }
    // make function presensi()
    public function presensi()
    {
        $nip = $this->session->userdata('username');
		$data['siswa']=$this->siswa_model->listSiswaWhrNip($nip);

        $this->load->view('admin/header');
        $this->load->view('users/sidebar');
        $this->load->view('user/presensi', $data);
        $this->load->view('admin/footer');
    } 

    // make function detailpresensi($id)
    public function detailpresensi($nis)
    {
        $data['nis'] = $nis;
        $data['presensi'] = $this->presensi_model->get_presensi_by_nis($nis);
        $data['mapel'] = $this->mapel_model->listMapel();
        $data['semester'] = $this->semester_model->listSemester();
        $data['tahun_akademik'] = $this->tahunakademik_model->listTahun_akademik();


        $this->load->view('admin/header');
        $this->load->view('users/sidebar');
        $this->load->view('user/detail_presensi', $data);
        $this->load->view('admin/footer');

    }

    // make function savepresensi()
    public function savepresensi()
    {
        
        $kode_mp = $this->input->post('kode_mp');
        $pertemuan = $this->input->post('pertemuan');
        $tanggal = $this->input->post('tanggal');
        $alpha = $this->input->post('alpha');
        $ijin = $this->input->post('ijin');
        $sakit = $this->input->post('sakit');
        $nis = $this->input->post('nis');
        $kode_semester = $this->input->post('kode_semester');
        $kode_ta = $this->input->post('kode_ta');
        $hadir = $this->input->post('hadir');
        
        $data = array(
            
            'kode_mp' => $kode_mp,
            'pertemuan' => $pertemuan,
            'alpha' => $alpha,
            'ijin' => $ijin,
            'tanggal' => $tanggal,
            'sakit' => $sakit,
            'nis' => $nis,
            'kode_semester' => $kode_semester,
            'kode_ta' => $kode_ta,
            'hadir' => $hadir,
        );

        $this->presensi_model->insertPresensi($data, 'presensi');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Presensi Berhasil Ditambahkan!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('user/presensi/detailpresensi/'. $data['nis']);
    }
    public function update($id)
    {
        $data['presensi'] = $this->presensi_model->get_presensi_by_id($id);
        
        $this->load->view('admin/header');
        $this->load->view('users/sidebar');
        $this->load->view('user/edit_presensi', $data);
        $this->load->view('admin/footer');  
    }
    public function update_presensi_aksi()
    {
        $id_presensi = $this->input->post('id_presensi');
        $kode_mp = $this->input->post('kode_mp');
        $pertemuan = $this->input->post('pertemuan');
        $tanggal = $this->input->post('tanggal');
        $alpha = $this->input->post('alpha');
        $ijin = $this->input->post('ijin');
        $sakit = $this->input->post('sakit');
        $nis = $this->input->post('nis');
        $kode_semester = $this->input->post('kode_semester');
        $kode_ta = $this->input->post('kode_ta');
        $hadir = $this->input->post('hadir');
        
        $data = array(
            
            'kode_mp' => $kode_mp,
            'pertemuan' => $pertemuan,
            'alpha' => $alpha,
            'ijin' => $ijin,
            'tanggal' => $tanggal,
            'sakit' => $sakit,
            'nis' => $nis,
            'kode_semester' => $kode_semester,
            'kode_ta' => $kode_ta,
            'hadir' => $hadir,
        );

        $where = array(
            'id_presensi' => $id_presensi
        );

        $this->presensi_model->update_data($where, $data, 'presensi');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Presensi Berhasil Diupdate!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('user/presensi/detailpresensi/'. $data['nis']);
    }

    
    // make function hapuspresensi($id)
    public function hapuspresensi($id)
    {
        $where = array('id_presensi' => $id);
        $this->presensi_model->hapus_data($where, 'presensi');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data Presensi Berhasil Dihapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('user/presensi/detailpresensi/'. $nis);
    }

    public function download_csv_data()
    {
        // Ambil data seluruh presensi dari database menggunakan model
        $presensi = $this->presensi_model->getData();
    
        // Mendefinisikan urutan kolom sesuai nama field pada database
        $columnOrder = [
            'nis','kode_mp','pertemuan','tanggal','kode_semester','kode_ta','alpha','ijin','sakit','hadir'
        ];
    
        // Membuat objek Spreadsheet dan Worksheet baru
        $spreadsheet = new Spreadsheet();
        $worksheet = $spreadsheet->getActiveSheet();
    
        // Menulis header kolom pada baris pertama
        $columnIndex = 1;
        foreach ($columnOrder as $column) {
            $worksheet->setCellValueByColumnAndRow($columnIndex, 1, $column);
            $columnIndex++;
        }
    
        // Menulis data presensi pada baris selanjutnya
        $rowIndex = 2;
        foreach ($presensi as $data) {
            $columnIndex = 1;
            foreach ($columnOrder as $column) {
                $worksheet->setCellValueByColumnAndRow($columnIndex, $rowIndex, $data[$column]);
                $columnIndex++;
            }
            $rowIndex++;
        }
    
        // Membuat objek writer untuk menulis file CSV
        $writer = new Csv($spreadsheet);
    
        // Menentukan header untuk file download
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename="data_presensi.csv"');
        header('Cache-Control: max-age=0');
    
        // Menulis output ke browser
        $writer->setUseBOM(true); // Agar bisa dibaca di Excel Windows
        $writer->setDelimiter(';'); // Menggunakan semicolon sebagai delimiter
        $writer->setEnclosure('"'); // Menggunakan double quote sebagai enclosure
        $writer->setLineEnding("\r\n"); // Menggunakan CRLF sebagai line ending
        $writer->setSheetIndex(0); // Menuliskan data dari worksheet pertama
        $writer->save('php://output');
    }






        
    


    



}