<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gallery extends CI_Model {

	public function lists()
	{
		$this->db->select('tbl_wisata.*,COUNT(tbl_foto.id_wisata) as total_foto');
		$this->db->from('tbl_wisata');
		$this->db->join('tbl_foto', 'tbl_foto.id_wisata = tbl_wisata.id_wisata', 'left');
		$this->db->group_by('tbl_wisata.id_wisata');
		$this->db->order_by('id_wisata','desc');
		$query=$this->db->get();
		return $query->result();
	}	

	public function detail($id_wisata)
	{
		$this->db->select('*');
		$this->db->from('tbl_wisata');
		$this->db->where('id_wisata', $id_wisata);
		$query=$this->db->get();
		return $query->row();
	}

	public function detailfoto($id_foto)
	{
		$this->db->select('*');
		$this->db->from('tbl_foto');
		$this->db->where('id_foto', $id_foto);
		$query=$this->db->get();
		return $query->row();
	}

	public function foto($id_wisata)
	{
		$this->db->select('*');
		$this->db->from('tbl_foto');
		$this->db->where('id_wisata', $id_wisata);
		$query=$this->db->get();
		return $query->result();

	}

	public function add($data)
	{
		$this->db->insert('tbl_foto', $data);
	}

	//hapus data kategori
	public function delete($data)
	{
		$this->db->where('id_foto', $data['id_foto']);
		$this->db->delete('tbl_foto',$data);
	}


}

/* End of file M_gallery.php */
/* Location: ./application/models/M_gallery.php */