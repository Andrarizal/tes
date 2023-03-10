<?php

require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

class Siswa extends CI_Controller{
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
        $data['siswa'] = $this->siswa_model->tampil_data('siswa')->result();
        $data['kelas'] = $this->kelas_model->tampil_data()->result();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('administrator/siswa', $data);
        $this->load->view('admin/footer');  
    }
    public function detail($id)
    {
        $data['detail'] = $this->siswa_model->ambil_id_siswa($id);
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('administrator/siswa_detail', $data);
        $this->load->view('admin/footer');  
    }
    public function tambah_siswa()
    {
        $data['kelas'] = $this->siswa_model->tampil_data('kelas')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('administrator/siswa_form', $data);
        $this->load->view('admin/footer');  
    }
    public function tambah_siswa_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE) {
            $this->tambah_siswa();
        }else{
            $nis = $this->input->post('nis');
            $nama_lengkap = $this->input->post('nama_lengkap');
            $alamat = $this->input->post('alamat');
            $telepon = $this->input->post('telepon');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tanggal_lahir = $this->input->post('tanggal_lahir');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $nama_kelas = $this->input->post('nama_kelas');
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
                'nis' =>$nis,
                'nama_lengkap' =>$nama_lengkap,
                'alamat' =>$alamat,
                'telepon' =>$telepon,
                'tempat_lahir' =>$tempat_lahir,
                'tanggal_lahir' =>$tanggal_lahir,
                'jenis_kelamin' =>$jenis_kelamin,
                'nama_kelas' =>$nama_kelas,
                'photo' =>$photo,
            );

            $this->siswa_model->insert_data($data,'siswa');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            Siswa Berhasil Ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('administrator/siswa');
        }
    }

    public function update($id)
    {
        // $where = array('id' => $id);

        $data['siswa'] = $this->db->query("select * from siswa swa, kelas kls where swa.nama_kelas=kls.nama_kelas and swa.id='$id'")->result();
        $data['kelas'] = $this->mapel_model->tampil_data('kelas')->result();
        $data['detail'] = $this->siswa_model->ambil_id_siswa($id);
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('administrator/siswa_update', $data);
        $this->load->view('admin/footer');  
    }

    // public function update_siswa_aksi()
    // {
    //     $this->_rules();

    //     if($this->form_validation->run() == FALSE)
    //     {
    //         $this->update($this->input->post('id'));
    //     }else{
    //         $id = $this->input->post('id');
    //         $nis = $this->input->post('nis');
    //         $nama_lengkap = $this->input->post('nama_lengkap');
    //         $alamat = $this->input->post('alamat');
    //         $telepon = $this->input->post('telepon');
    //         $tempat_lahir = $this->input->post('tempat_lahir');
    //         $tanggal_lahir = $this->input->post('tanggal_lahir');
    //         $jenis_kelamin = $this->input->post('jenis_kelamin');
    //         $nama_kelas = $this->input->post('nama_kelas');
    //         $photo = $_FILES['userfile'] ['name']; 

    //         if($photo){
    //             $config['upload_path'] = './assets/uploads';
    //             $config['allowed_types'] = 'jpg|png|gif|tiff';

    //             $this->load->library('upload',$config);
    //             if($this->upload->do_upload('userfile')){

                    
    //                 $old_photo= $this->siswa_model->ambil_id_siswa($id)->photo;
    //                 if($old_photo){
    //                     unlink(FCPATH . 'assets/uploads/' . $old_photo);
    //                 }

    //                 $userfile = $this->upload->data('file_name');
    //                 $this->db->set('photo', $userfile);
    //             }else{
    //                 echo "Gagal Upload";
    //             }
    //         }
    //         $data = array(
    //             'nis' =>$nis,
    //             'nama_lengkap' =>$nama_lengkap,
    //             'alamat' =>$alamat,
    //             'telepon' =>$telepon,
    //             'tempat_lahir' =>$tempat_lahir,
    //             'tanggal_lahir' =>$tanggal_lahir,
    //             'jenis_kelamin' =>$jenis_kelamin,
    //             'nama_kelas' =>$nama_kelas,
               
    //         );

    //         $where = array (
    //             'id' => $id
    //         );
    //         $this->siswa_model->update_data($where, $data,'siswa');
    //         $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
    //         Siswa Berhasil Diupdate!
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //           <span aria-hidden="true">&times;</span>
    //         </button>
    //       </div>');
    //     redirect('administrator/siswa');

    //     }
    // }
    public function update_siswa_aksi()
{
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
        $this->update($this->input->post('id'));
    } else {
        $id = $this->input->post('id');
        $nis = $this->input->post('nis');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $alamat = $this->input->post('alamat');
        $telepon = $this->input->post('telepon');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $nama_kelas = $this->input->post('nama_kelas');
        $photo = $_FILES['userfile']['name'];

        if ($photo) {
            $config['upload_path'] = './assets/uploads';
            $config['allowed_types'] = 'jpg|png|gif|tiff';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('userfile')) {
                $old_photo = $this->siswa_model->ambil_id_siswa($id)->photo;
                if ($old_photo && file_exists(FCPATH . 'assets/uploads/' . $old_photo)) {
                    unlink(FCPATH . 'assets/uploads/' . $old_photo);
                }

                $userfile = $this->upload->data('file_name');
                $this->db->set('photo', $userfile);
            } else {
                echo "Gagal Upload";
            }
        }
        $data = array(
            'nis' => $nis,
            'nama_lengkap' => $nama_lengkap,
            'alamat' => $alamat,
            'telepon' => $telepon,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'nama_kelas' => $nama_kelas,
        );

        $where = array(
            'id' => $id
        );
        $this->siswa_model->update_data($where, $data, 'siswa');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Siswa Berhasil Diupdate!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('administrator/siswa');
    }
}


    public function delete($id)
    {
        $where = array('id' => $id);
        $this->siswa_model->hapus_data($where,'siswa');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Siswa Berhasil Dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('administrator/siswa');
    }
    public function delete_all_siswa()
    {
        $this->db->empty_table('siswa'); // Produces: DELETE FROM siswa
        redirect('administrator/siswa');
    }
    public function download_template_siswa()
    {
        force_download('downloads/template_siswa.csv', null);
    }  

    public function insert_csv_data()
    {
        // Cek apakah file sudah diupload
        if (isset($_FILES['csv_file']) && $_FILES['csv_file']['error'] == 0) {
            $allowed_types = ['text/csv', 'application/vnd.ms-excel', 'application/vnd.oasis.opendocument.spreadsheet', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
    
            if (in_array($_FILES['csv_file']['type'], $allowed_types)) {
                $file = $_FILES['csv_file']['tmp_name'];
    
                // Load file menggunakan PHP Spreadsheet
                $reader = IOFactory::createReaderForFile($file);
                $spreadsheet = $reader->load($file);
                $worksheet = $spreadsheet->getActiveSheet();
    
                // Mendefinisikan urutan kolom sesuai nama field pada database
                $columnOrder = [
                    'nis', 'nama_lengkap', 'alamat', 'telepon', 'tempat_lahir', 'tanggal_lahir',
                    'jenis_kelamin', 'nama_kelas', 'photo'
                ];
    
                // Mendefinisikan baris awal untuk membaca data (skip baris header)
                $startRow = 2;
    
                // Looping baris pada file
                foreach ($worksheet->getRowIterator($startRow) as $row) {
                    $cellIterator = $row->getCellIterator();
                    $cellIterator->setIterateOnlyExistingCells(false);
    
                    // Ambil data dari setiap sel pada baris
                    $data = [];
                    foreach ($columnOrder as $column) {
                        $cell = $cellIterator->current();
                        if ($cell !== null) {
                            $data[$column] = $cell->getValue();
                        } else {
                            $data[$column] = null;
                        }
                        $cellIterator->next();
                    }
    
                    // Lakukan operasi INSERT ke database melalui model
                    $this->siswa_model->insert_siswa($data);
                }
    
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
             Siswa Berhasil Diupload!
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
          </div>');
        redirect('administrator/siswa');
            } else {
                echo 'Silahkan upload file CSV terlebih dahulu';
            }
        } else {
            echo 'Silahkan upload file CSV terlebih dahulu';
        }
    }

  public function download_csv_data()
{
    // Ambil data seluruh siswa dari database menggunakan model
    $siswa = $this->siswa_model->getData();

    // Mendefinisikan urutan kolom sesuai nama field pada database
    $columnOrder = [
        'nis', 'nama_lengkap', 'alamat', 'telepon', 'tempat_lahir', 'tanggal_lahir',
        'jenis_kelamin', 'nama_kelas', 'photo'
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

    // Menulis data siswa pada baris selanjutnya
    $rowIndex = 2;
    foreach ($siswa as $data) {
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
    header('Content-Disposition: attachment; filename="data_siswa.csv"');
    header('Cache-Control: max-age=0');

    // Menulis output ke browser
    $writer->setUseBOM(true); // Agar bisa dibaca di Excel Windows
    $writer->setDelimiter(';'); // Menggunakan semicolon sebagai delimiter
    $writer->setEnclosure('"'); // Menggunakan double quote sebagai enclosure
    $writer->setLineEnding("\r\n"); // Menggunakan CRLF sebagai line ending
    $writer->setSheetIndex(0); // Menuliskan data dari worksheet pertama
    $writer->save('php://output');
}

  public function downloadGambar($id) {
    $this->load->helper('download');
    $this->load->model('image_model');
    $image = $this->siswa_model->get_image($id);
    if ($image) {
        force_download('image.jpg', $image['image']);
    } else {
        show_404();
    }
}

// make function download all image from database
public function downloadAllImage() {
    $path = './assets/uploads';
    $this->load->library('zip');
    $this->zip->clear_data();

    // Get all files in the uploads folder
    $files = get_filenames($path);

    // Loop through the files and add them to the zip
    foreach ($files as $file) {
        $this->zip->read_file($path . '/' . $file);
    }

    // Download the zip file
    $this->zip->download('photo_siswa.zip');
}






    public function _rules()
    {
        $this->form_validation->set_rules('nis','Nis','required',[
            'required' => 'NIS Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('nama_lengkap','Nama_Lengkap','required',[
            'required' => 'Nama Siswa Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('alamat','Alamat','required',[
            'required' => 'Alamat Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('telepon','Telepon','required',[
            'required' => 'Telepon Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('tempat_lahir','Tempat_Lahir','required',[
            'required' => 'Tempat Lahir Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('tanggal_lahir','Tanggal_Lahir','required',[
            'required' => 'Tanggal Lahir Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('jenis_kelamin','Jenis_Kelamin','required',[
            'required' => 'Jenis Kelamin Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('nama_kelas','Nama_Kelas','required',[
            'required' => 'Nama Kelas Wajib Diisi!'
        ]);
 
    
    }

}
