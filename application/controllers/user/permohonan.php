<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permohonan extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('m_pengguna');
		$this->load->model('m_permohonan');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('upload');
    }

	public function index()
	{
		$data['title']= 'User';
		$user['user'] = $this->db->get_where('tb_user',['email'=>
		$this->session->userdata('email')])->row_array();

		$id_user = $this->session->userdata('id_user');
		$data['user'] = $this->m_pengguna->getUser($id_user);

		// $id_permohonan = $this->session->userdata('id_');
		// $data['user'] = $this->m_pengguna->getUser($id_user);

		$data['permohonan'] = $this->m_permohonan->tampil_data();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/user_sidebar');
		$this->load->view('templates/topbar',$user);
		$this->load->view('user_permohonan', $data);
		// $this->load->view('templates/footer');
		
	}

	public function tambah_aksi(){

		// Validasi input form
		$this->form_validation->set_rules('nama_usaha', 'Nama Usaha', 'required');

		if($this->form_validation->run()==false){
			//Jika validasi gagal kembali ke halaman awal
			$this->session->set_flashdata('modal_open', 'true');
			$this->index();
		} else{
			// Ambil id user dari session
			$id_user =$this->session->userdata('id_user');

			//Proses upload file
			$proposal =$this->uploadFile('proposal');
			$sku =$this->uploadFile('sku');
			$kk =$this->uploadFile('kk');
			$ktp =$this->uploadFile('ktp');


			//Membuat array data yang akan disimpan
			$data=[
				'id_user' => $id_user, // Menambahkan ID user ke data
                'nama_usaha' => $this->input->post('nama_usaha'),
                'pendapatan' => $this->input->post('pendapatan'),
                'tanggungan' => $this->input->post('tanggungan'),
                'proposal' => $proposal,
                'sku' => $sku,
                'kk' => $kk,
                'ktp' => $ktp,
				'status' => 'Diproses',
				'created'=> date('Y')
			];
			
		}
	
		// Masukkan data ke tabel tb_alternatif
		$this->m_permohonan->input_data($data, 'tb_permohonan');
		$this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil ditambahkan</div>');
        redirect('user/permohonan'); // Redirect ke halaman permohonan
			
	}

	private function uploadFile($fieldName) {
        $config['upload_path'] = './uploads/'; // Direktori tempat file akan disimpan
        $config['allowed_types'] = 'pdf|png|jpeg|jpg'; // Jenis file yang diperbolehkan
        $config['max_size'] = 2048; // Ukuran maksimum file (2MB)

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($fieldName)) {
            // Jika upload gagal, tampilkan error
            $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
            return '';
        } else {
            // Jika upload berhasil, kembalikan nama file yang diupload
            return $this->upload->data('file_name');
        }
    }
		
}



