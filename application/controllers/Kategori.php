<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->library(array("googlemaps"));
		$this->load->model("m_kategori");
		$this->load->model('m_setting');
	}

	// List all your items
	public function index()
	{
		$kategori = $this->m_kategori->lists();
		$map=$this->googlemaps->create_map();
		$setting=$this->m_setting->list_setting();
        $data = array('title' => 'GIS Wisata '.$setting->nama_wilayah,
						'title2' => 'Data Kategori',
                        'isi'	=>	'admin/kategori/v_lists',					
						'kategori'	=>	$kategori,
						'map'		=>	$map
					);
		$this->load->view('admin/layout/v_wrapper', $data,false);
	}

	// Add a new item
	public function add()
	{

		$map=$this->googlemaps->create_map();
		$this->form_validation->set_rules('nama_kategori', 'Nama Wisata','required',
        array('required' => '%s Harus Diisi'));

        if ($this->form_validation->run()) {
        	$config['upload_path']   = './assets/icon/';
            $config['allowed_types'] = 'png';
            $config['max_size']      = 1500;
            $config['max_width']     = 5000;
            $config['max_height']    = 5000;
            $this->upload->initialize($config);
            if(! $this->upload->do_upload('icon')) {
				$setting=$this->m_setting->list_setting();
        		$data = array('title' => 'GIS Wisata '.$setting->nama_wilayah,
										'title2' 		=>	'Add Data Kategori',
										'error_upload'	=>	$this->upload->display_errors(),
										'map'		=>	$map,
										'isi'	 		=>	'admin/kategori/v_add'
									);
				$this->load->view('admin/layout/v_wrapper', $data, FALSE);
				
			}else{
				$upload_data        		= array('uploads' =>$this->upload->data());
				$config['image_library']  	= 'gd2';
				$config['source_image']   	= './assets/icon/'.$upload_data['uploads']['file_name'];
		
				
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$i = $this->input;
	            $data = array(
	            				'nama_kategori'	=> $i->post('nama_kategori'),
	                    		'icon'	=> $upload_data['uploads']['file_name'],
	                        	);
	            $this->m_kategori->add($data);
	            $this->session->set_flashdata('sukses',' Data Kategori Berhasil Ditambahkan !');
	            redirect('kategori','refresh');
		}
	}

		$setting=$this->m_setting->list_setting();
        $data = array('title' => 'GIS Wisata '.$setting->nama_wilayah,
									'title2' 		=>	'Add Data kategori',
									'map'		=>	$map,
									'isi'	 		=>	'admin/kategori/v_add'
								);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}
	

	public function edit($id_kategori)
	{
		$kategori=$this->m_kategori->detail($id_kategori);
		$map=$this->googlemaps->create_map();
		$this->form_validation->set_rules('nama_kategori', 'Nama Wisata','required',
        array('required' => '%s Harus Diisi'));

        if ($this->form_validation->run()) {
        	$config['upload_path']   = './assets/icon/';
            $config['allowed_types'] = 'png';
            $config['max_size']      = 1500;
            $config['max_width']     = 5000;
            $config['max_height']    = 5000;
            $this->upload->initialize($config);
            if(! $this->upload->do_upload('icon')) {
				$setting=$this->m_setting->list_setting();
        		$data = array('title' => 'GIS Wisata '.$setting->nama_wilayah,
										'title2' 		=>	'Edit Data Kategori',
										'error_upload'	=>	$this->upload->display_errors(),
										'map'		=>	$map,
										'kategori'		=> $kategori,
										'isi'	 		=>	'admin/kategori/v_edit'
									);
				$this->load->view('admin/layout/v_wrapper', $data, FALSE);
				
			}else{
				$upload_data        		= array('uploads' =>$this->upload->data());
				$config['image_library']  	= 'gd2';
				$config['source_image']   	= './assets/icon/'.$upload_data['uploads']['file_name'];
		
				
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$i = $this->input;
	            $data = array(
	            				'id_kategori'	=>$id_kategori,
	            				'nama_kategori'	=> $i->post('nama_kategori'),
	                    		'icon'	=> $upload_data['uploads']['file_name'],
	                        	);
	            $this->m_kategori->edit($data);
	            $this->session->set_flashdata('sukses',' Data Kategori Berhasil Ditambahkan !');
	            redirect('kategori','refresh');
		}
	}

		$setting=$this->m_setting->list_setting();
        $data = array('title' => 'GIS Wisata '.$setting->nama_wilayah,
									'title2' 		=>	'Edit Data kategori',
									'map'		=>	$map,
									'kategori'		=> $kategori,
									'isi'	 		=>	'admin/kategori/v_edit'
								);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}

	//Delete one item
	public function delete($id_kategori)
	{
		//hapus gambar
		$kategori=$this->m_kategori->detail($id_kategori);
		if ($kategori->icon != "") {
			unlink('./assets/icon/'.$kategori->icon);
		}
		//===========================
		$data = array('id_kategori' => $id_kategori);
		$this->m_kategori->delete($data);
		$this->session->set_flashdata('sukses','Data Berhasil Dihapus');
		redirect('kategori','refresh');
	}
}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
