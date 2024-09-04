<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perhitungan extends CI_Controller {

	public function __construct() {
        parent::__construct();
       $this->load->model('m_perhitungan');
       $this->load->model('m_permohonan');
		
    }
	public function index()
	{
		
		$title['title']= 'Perhitungan';
		$user['user'] = $this->db->get_where('tb_user',['email'=>
		$this->session->userdata('email')])->row_array();
      

        $data['penilaian'] = $this->m_perhitungan->get_penilaian_with_nama();
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
            
    }
    
    

}