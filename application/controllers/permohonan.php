<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permohonan extends CI_Controller {

	public function __construct() {
        parent::__construct();
        // $this->load->model('m_pengguna');
		$this->load->model('m_permohonan');
		$this->load->model('m_subkriteria');
		$this->load->model('m_data');
		$this->load->library('form_validation');
		$this->load->library('session');
		// $this->load->library('upload');
		// $this->load->helper(['url', 'form']);
    }

	public function index()
	{
		$data['title']= 'User';
		$user['user'] = $this->db->get_where('tb_user',['email'=>
		$this->session->userdata('email')])->row_array();

		// Ambil id_permohonan dari session
		$id_user = $this->session->userdata('id_user');
    	$id_permohonan = $this->session->userdata('id_permohonan'); 

		// $id_user = $this->session->userdata('id_user');
		// $id_permohonan = $this->session->userdata('id_permohonan');
		
		// $data['id_permohonan'] 	= $id_permohonan; 
		$data['kriteria'] 	= $this->m_data->tampil_data(); 
		$data['subkriteria']= $this->m_subkriteria->get_all_subkriteria_grouped();
		$data['permohonan'] = $this->m_permohonan->tampil_data();
		$data['id_permohonan'] = $id_permohonan;

		
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar',$user);
		$this->load->view('permohonan', $data);
		// $this->load->view('templates/footer');
	}

	public function pilih_permohonan($id_permohonan)
	{
		// Simpan id_permohonan ke session
		$this->session->set_userdata('id_permohonan', $id_permohonan);

		// Redirect ke halaman di mana ID tersebut dibutuhkan
		redirect('permohonan/index');
	}

	public function tambah_penilaian() {

		$kriteria = $this->m_data->tampil_data();
		$id_permohonan = $this->input->post('id_permohonan');
		$data_to_insert = [];

		// Periksa apakah id_alternatif diisi
		if (empty($id_permohonan)) {
			// Redirect atau tampilkan pesan kesalahan jika id_alternatif kosong
			redirect('permohonan/index');
			return;
		}

		foreach ($kriteria as $k) {
			$selected_value = $this->input->post('subkriteria_' . $k->id_kriteria);
			if (!empty($selected_value)) {
				// Pisahkan id_subkriteria dan nilai_subkriteria
				list($id_subkriteria, $nilai_subkriteria) = explode(',', $selected_value);
		
				$data_to_insert[] = [
					'id_permohonan' => $id_permohonan,
					'id_kriteria' => $k->id,
					'id_subkriteria' => $id_subkriteria,
					'nilai' => $nilai_subkriteria,
				];
			}
		}
			
        // Simpan ke database
		foreach ($data_to_insert as $data) {
            $this->m_permohonan->insert($data);
        }

        // Redirect kembali ke halaman sebelumnya atau halaman lain
        redirect('perhitungan/index');
	}

		
}



