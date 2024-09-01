<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permohonan extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('m_pengguna');
		$this->load->model('m_permohonan');
		$this->load->library('form_validation');
		$this->load->library('upload');
    }

	public function index()
	{
		$data['title']= 'User';
		$user['user'] = $this->db->get_where('tb_user',['email'=>
		$this->session->userdata('email')])->row_array();

		$id_user = $this->session->userdata('id_user');
		$data['user'] = $this->m_pengguna->getUser($id_user);
		$data['permohonan'] = $this->m_permohonan->tampil_data();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/user_sidebar');
		$this->load->view('templates/topbar',$user);
		$this->load->view('user_permohonan', $data);
		// $this->load->view('templates/footer');
		
	}

	public function tambah_aksi(){
		// Mengambil data pengguna berdasarkan email yang ada di session
		$data2['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
			

	
		// Validasi form
		$this->form_validation->set_rules('id_kriteria', 'Id kiteria', 'required|trim');
		$this->form_validation->set_rules('nama_kriteria', 'Nama kriteria', 'required|trim');
		$this->form_validation->set_rules('jenis_kriteria', 'Jenis kiteria', 'required|trim');
		$this->form_validation->set_rules('bobot', 'Bobot', 'required|trim');
		$this->form_validation->set_message('required', '{field} harus diisi!');
	
		if ($this->form_validation->run() == false) {
			// Jika validasi gagal, muat ulang tampilan dengan pesan kesalahan
			$title['title'] = 'Kriteria';
			$this->load->view('templates/header', $title);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data2);
			$this->load->view('kriteria', $data);
			$this->session->set_flashdata('modal_open', true);
		} else {
			// Jika validasi berhasil, proses data untuk dimasukkan ke database
			$id_kriteria = htmlspecialchars($this->input->post('id_kriteria', true));
			$nama_kriteria = htmlspecialchars($this->input->post('nama_kriteria', true));
			$jenis_kriteria = htmlspecialchars($this->input->post('jenis_kriteria', true));
			$bobot = htmlspecialchars($this->input->post('bobot', true));
	
			// Siapkan data untuk dimasukkan ke database
			$data = array(
				'id_kriteria' => $id_kriteria,
				'nama_kriteria' => $nama_kriteria,
				'jenis_kriteria' => $jenis_kriteria,
				'bobot' => $bobot,
			);
	
			// Masukkan data ke tabel tb_alternatif
			$this->m_data->input_data($data, 'tb_kriteria');
			
			// Redirect ke halaman index alternatif
			redirect('kriteria/index');
		}
		
	}



}