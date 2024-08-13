<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perhitungan extends CI_Controller {

	public function __construct() {
        parent::__construct();
       $this->load->model('m_perhitungan');
		
    }
	public function index()
	{
		
		$title['title']= 'Perhitungan';
		$user['user'] = $this->db->get_where('tb_user',['email'=>
		$this->session->userdata('email')])->row_array();
      

		$data['nilai'] = $this->m_perhitungan->tampil_data();
		$this->load->view('templates/header',$title);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $user);
		$this->load->view('perhitungan', $data);
		
	}
        public function simpanHasil() {
            
                // Ambil data Yi dari post
                $yiData = $this->input->post('yi_data');
                
                if (!empty($yiData)) {
                    foreach ($yiData as $data) {

                        $this->db->insert('tb_hasil', $data);
                    }
            
                    // Redirect ke halaman hasil akhir atau halaman berikutnya
                    redirect('hasil');
                } else {
                    // Jika data tidak ada di post, tampilkan pesan error
                    $this->session->set_flashdata('error', 'Data tidak ditemukan untuk disimpan.');
                    redirect('perhitungan');
                }
            
            

            // // Pastikan Anda sudah melakukan perhitungan Yi sebelumnya dan datanya tersedia
            // if (isset($nilai) && !empty($nilai)) {
            //     foreach ($nilai as $n) {
            //         // Hitung nilai maximum (benefit)
            //         $benefit = (($n->c1 / $sumSquares['c1']) * $bobot['c1']) + 
            //                    (($n->c3 / $sumSquares['c3']) * $bobot['c3']) + 
            //                    (($n->c5 / $sumSquares['c5']) * $bobot['c5']) + 
            //                    (($n->c6 / $sumSquares['c6']) * $bobot['c6']);
    
            //         // Hitung nilai minimum (cost)
            //         $cost = (($n->c2 / $sumSquares['c2']) * $bobot['c2']) + 
            //                 (($n->c4 / $sumSquares['c4']) * $bobot['c4']);
    
            //         // Hitung nilai Yi
            //         $yi = $benefit - $cost;
    
            //         // Simpan ke database
            //         $data = [
            //             'nama_alternatif' => $n->nama_alternatif,
            //             'nilai' => $yi
            //         ];
                    
            //         // Insert ke tabel tb_hasil
            //         $this->db->insert('tb_hasil', $data);
            //     }
    
            //     // Redirect ke halaman hasil akhir atau halaman berikutnya
            //     redirect('hasil');
            // } else {
            //     // Jika data nilai tidak tersedia, Anda bisa mengarahkan kembali atau menampilkan pesan kesalahan
            //     $this->session->set_flashdata('error', 'Data tidak ditemukan untuk disimpan.');
            //     redirect('perhitungan');
            // }
        }
    
    

}