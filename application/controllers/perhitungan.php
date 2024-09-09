<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perhitungan extends CI_Controller {

	public function __construct() {
        parent::__construct();
       $this->load->model('m_perhitungan');
       $this->load->model('m_permohonan');
	   $this->load->model('m_data');	
    }
	public function index()
	{
		
		$title['title']= 'Perhitungan';
		$user['user'] = $this->db->get_where('tb_user',['email'=>
		$this->session->userdata('email')])->row_array();

        $data['penilaian'] = $this->m_perhitungan->get_penilaian_with_nama();
        $data['bobot_kriteria'] = $this->m_data->getBobotKriteria();
       
       
		$this->load->view('templates/header',$title);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $user);
		$this->load->view('perhitungan', $data);
		
	}
    
    public function simpanHasil() {
        // Pastikan Anda memuat model terlebih dahulu
        $this->load->model('m_hasil');

        // Mendapatkan data dari form
        $id_permohonan = $this->input->post('id_permohonan');
        $nilai_ki = $this->input->post('Ki');

        // Proses menyimpan data ke dalam database
        if (!empty($id_permohonan) && !empty($nilai_ki)) {
            for ($i = 0; $i < count($id_permohonan); $i++) {
                $dataToInsert = [
                    'id_permohonan' => $id_permohonan[$i],
                    'hasil' => $nilai_ki[$i]
                ];

                // Insert data ke tabel hasil
                $this->m_hasil->insertHasil($dataToInsert);
            }

            // Redirect setelah data berhasil disimpan
            $this->session->set_flashdata('message', 'Data berhasil disimpan');
            redirect('hasil'); // Ganti dengan URL halaman hasil
        } else {
            // Jika data tidak valid, tampilkan error
            $this->session->set_flashdata('message', 'Gagal menyimpan data');
            redirect('hasil'); // Ganti dengan URL halaman hasil
        }
    }   

    
    
    
    

}