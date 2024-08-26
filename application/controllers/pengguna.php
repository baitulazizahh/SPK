<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	 public function __construct() {
        parent::__construct();
        $this->load->model('m_pengguna');
		$this->load->library('form_validation');
    }
	public function index()
	{
		$title['title']= 'Data Pengguna';
		$data2['user'] = $this->db->get_where('tb_user',['email'=>
		$this->session->userdata('email')])->row_array();

		$data['datarole']=$this->m_pengguna->getRoles();
		$data['user'] = $this->m_pengguna->tampil_data();

		$this->load->view('templates/header', $title);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar',$data2);
		$this->load->view('user', $data);
		// $this->load->view('templates/footer');	
	}

	

	public function tambah_aksi(){
		
		// Validasi form
		$this->form_validation->set_rules('nama', 'nama', 'required|trim');
		$this->form_validation->set_rules('email', 'email', 'required|trim');
		$this->form_validation->set_rules('password', 'password', 'required|trim');
		$this->form_validation->set_rules('id_role', 'role', 'required|trim');
		$this->form_validation->set_message('required', '{field} harus diisi!');
		// $this->load->view('user', $role);

		if ($this->form_validation->run() == false) {
			// Jika validasi gagal, muat ulang tampilan dengan pesan kesalahan
			$this->index();
			$this->session->set_flashdata('modal_open', true);
		} else {
			// Jika validasi berhasil, proses data untuk dimasukkan ke database
			$nama = htmlspecialchars($this->input->post('nama', true));
			$email = htmlspecialchars($this->input->post('email', true));
			$id_role = htmlspecialchars($this->input->post('id_role', true));
			$password = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);
			// Siapkan data untuk dimasukkan ke database
			$data = array(
				'nama' => $nama,
				'email' => $email,
				'password' => $password,
				'id_role' => $id_role,
				'is_active' =>1,  
                'date_created' => time()
			);
	
			// Masukkan data ke tabel tb_alternatif
			$this->m_pengguna->input_data($data, 'tb_user');
			
			// Redirect ke halaman index alternatif
			redirect('pengguna/index');
		}
		
	}
    
	public function hapus($id){
        $where =  array ('id_role'=> $id);
        $this->m_data->hapus_data($where,'tb_user');
        redirect('pengguna/index');

    }

	public function update(){
		// Ambil data dari input POST
        $id         	= $this->input->post('id');
        $id_kriteria    = $this->input->post('id_kriteria');
        $nama_kriteria  = $this->input->post('nama_kriteria');
        $jenis_kriteria = $this->input->post('jenis_kriteria');
        $bobot    		= $this->input->post('bobot');
        
		// Persiapkan data untuk diupdate
        $data = array(
			'id'				=>$id,
			'id_kriteria'		=>$id_kriteria,
            'nama_kriteria'     =>$nama_kriteria,
            'jenis_kriteria'    =>$jenis_kriteria,
            'bobot' 			=>$bobot
        );

		// Kondisi untuk menentukan data yang akan diupdate
        $where = array(
            'id'=>$id
        );

		// Panggil metode update_data di model
		$this->m_data->update_data($where, $data, 'tb_kriteria');

		// Redirect ke halaman alternatif/index
        redirect('kriteria/index');

    }

    

}
