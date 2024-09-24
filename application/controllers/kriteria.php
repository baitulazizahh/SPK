<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

	 public function __construct() {
        parent::__construct();
        $this->load->model('m_data');
		$this->load->library('form_validation');
    }
	public function index()
	{
		$title['title']= 'Kriteria';
		$data2['user'] = $this->db->get_where('tb_user',['email'=>
		$this->session->userdata('email')])->row_array();
		
		// Generate ID Kriteria di sini
		$last_kriteria = $this->db->select('id')
		->order_by('id', 'DESC')
		->limit(1)
		->get('tb_kriteria')
		->row_array();

		$new_id_number = $last_kriteria ? $last_kriteria['id'] + 1 : 1;
		$new_id_kriteria = 'K' . str_pad($new_id_number, 3, '0', STR_PAD_LEFT); // Contoh: K001, K002, dst.

		$data['id_kriteria'] = $new_id_kriteria;
		$data['kriteria'] = $this->m_data->tampil_data();

		$this->load->view('templates/header', $title);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar',$data2);
		$this->load->view('kriteria', $data);
		// $this->load->view('templates/footer');
		
	}
	public function get_all_kriteria() {
		$query = $this->db->get('tb_kriteria');
		return $query->result();
	}

	public function tambah_aksi(){
		// Mengambil data pengguna berdasarkan email yang ada di session
		$data2['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
			
		// Mengambil data alternatif
		$data['kriteria'] = $this->m_data->tampil_data();
		
		  
		// Validasi form
		$this->form_validation->set_rules('nama_kriteria', 'Nama kriteria', 'required|trim');
		$this->form_validation->set_rules('jenis_kriteria', 'Jenis kiteria', 'required|trim');
		$this->form_validation->set_rules('bobot', 'Bobot', 'required|trim');
		$this->form_validation->set_message('required', '{field} harus diisi!');
	
		if ($this->form_validation->run() == false) {
			// Jika validasi gagal, muat ulang tampilan dengan pesan kesalahan
			$title['title'] = 'Kriteria';
			$this->load->view('templates/header', $title);
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar', $data2);
			$this->load->view('kriteria', $data);
			$this->session->set_flashdata('modal_open', true);
		} else {

			 // Mengambil id terakhir dari tabel kriteria
			 $last_id = $this->db->select('id')
			 ->order_by('id', 'DESC')
			 ->limit(1)
			 ->get('tb_kriteria')
			 ->row('id');

			  // Jika ada data, tambahkan 1 ke id terakhir, jika tidak mulai dari 1
			  $new_id_number = $last_id ? $last_id + 1 : 1;

			  // Generate id_kriteria dengan format 'K' diikuti dengan angka berurutan
			  $new_id_kriteria = 'K' . str_pad($new_id_number, 3, '0', STR_PAD_LEFT); // Contoh: K001, K002, dst.

			// Jika validasi berhasil, proses data untuk dimasukkan ke database
			//$id_kriteria = htmlspecialchars($this->input->post('id_kriteria', true));
			$nama_kriteria = htmlspecialchars($this->input->post('nama_kriteria', true));
			$jenis_kriteria = htmlspecialchars($this->input->post('jenis_kriteria', true));
			$bobot = htmlspecialchars($this->input->post('bobot', true));
	
			// Siapkan data untuk dimasukkan ke database
			$data = array(
				'id_kriteria' => $new_id_kriteria,
				'nama_kriteria' => $nama_kriteria,
				'jenis_kriteria' => $jenis_kriteria,
				'bobot' => $bobot,
			);
	
			// Masukkan data ke tabel tb_alternatif
			$this->m_data->input_data($data, 'tb_kriteria');
			
			// Redirect ke halaman index alternatif
			redirect('kriteria/index');
		}
		
	}
    
	public function hapus($id){
        $where =  array ('id'=> $id);
        $this->m_data->hapus_data($where,'tb_kriteria');
        redirect('kriteria/index');

    }

	public function update(){
		// Ambil data dari input POST
        $id         	= $this->input->post('id');
        $id_kriteria    = $this->input->post('id_kriteria');
        $nama_kriteria  = $this->input->post('nama_kriteria');
        $jenis_kriteria = $this->input->post('jenis_kriteria');
        $bobot    		= $this->input->post('bobot');
        
		// Persiapkan data untuk diupdate
        $data = array(
			'id'				=>$id,
			'id_kriteria'		=>$id_kriteria,
            'nama_kriteria'     =>$nama_kriteria,
            'jenis_kriteria'    =>$jenis_kriteria,
            'bobot' 			=>$bobot
        );

		// Kondisi untuk menentukan data yang akan diupdate
        $where = array('id'=>$id);

		// Panggil metode update_data di model
		$this->m_data->update_data($where, $data, 'tb_kriteria');

		// Redirect ke halaman alternatif/index
        redirect('kriteria/index');

    }

    

}
