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
		 // Ambil data subkriteria untuk masing-masing kriteria
		//  foreach ($data['kriteria'] as $kriteria) {
        //     $data['subkriteria'][$kriteria->id_kriteria] = $this->m_subkriteria->get_subkriteria_by_kriteria($kriteria->id_kriteria);
        // }
		

		// $data['penilaian'] = $this->m_penilaian->get_all_penilaian(); // Ambil data penilaian
        // $data['subkriteria_c1'] = $this->m_subkriteria->get_subkriteria_by_kriteria(1); // Ambil subkriteria untuk C1
        // $data['subkriteria_c2'] = $this->m_subkriteria->get_subkriteria_by_kriteria(2); // Ambil subkriteria untuk C2
        // $data['subkriteria_c3'] = $this->m_subkriteria->get_subkriteria_by_kriteria(3); // Ambil subkriteria untuk C3
        // $data['subkriteria_c4'] = $this->m_subkriteria->get_subkriteria_by_kriteria(4); // Ambil subkriteria untuk C4
        // $data['subkriteria_c5'] = $this->m_subkriteria->get_subkriteria_by_kriteria(5); // Ambil subkriteria untuk C5
        // $data['subkriteria_c6'] = $this->m_subkriteria->get_subkriteria_by_kriteria(6); // Ambil subkriteria untuk C6		

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
        // Load model
        $this->load->model('m_penilaian');

        // Ambil data dari form
        $data = $this->input->post();

        // Siapkan data untuk disimpan ke tabel perhitungan
        $data_penilaian = array(
			'id_alternatif' => $data['id_alternatif'],
            // misalnya ada input untuk nama alternatif
            // Tambahkan field lain sesuai kebutuhan
        );

        // Simpan ke database
        $this->m_penilaian->insert_penilaian($data_penilaian);

        // Redirect kembali ke halaman sebelumnya atau halaman lain
        redirect('perhitungan/index');
    }

}