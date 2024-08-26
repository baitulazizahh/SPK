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
			$this->load->model('m_subkriteria');
			$this->load->library('form_validation');
		}
	
		public function index() {

		
			$data['title'] = 'Subkriteria';

			$data2['user'] = $this->db->get_where('tb_user',['email'=>
			$this->session->userdata('email')])->row_array();

	
			// Ambil data kriteria
			$data['kriteria'] = $this->m_subkriteria->get_all_kriteria();
	
			// Ambil data subkriteria berdasarkan kriteria
			$subkriteria = $this->m_subkriteria->get_all_subkriteria();

			// Mengelompokkan subkriteria berdasarkan id kriteria
			$subkriteria_by_kriteria= array();
			foreach ($subkriteria as $sk){
				$subkriteria_by_kriteria[$sk->id_kriteria][]= $sk;
			}
			
			$data['subkriteria_by_kriteria'] = $subkriteria_by_kriteria;

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data2);
			$this->load->view('subkriteria', $data);
			// $this->load->view('templates/footer');

		}
		
	
		// Method tambahan untuk menyimpan subkriteria
		public function tambah_aksi() {
			
			$data2['user'] = $this->db->get_where('tb_user',['email'=>
			$this->session->userdata('email')])->row_array();
			
			// Ambil data kriteria
			$data['kriteria'] = $this->m_subkriteria->get_all_kriteria();
	
			
			// Ambil data subkriteria berdasarkan kriteria
			$subkriteria = $this->m_subkriteria->get_all_subkriteria();
			
			// Mengelompokkan subkriteria berdasarkan id kriteria
			$subkriteria_by_kriteria= array();
			foreach ($subkriteria as $sk){
				$subkriteria_by_kriteria[$sk->id_kriteria][]= $sk;
			}

			$data['subkriteria_by_kriteria'] = $subkriteria_by_kriteria;

			// Validasi form
			$this->form_validation->set_rules('id_kriteria', 'Id kiteria', 'required|trim');
			$this->form_validation->set_rules('nama_subkriteria', 'Nama kriteria', 'required|trim');
			$this->form_validation->set_rules('nilai', 'Nilai', 'required|trim');
		
			if ($this->form_validation->run() == false) {
				// Jika validasi gagal, muat ulang tampilan dengan pesan kesalahan
				$title['title'] = 'Subkriteria';
				$this->load->view('templates/header', $title);
				$this->load->view('templates/sidebar');
				$this->load->view('templates/topbar', $data2);
				$this->load->view('subkriteria', $data);
				$this->session->set_flashdata('modal_open', true);
			} else{
				// Jika validasi berhasil, proses data untuk dimasukkan ke database
				$id_kriteria = htmlspecialchars($this->input->post('id_kriteria', true));
				$nama_subkriteria = htmlspecialchars($this->input->post('nama_subkriteria', true));
				$nilai = htmlspecialchars($this->input->post('nilai', true));
		
				// Siapkan data untuk dimasukkan ke database
				$data = array(
					'id_kriteria' => $id_kriteria,
					'nama_subkriteria' => $nama_subkriteria,
					'nilai' => $nilai,
				);
		
				$this->m_subkriteria->input_data($data, 'tb_subkriteria');
				
				redirect('subkriteria/index');
			}

			
		}

		public function input() {
			$data['kriteria'] = $this->m_kriteria->get_all_kriteria();
			$data['subkriteria'] = $this->m_subkriteria->get_all_subkriteria();
			$this->load->view('subkriteria', $data);
		}
		
		public function hapus($id_subkriteria){
			$where =  array ('id_subkriteria'=> $id_subkriteria);
			$this->m_subkriteria->hapus_data($where,'tb_subkriteria');
			redirect('subkriteria/index');
	
		}


		public function update() {
			$id_subkriteria = $this->input->post('id_subkriteria');
			$nama_subkriteria = $this->input->post('nama_subkriteria');
			$nilai = $this->input->post('nilai');
		
			$data = array(
				'nama_subkriteria' => $nama_subkriteria,
				'nilai' => $nilai
			);
		
			$this->load->model('m_subkriteria');
			$update = $this->m_subkriteria->update_data($id_subkriteria, $data);
		
			// if ($update) {
			// 	$this->session->set_flashdata('message', 'Data berhasil diperbarui.');
			// } else {
			// 	$this->session->set_flashdata('message', 'Gagal memperbarui data.');
			// }
		
			redirect('subkriteria');
		}
		
	}
	
	
