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

		$data['penilaian2'] = $this->m_penilaian->tampil_data();
		$data['kriteria'] 	= $this->m_data->tampil_data(); // Mengambil data dari model
		$data['subkriteria']= $this->m_subkriteria->get_all_subkriteria_grouped();
		$data['penilaian'] 	= $this->m_alternatif->tampil_data();
		

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
					//'id_subkriteria' =>$id_subkriteria,
                    'nilai' => $nilai_subkriteria,
					
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

	// Function untuk menampilkan data ke modal edit
    public function edit($id_alternatif) {
        // Ambil data penilaian berdasarkan id_alternatif
		$penilaian = $this->m_penilaian->getPenilaianByAlternatif($id_alternatif);
		// $data['penilaian'] = $this->m_penilaian->getPenilaianByAlternatif($id_alternatif);

		 // Organisir data penilaian berdasarkan id_kriteria
		 $penilaian_by_kriteria = [];
		 foreach ($penilaian as $p) {
			 $penilaian_by_kriteria[$p->id_kriteria] = $p;
		 }
		 $data['penilaian_by_kriteria'] = $penilaian_by_kriteria;
		 $data['id_alternatif'] = $id_alternatif;
		 
	
		// Load view dan kirimkan data ke view
        $this->load->view('penilaian', $data);
		//echo json_encode ($data['penilaian'] );
		
    }
	
		
}
	

	
	
	


