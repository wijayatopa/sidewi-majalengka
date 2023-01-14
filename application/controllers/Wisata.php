<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata extends CI_Controller {

	public $fasilitas;

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->library(array("googlemaps"));
		$this->load->model("m_wisata");
		$this->load->model('m_kategori');
		$this->load->model('m_setting');
		$this->fasilitas = array('Warung / Tempat Makan','Mushola','Area Parkir','Toilet','Waterboom','Restoran');
	}

	// List all your items
	public function index()
	{
		$wisata = $this->m_wisata->lists();
		$map=$this->googlemaps->create_map();
		$setting=$this->m_setting->list_setting();
        $data = array('title' => 'GIS Wisata '.$setting->nama_wilayah,
						'title2' => 'Data Wisata',
                        'isi'	=>	'admin/wisata/v_lists',					
						'wisata'	=>	$wisata,
						'map'		=>	$map
					);
		$this->load->view('admin/layout/v_wrapper', $data,false);
	}

	public function add()
	{
		$setting=$this->m_setting->list_setting();
		$this->load->library('googlemaps');
        $config['center'] = "$setting->latitude, $setting->longitude";
        $config['zoom'] = "$setting->zoom";
        $this->googlemaps->initialize($config);

        $marker['position'] = "$setting->latitude, $setting->longitude";
        $marker['draggable'] = true;
        $marker['ondragend'] = 'setMapToForm(event.latLng.lat(), event.latLng.lng());';
        $this->googlemaps->add_marker($marker);

		$map=$this->googlemaps->create_map();
		$this->form_validation->set_rules('nama_wisata', 'Nama Wisata','required',
        array('required' => '%s Harus Diisi'));
        $this->form_validation->set_rules('alamat', 'Alamat','required',
        array('required' => '%s Harus Diisi'));
        $this->form_validation->set_rules('no_telpon', 'No Telpon','required',
        array('required' => '%s Harus Diisi'));
        $this->form_validation->set_rules('latitude', 'Latitude','required',
        array('required' => '%s Harus Diisi'));
        $this->form_validation->set_rules('longitude', 'Longitude','required',
        array('required' => '%s Harus Diisi'));

        if ($this->form_validation->run()) {
        	$config['upload_path']   = './assets/gambar_wisata/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = 1500;
            $config['max_width']     = 5000;
            $config['max_height']    = 5000;
            $this->upload->initialize($config);
            if(! $this->upload->do_upload('gambar_wisata')) {
        		$data = array('title' => 'GIS Wisata '.$setting->nama_wilayah,
										'title2' 		=>	'Add Data Wisata',
										'kategori'		=>	$this->m_kategori->lists(),
										'error_upload'	=>	$this->upload->display_errors(),
										'map'		=>	$map,
										'isi'	 		=>	'admin/wisata/v_add'
									);
				$this->load->view('admin/layout/v_wrapper', $data, FALSE);
				
			}else{
				$upload_data        		= array('uploads' =>$this->upload->data());
				$config['image_library']  	= 'gd2';
				$config['source_image']   	= './assets/gambar_wisata/'.$upload_data['uploads']['file_name'];
				//$config['new_image']     	= './assets/gambar_penginapan/thumbs/'.$upload_data['uploads']['file_name'];
				//$config['create_thumb'] 	= TRUE;
				//$config['maintain_ratio'] 	= TRUE;
				//$config['width']         	= 200;
				//$config['height']       	= 200;
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$i = $this->input;
	            $data = array(
	            				'nama_wisata'		=> $i->post('nama_wisata'),
	            				'id_kategori'		=> $i->post('id_kategori'),
	            				'alamat'			=> $i->post('alamat'),
	                			'no_telpon'			=> $i->post('no_telpon'),
	                			'latitude'			=> $i->post('latitude'),
	                			'longitude'			=> $i->post('longitude'),
	                			'tiket'				=> $i->post('tiket'),
	                			'fasilitas'			=> @implode(", ", @$i->post('fasilitas')),
	                    		'gambar_wisata'	=> $upload_data['uploads']['file_name'],                    		
	                    		'deskripsi'			=> $i->post('deskripsi'),
	                        	);
	            $this->m_wisata->add($data);
	            $this->session->set_flashdata('sukses',' Data Wisata Berhasil Ditambahkan !');
	            redirect('wisata','refresh');
		}
	}

        $data = array('title' => 'GIS Wisata '.$setting->nama_wilayah,
									'title2' 		=>	'Add Data Wisata',
									'kategori'		=>	$this->m_kategori->lists(),
									'map'		=>	$map,
									'isi'	 		=>	'admin/wisata/v_add'
								);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}


	//Delete one item
	public function delete($id_wisata)
	{
		//hapus gambar
		
		$wisata=$this->m_wisata->detail($id_wisata);
		if ($wisata->icon != "") {
			unlink('./assets/gambar_wisata/'.$wisata->gambar_wisata);
		}
		//===========================
		$data = array('id_wisata' => $id_wisata);
		$this->m_wisata->delete($data);
		$this->session->set_flashdata('sukses','Data Berhasil Dihapus');
		redirect('wisata','refresh');
	}

	//edit
	public function edit($id_wisata)
	{
		$setting=$this->m_setting->list_setting();
		$wisata=$this->m_wisata->detail($id_wisata);
		$this->load->library('googlemaps');
        $config['center'] = "$setting->latitude, $setting->longitude";
        $config['zoom'] = "$setting->zoom";
        $this->googlemaps->initialize($config);

        $marker['position'] = "$setting->latitude, $setting->longitude";
        $marker['draggable'] = true;
        $marker['ondragend'] = 'setMapToForm(event.latLng.lat(), event.latLng.lng());';
        $this->googlemaps->add_marker($marker);

		$map=$this->googlemaps->create_map();
		$this->form_validation->set_rules('nama_wisata', 'Nama Wisata','required',
        array('required' => '%s Harus Diisi'));
        $this->form_validation->set_rules('alamat', 'Alamat','required',
        array('required' => '%s Harus Diisi'));
        $this->form_validation->set_rules('no_telpon', 'No Telpon','required',
        array('required' => '%s Harus Diisi'));
        $this->form_validation->set_rules('latitude', 'Latitude','required',
        array('required' => '%s Harus Diisi'));
        $this->form_validation->set_rules('longitude', 'Longitude','required',
        array('required' => '%s Harus Diisi'));

        if ($this->form_validation->run()) {
        	$config['upload_path']   = './assets/gambar_wisata/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = 1500;
            $config['max_width']     = 5000;
            $config['max_height']    = 5000;
            $this->upload->initialize($config);
            if(! $this->upload->do_upload('gambar_wisata')) {
        		$data = array('title' => 'GIS Wisata '.$setting->nama_wilayah,
										'title2' 		=>	'Edit Data Wisata',
										'kategori'		=>	$this->m_kategori->lists(),
										'error_upload'	=>	$this->upload->display_errors(),
										'map'			=>	$map,
										'wisata'		=>  $wisata,
										'isi'	 		=>	'admin/wisata/v_edit'
									);
				$this->load->view('admin/layout/v_wrapper', $data, FALSE);
				
			}else{
				$upload_data        		= array('uploads' =>$this->upload->data());
				$config['image_library']  	= 'gd2';
				$config['source_image']   	= './assets/gambar_wisata/'.$upload_data['uploads']['file_name'];
				//$config['new_image']     	= './assets/gambar_penginapan/thumbs/'.$upload_data['uploads']['file_name'];
				//$config['create_thumb'] 	= TRUE;
				//$config['maintain_ratio'] 	= TRUE;
				//$config['width']         	= 200;
				//$config['height']       	= 200;
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$i = $this->input;
	            $data = array(
	            				'id_wisata'			=>$id_wisata,
	            				'nama_wisata'		=> $i->post('nama_wisata'),
	            				'id_kategori'		=> $i->post('id_kategori'),
	            				'alamat'			=> $i->post('alamat'),
	                			'no_telpon'			=> $i->post('no_telpon'),
	                			'latitude'			=> $i->post('latitude'),
	                			'longitude'			=> $i->post('longitude'),
	                			'tiket'				=> $i->post('tiket'),
	                			'fasilitas'			=> @implode(", ", @$i->post('fasilitas')),
	                    		'gambar_wisata'		=> $upload_data['uploads']['file_name'],                    		
	                    		'deskripsi'			=> $i->post('deskripsi'),
	                        	);
	            $this->m_wisata->edit($data);
	            $this->session->set_flashdata('sukses',' Data Wisata Berhasil DiEdit !');
	            redirect('wisata','refresh');
		}
	}

        $data = array('title' => 'GIS Wisata '.$setting->nama_wilayah,
									'title2' 		=>	'Edit Data Wisata',
									'kategori'		=>	$this->m_kategori->lists(),
									'map'			=>	$map,
									'wisata'		=>  $wisata,
									'isi'	 		=>	'admin/wisata/v_edit'
								);
		$this->load->view('admin/layout/v_wrapper', $data, FALSE);
	}


}

/* End of file Penginapan.php */
/* Location: ./application/controllers/Penginapan.php */
