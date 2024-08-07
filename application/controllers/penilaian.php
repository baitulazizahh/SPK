<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

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

		
		// $data['alternatif'] = $this->m_alternatif->get_alternatif();
		$data['penilaian'] = $this->m_penilaian->tampil_data();
		$data['kriteria'] = $this->m_data->tampil_data(); // Mengambil data dari model
		$data['subkriteria']= $this->m_subkriteria->get_all_subkriteria_grouped();
		$data['alternatif'] = $this->m_alternatif->tampil_data();
		// echo '<pre>';
        // print_r($data['penilaian']);
        // echo '</pre>';
        // exit; // Stop execution here to see the output
		 // Misalkan Anda ingin menggunakan alternatif pertama untuk form
		 if (!empty($data['alternatif'])) {
	
		} else {
			$data['id'] = null; // Atau berikan nilai default lainnya
		}

		$this->load->view('templates/header', $title);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $user);
		$this->load->view('penilaian', $data);
		// $this->load->view('templates/footer');
		
	}

	// public function tambah($id_alternatif) {
    //     $data = array(
    //         'id_alternatif' => $id_alternatif,
    //         'nilai' => 0 // Nilai default atau sesuai kebutuhan
    //     );

    //     $this->db->insert('tb_penilaian', $data);
    //     redirect('penilaian');
    // }

	public function hapus($id){
        $where = array ('id_penilaian'=> $id);
        $this->m_penilaian->hapus_data($where,'tb_penilaian');
        redirect('penilaian/index');

    }

	public function tambah_aksi() {
		$kriteria = $this->m_data->tampil_data();
		$id_alternatif = $this->input->post('id');
		$c1 = $this->input->post('subkriteria_1') ?? 0;
        $c2 = $this->input->post('subkriteria_2') ?? 0;
        $c3 = $this->input->post('subkriteria_3') ?? 0;
        $c4 = $this->input->post('subkriteria_4') ?? 0;
        $c5 = $this->input->post('subkriteria_5') ?? 0;
        $c6 = $this->input->post('subkriteria_6') ?? 0;
	

		// Periksa apakah id_alternatif diisi
		if (empty($id_alternatif)) {
			// Redirect atau tampilkan pesan kesalahan jika id_alternatif kosong
			redirect('penilaian/index');
			return;
		}

		$data = array(
			'id_alternatif' => $id_alternatif,
			'c1' => $c1,
			'c2' => $c2,
			'c3' => $c3,
			'c4' => $c4,
			'c5' => $c5,
			'c6' => $c6
		);
		
		// foreach ($kriteria as $k) {
		// 	$nilai_subkriteria = $this->input->post('subkriteria_' . $k->id_kriteria);
		// 	if (!empty($nilai_subkriteria)) {
		// 		$data_to_insert['c']= $nilai_subkriteria ;
		// 	}
		// }

      
        // Simpan ke database
		
		$this->m_penilaian->insert($data, 'tb_penilaian');

        // Redirect kembali ke halaman sebelumnya atau halaman lain
        redirect('perhitungan/index');
    }

}