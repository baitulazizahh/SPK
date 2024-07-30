<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subkriteria extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	
	
		public function __construct() {
			parent::__construct();
			$this->load->model('m_subkriteria'); // Pastikan Anda memuat model yang benar
			// Atau jika Anda menggunakan M_subkriteria
			// $this->load->model('m_subkriteria');
			$this->load->library('form_validation');
		}
	
		public function index() {

		
			$data['title'] = 'Subkriteria';

			$data2['user'] = $this->db->get_where('tb_user',['email'=>
			$this->session->userdata('email')])->row_array();

	
			// Ambil data kriteria
			$data['kriteria'] = $this->m_subkriteria->get_all_kriteria();
	
			// Ambil data subkriteria berdasarkan kriteria
			$data['subkriteria'] = $this->m_subkriteria->get_all_subkriteria();

	
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data2);
			$this->load->view('subkriteria', $data);
			$this->load->view('templates/footer');




		}
	
		// Method tambahan untuk menyimpan subkriteria
		public function tambah_aksi() {
			$id_kriteria = htmlspecialchars($this->input->post('id_kriteria', true));
			$nama_subkriteria = htmlspecialchars($this->input->post('nama_subkriteria', true));
			$nilai = htmlspecialchars($this->input->post('nilai', true));
	
			$data = array(
				'id_kriteria' => $id_kriteria,
				'nama_subkriteria' => $nama_subkriteria,
				'nilai' => $nilai,
			);
	
			$this->m_subkriteria->input_data($data, 'tb_subkriteria');
		
			
			redirect('subkriteria/index');
		}
	}
	
	
