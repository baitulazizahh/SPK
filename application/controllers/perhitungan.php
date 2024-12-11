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

        $years = $this->m_perhitungan->get_periode();
        $bobot_kriteria = $this->m_data->getBobotKriteria();
        
         // Inisialisasi data untuk dikirim ke view
        $data = [
            'years' => $years,
            'selected_year' => null,
            'penilaian' => [], // Data penilaian akan diisi jika tahun dipilih
            'bobot_kriteria' => $bobot_kriteria
        ];
        
        // Mengecek apakah tahun dipilih dari dropdown
		if ($this->input->post('tahun_periode')) {
			$selected_year = $this->input->post('tahun_periode');
			
			// Ambil data hasil berdasarkan tahun yang dipilih
			$penilaian = $this->m_perhitungan->get_penilaian_with_name($selected_year);
	
			  // Perbarui data untuk dikirim ke view
              $data['selected_year'] = $selected_year;
              $data['penilaian'] = $penilaian; // Data hasil diisi berdasarkan tahun yang dipilih
		} 
       
		$this->load->view('templates/header',$title);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $user);
		$this->load->view('perhitungan', $data);
		
	}
    
    public function simpanHasil() {
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
    
    public function simpanPenerima() {
        // Ambil data dari POST 
        $id_permohonan = $this->input->post('id_permohonan');
        $Ki = $this->input->post('Ki');
    
        // Gabungkan id_permohonan dan Ki dalam array asosiatif
        $data_ranking = [];
        foreach ($id_permohonan as $key => $id) {
            $data_ranking[] = [
                'id_permohonan' => $id,
                'Ki' => $Ki[$key]
            ];
        }
    
        // Urutkan data berdasarkan nilai Ki secara descending (dari terbesar ke terkecil)
        usort($data_ranking, function($a, $b) {
            return $b['Ki'] <=> $a['Ki'];
        });
    
        // Ambil 40% dari data yang diurutkan
        $total_data = count($data_ranking);
        $limit = ceil($total_data * 0.4); // Mengambil 40% data teratas
    
        // Loop untuk data yang termasuk dalam 40% teratas
        for ($i = 0; $i < $limit; $i++) {
            $id_permohonan_terpilih = $data_ranking[$i]['id_permohonan'];
            $nilai_ki_terpilih = $data_ranking[$i]['Ki'];
    
            // Ambil data NIK dari tabel tb_permohonan berdasarkan id_permohonan
            $this->db->select('nik');
            $this->db->where('id_permohonan', $id_permohonan_terpilih);
            $permohonan = $this->db->get('tb_permohonan')->row();
    
            if ($permohonan) {
                // Siapkan data untuk disimpan di tabel penerima
                $data_penerima = [
                    'id_permohonan' => $id_permohonan_terpilih,
                    'nik' => $permohonan->nik,  // Data NIK yang diambil dari tabel permohonan
                    'hasil' => $nilai_ki_terpilih,  // Nilai Ki
                    //'status' => 'Diterima'  // Status diterima untuk 40% teratas
                ];
    
                // Insert data ke tabel tb_penerima
                $this->db->insert('tb_penerima', $data_penerima);
            }
        }
    
        // Redirect ke halaman lain setelah penyimpanan selesai
        redirect('hasil/index2');
    }
     
}