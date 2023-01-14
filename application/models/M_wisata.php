<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_wisata extends CI_Model {

	public function lists()
	{
		$this->db->select('*');
		$this->db->from('tbl_wisata');
		$this->db->join('tbl_kategori','tbl_kategori.id_kategori=tbl_wisata.id_kategori','LEFT');
		$this->db->order_by('id_wisata','desc');
		$query=$this->db->get();
		return $query->result();
	}	

	//add
     public function add($data)
     {
       $this->db->insert('tbl_wisata',$data);
     }

     public function detail($id_wisata)
     {
     	$this->db->select('*');
        $this->db->from('tbl_wisata');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_wisata.id_kategori', 'left');
        $this->db->where('id_wisata', $id_wisata);
        $query=$this->db->get();
        return $query->row();
     }

     //edit
     public function edit($data)
     {
       $this->db->where('id_wisata',$data['id_wisata']);
       $this->db->update('tbl_wisata',$data);
     }

     //hapus data sekolah
	public function delete($data)
	{
		$this->db->where('id_wisata', $data['id_wisata']);
		$this->db->delete('tbl_wisata',$data);
	}

}

/* End of file M_penginapan.php */
/* Location: ./application/models/M_penginapan.php */