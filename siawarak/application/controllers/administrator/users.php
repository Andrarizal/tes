<?php

class Users extends CI_Controller{
    public function index()
    {
        $data['users'] = $this->user_model->tampil_data('user')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('administrator/daftar_users', $data);
        $this->load->view('admin/footer');  
    }
    public function tambah_users()
    {
        $data = array(
            'username' => set_value('username'),
            'password' => set_value('password'),
            'email' => set_value('email'),
            'level' => set_value('level'),
            'blokir' => set_value('blokir'),
        );
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('administrator/users_form', $data);
        $this->load->view('admin/footer');
    }
    public function tambah_users_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE)
        {
            $this->tambah_users(); 
        }else{
            $data = array(
                'username' => $this->input->post('username', TRUE),
                'password' => md5($this->input->post('password', TRUE)),
                'email' => $this->input->post('email', TRUE),
                'level' => $this->input->post('level', TRUE),
                'blokir' => $this->input->post('blokir', TRUE),
                'id_session' => md5($this->input->post('id_session', TRUE)),
            );

            $this->user_model->insert_data($data, 'user');

            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
           User Berhasil Ditambah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('administrator/users');
        }

    }
    public function _rules()
    {
        $this->form_validation->set_rules('username','Username','required',[
            'required' => 'Username Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('password','Password','required',[
            'required' => 'Password Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('email','Email','required',[
            'required' => 'Email Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('level','Level','required',[
            'required' => 'Level Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('blokir','Blokir','required',[
            'required' => 'Blokir Wajib Diisi!'
        ]);

        
    }
    public function update($id)
    {
        $where = array('id' => $id);

        $data['users'] = $this->user_model->edit_data($where, 'user')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('administrator/users_update', $data);
        $this->load->view('admin/footer');
    }

    public function update_aksi()
    {
        // tangkap data yang akan diedit dengan melalui method post
        $id = $this->input->post('id');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $level = $this->input->post('level');
        $blokir = $this->input->post('blokir');
        $id_session = $this->input->post('id_session');    

        // data masukan kedalam array
        $data = array (
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'level' => $level,
            'blokir' => $blokir,
        );
        // variable 
        $where = array(
            'id' => $id
        );

        // setelah berhasil di update flashdata data berhasil diupdate
        $this->user_model->update_data($where, $data,'user'); 
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        User Berhasil Diupdate!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    redirect('administrator/users');
    }
    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->user_model->hapus_data($where,'user');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            User Berhasil Dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('administrator/users');
    }

}