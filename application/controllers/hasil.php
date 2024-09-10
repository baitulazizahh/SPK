<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil extends CI_Controller {
	 
	public function __construct() {
        parent::__construct();
        $this->load->model('m_hasil');
		// $this->load->library('form_validation');
    }
	public function index()
	{
		// $this->load->model('m_perhitungan');
		// $data['alternatif'] = $this->m_perhitungan->tampil_data()->result();
		$title['title']= 'Hasil akhir';
		$user['user'] = $this->db->get_where('tb_user',['email'=>
		$this->session->userdata('email')])->row_array();
		
		$years = $this->m_hasil->get_periode();

		// Mengecek apakah tahun dipilih dari dropdown
		if ($this->input->post('tahun_periode')) {
			$selected_year = $this->input->post('tahun_periode');
			
			// Ambil data hasil berdasarkan tahun yang dipilih
			$hasil = $this->m_hasil->get_data_by_year($selected_year);
	
			// Kirim data ke view
			$data = [
				'years' => $years,
				'selected_year' => $selected_year,
				'hasil' => $hasil,
			];
		} else {
			// Jika belum memilih tahun, hanya kirim data tahun
			$data = [
				'years' => $years,
				'selected_year' => null,
				'hasil' => []
			];
		}
		

		$this->load->view('templates/header', $title);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $user);
		// Tampilkan view hasil akhir
		$this->load->view('hasil', $data);
		// $this->load->view('templates/footer');

		
	}
	public function filtered_data() {
		$tahun = $this->input->get('tahun');
	
		// Ambil data tahun untuk dropdown
		$data['years'] = $this->m_hasil->get_periode();
	
		// Jika tahun dipilih, ambil data hasil berdasarkan tahun
		if ($tahun) {
			$data['hasil'] = $this->m_hasil->get_data_by_year($tahun);
		} else {
			// Jika belum ada tahun yang dipilih, tampilkan halaman kosong
			$data['hasil'] = [];
		}
	
		// Load view dengan data
		$this->load->view('hasil', $data);
	}
	



}