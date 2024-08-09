<?php 

class M_perhitungan extends CI_Model{

    
    public function tampil_data() {
      
        {
            // Mendapatkan data penilaian dengan menggabungkan nilai subkriteria ke dalam satu baris per alternatif
            $this->db->select('a.nama_alternatif,
            MAX(CASE WHEN p.id_kriteria = 48 THEN p.nilai ELSE NULL END) AS c1,
            MAX(CASE WHEN p.id_kriteria = 49 THEN p.nilai ELSE NULL END) AS c2,
            MAX(CASE WHEN p.id_kriteria = 50 THEN p.nilai ELSE NULL END) AS c3,
            MAX(CASE WHEN p.id_kriteria = 51 THEN p.nilai ELSE NULL END) AS c4,
            MAX(CASE WHEN p.id_kriteria = 52 THEN p.nilai ELSE NULL END) AS c5,
            MAX(CASE WHEN p.id_kriteria = 56 THEN p.nilai ELSE NULL END) AS c6');

            $this->db->from('tb_penilaian p');
            $this->db->join('tb_alternatif a', 'a.id_alternatif = p.id_alternatif');
            $this->db->group_by('a.id_alternatif');
            $this->db->order_by('MAX(p.created_at)', 'ASC'); 
            $query = $this->db->get();
            return $query->result();
            // $data['nilai'] = $query->result();
        
            // $this->load->view('perhitungan', $data);
        }
        


        // $this->db->select('a.nama_alternatif, p.nilai');
        // $this->db->from('tb_penilaian p');
        // $this->db->join('tb_alternatif a', 'a.id_alternatif = p.id_alternatif');
        // $query = $this->db->get();
        // return $query->result();

    }

    
      
}
?>