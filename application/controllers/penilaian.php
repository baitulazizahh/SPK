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
		$data['kriteria'] = $this->m_data->tampil_data(); // Mengambil data dari model
		$data['subkriteria']= $this->m_subkriteria->get_all_subkriteria_grouped();
		$data['penilaian'] = $this->m_alternatif->tampil_data();

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

	public function update(){
		// Ambil data dari input POST
		// $penilaian = $this->m_penilaian->get_penilaian_by-alternatif($id_alternatif);
		// var_dump($penilaian);

		$id_penilaian	= $this->input->post('id_penilaian');
        $id_alternatif  = $this->input->post('id_alternatif');
        $id_kriteria    = $this->input->post('id_kriteria');
		$nilai_subkriteria = [];

		// Loop untuk mendapatkan nilai subkriteria berdasarkan kriteria
		foreach ($id_kriteria as $kriteria_id) {
			$nilai = $this->input->post('subkriteria_' . $kriteria_id);
			$data = array(
				'id_alternatif' => $id_alternatif,
				'id_kriteria' => $kriteria_id,
				'nilai' => $nilai,
			);

			 // Kondisi untuk menentukan data yang akan diupdate
			 $where = array(
				'id_alternatif' => $id_alternatif,
				'id_kriteria' => $kriteria_id
			);

			// Panggil metode update_data di model
			$this->m_penilaian->update_data($where, $data, 'tb_penilaian');
			}

			// Redirect ke halaman penilaian/index
			redirect('penilaian/index');
		}	
       
        // $data = array(
		// 	'id_alternatif'	    =>$id_alternatif,
		// 	'id_kriteria'		=>$id_kriteria,
        //     'nilai'             =>$nilai_subkriteria,
        // );
		// // Kondisi untuk menentukan data yang akan diupdate
        // $where = array(
        //     'id_alternatif'=>$id_alternatif
        // );

		// // Panggil metode update_data di model
		// $this->m_data->update_data($where, $data, 'tb_penilaian');

		// // Redirect ke halaman alternatif/index
        // redirect('penilaian/index');

    }

	// public function update_penilaian(){
	// 	$id_alternatif =$this->input->post('id_alternatif');
	// 	$nilai = $this->input->post('nilai');
	// 	$id_kriteria = array_keys('id_kriteria');
	// 	$i = 0;

	// 	foreach($nilai as $key){
	// 		$cek = $this->m_penilaian->tampil-data($id_alternatif, $id_kriteria[$i], $key);
	// 		if ($cek==0){
	// 			$this->m_penilaian->tambah_data($id_alternatif, $id_kriteria[$i], $key);
	// 		}
	// 		else {
	// 			$this->m_penilaian->edit_penilaian($id_alternatif, $id_kriteria[$i], $key);
	// 		}
	// 		$i++;
	// 	}
	// 	// Redirect kembali ke halaman sebelumnya atau halaman lain
    //     redirect('perhitungan/index');	
	// }

	// public function getDataById() {
	// 	$id_alternatif = $this->input->get('id_alternatif');
	// 	$this->load->model('m_penilaian');
	// 	$data = $this->m_penilaian->get_alternatif_by_id($id_alternatif);
	// 	echo json_encode($data);
	// }

	// public function get_alternatif_by_id($id_alternatif) {
	// 	$this->db->where('id_alternatif', $id_alternatif);
	// 	$query = $this->db->get('tb_penilaian');  // Sesuaikan dengan tabel Anda
	// 	return $query->row();
	// }

	// public function updateData() {

		
	// 	//$id_penilaian= $this->input->post('id_penilaian');
	// 	$id_alternatif = $this->input->post('id_alternatif');
	// 	//$id_kriteria = $this->input->post('id_kriteria');
	// 	$nilai_subkriteria = $this->input->post('nilai');
		
	// 	$data = array(
	// 		// Ambil semua data dari form
	// 		'nilai' => $nilai_subkriteria
	// 	);
		
	// 	// Kondisi untuk menentukan data yang akan diupdate
	// 	$where = array(
	// 		'id_alternatif'=>$id_alternatif
	// 	);
		
		
	// 	// Panggil metode update_data di model
	// 	$this->m_data->update_data($where, $data, 'tb_penilaian');


	// }
	
	
	// public function update_alternatif($id_alternatif, $data) {
	// 	$this->db->where('id_alternatif', $id_alternatif);
	// 	$this->db->update('tb_penilaian', $data);
	// }


