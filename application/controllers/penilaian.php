<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('m_penilaian');
		$this->load->model('m_alternatif');
		$this->load->model('m_subkriteria');
		$this->load->model('m_data');
    }
	public function index()
	{
		$title['title']= 'Penilaian';
		$user['user'] = $this->db->get_where('tb_user',['email'=>
		$this->session->userdata('email')])->row_array();

		$data['penilaian'] = $this->m_penilaian->tampil_data();
		$data['kriteria'] = $this->m_data->tampil_data(); // Mengambil data dari model
		$data['subkriteria']= $this->m_subkriteria->get_all_subkriteria_grouped();
		$data['alternatif'] = $this->m_alternatif->tampil_data();

		$this->load->view('templates/header', $title);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $user);
		$this->load->view('penilaian', $data);
		// $this->load->view('templates/footer');
		
	}

	
	
	public function tambah_aksi() {

		$kriteria = $this->m_data->tampil_data();
		$id_alternatif = $this->input->post('id_alternatif');
		$data_to_insert = [];

		// Periksa apakah id_alternatif diisi
		if (empty($id_alternatif)) {
			// Redirect atau tampilkan pesan kesalahan jika id_alternatif kosong
			redirect('penilaian/index');
			return;
		}

		foreach ($kriteria as $k) {
            $nilai_subkriteria = $this->input->post('subkriteria_' . $k->id_kriteria);
            if (!empty($nilai_subkriteria)) {
                $data_to_insert[] = [
                    'id_alternatif' => $id_alternatif,
                    'id_kriteria' => $k->id,
                    'nilai' => $nilai_subkriteria
                ];
            }
        }	
        // Simpan ke database
		foreach ($data_to_insert as $data) {
            $this->m_penilaian->insert($data);
        }

        // Redirect kembali ke halaman sebelumnya atau halaman lain
        redirect('perhitungan/index');
    }

	public function getDataById() {
		$id_alternatif = $this->input->get('id_alternatif');
		$this->load->model('m_penilaian');
		$data = $this->m_penilaian->get_alternatif_by_id($id_alternatif);
		echo json_encode($data);
	}

	public function get_alternatif_by_id($id_alternatif) {
		$this->db->where('id_alternatif', $id_alternatif);
		$query = $this->db->get('tb_penilaian');  // Sesuaikan dengan tabel Anda
		return $query->row();
	}

	public function updateData() {
		$id_alternatif = $this->input->post('id_alternatif');
		$data = array(
			// Ambil semua data dari form
			'c1' => $this->input->post('subkriteria_1'),
			'c2' => $this->input->post('subkriteria_2'),
			'c3' => $this->input->post('subkriteria_3'),
			'c4' => $this->input->post('subkriteria_4'),
			'c5' => $this->input->post('subkriteria_5'),
			'c6' => $this->input->post('subkriteria_6')
		);
	
		$this->load->model('m_penilaian');
		$this->m_penilaian->update_alternatif($id_alternatif, $data);
	
		redirect('penilaian'); // Redirect ke halaman penilaian atau halaman lain sesuai kebutuhan
	}
	
	
	public function update_alternatif($id_alternatif, $data) {
		$this->db->where('id_alternatif', $id_alternatif);
		$this->db->update('tb_penilaian', $data);
	}
	

}