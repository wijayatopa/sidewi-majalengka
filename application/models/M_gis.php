<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_gis extends CI_Model {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->database();
    }

    //menampilka seluruh data wisata
    public function tampildata()
	{
		$this->db->select('*');
		$this->db->from('tbl_wisata');
		$query=$this->db->get();
		return $query->result();
	}

    //tambah data wisata
     public function tambah($data)
     {
       $this->db->insert('tbl_wisata',$data);
     }

      //hapus data wisata
     public function delete($data)
     {
       $this->db->where('id',$data['id']);
       $this->db->delete('tbl_wisata',$data);
     }

     //detail sekolah
    public function detail($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_wisata');
        $this->db->where('id', $id);
        $query=$this->db->get();
        return $query->row();
    }

    //merudab data sekolah
    public function update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('tbl_wisata',$data);
    }

}

/* End of file M_gis.php */

