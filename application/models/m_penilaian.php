<?php 

class M_penilaian extends CI_Model{

    
    public function tampil_data() {
        $this->db->select('tb_alternatif.id_alternatif, tb_alternatif.nama_alternatif, tb_penilaian.*');
        $this->db->from('tb_alternatif');
        $this->db->join('tb_penilaian', 'tb_penilaian.id_alternatif = tb_alternatif.id_alternatif', 'left');
        //$this->db->group_by('tb_penilaian.id_alternatif', 'ASC');
        return $this->db->get()->result();
      
    }
    	// UJI EDIT COBA PENILAIAN
	public function edit_penilaian($id_alternatif, $id_kriteria,$nilai){
		$query= this->db->simple_query("UPDATE penilaian SET nilai=$nilai WHERE id_alternatif='$id_alternatif' AND id_kriteria ='$id_kriteria';");
		return $query;
	}
    
    public function cek_data() {
        $query = $this->db->get('tb_penilaian');
        return $query->result(); // Pastikan ini mengembalikan array objek
    }

    public function insert($data) {
        $this->db->insert('tb_penilaian', $data); // ganti 'tabel_perhitungan' dengan nama tabel Anda
    }
    
    public function get_penilaian_by_alternatif($id_alternatif)
{
    $this->db->where('id_alternatif', $id_alternatif);
    return $this->db->get('tb_penilaian')->result();
}

    public function update_data($where, $data,$table){
        
        $this->db->where($where);
        $this->db->update($table, $data);
  
    }
      
}
?>