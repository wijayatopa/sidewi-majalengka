<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array("googlemaps"));
        $this->load->model('m_wisata');
        $this->load->model('m_setting');
        $this->load->model('m_gallery');
    }
    

    public function index()
    {
        	$setting=$this->m_setting->list_setting();
            //tampilan awal view map
        $this->load->library("googlemaps");
        $config['center'] = "$setting->latitude,$setting->longitude";
        $config['zoom'] = "$setting->zoom";
        $this->googlemaps->initialize($config);
        //tampil semua data sekolah dari database 
        $wisata = $this->m_wisata->lists();
        foreach($wisata as $key => $value) ://perulangan data
        $marker = array();
        $marker['animation'] = 'DROP';
        $marker['position'] = "$value->latitude, $value->longitude";
        $marker['infowindow_content'] = '<div class="media" style="width:400px;">';
        $marker['infowindow_content'] .= '<div class="media-left">';
        $marker['infowindow_content'] .= '<img src="'.base_url("assets/gambar_wisata/{$value->gambar_wisata}").'" class="media-object" style="width:150px">';
        $marker['infowindow_content'] .= '</div>';
        $marker['infowindow_content'] .= '<div class="media-body">';
        $marker['infowindow_content'] .= '<h4 class="media-heading">'.$value->nama_wisata.'</h4>';
        $marker['infowindow_content'] .= '<p>Alamat : '.$value->alamat.'</p>';
        $marker['infowindow_content'] .= '<p>No Telpon : '.$value->no_telpon.'</p>';
        $marker['infowindow_content'] .= '<p>Tiket : Rp.'.number_format($value->tiket).'</p><br>';
        $marker['infowindow_content'] .= '<a href="'.base_url('home/lokasi/'.$value->id_wisata).'" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Detail</a>';
        $marker['infowindow_content'] .= '</div>';
        $marker['infowindow_content'] .= '</div>';
        $marker['icon'] = base_url('assets/icon/'.$value->icon);
        $this->googlemaps->add_marker($marker);
        endforeach;
        //end perulangan data
		//tampilan data marker map
		$this->googlemaps->initialize($config);
		//menampilkan maker ke map
        $data = array('title' => 'GIS Wisata '.$setting->nama_wilayah,
        	          'title2'=> $setting->nama_wilayah,
                        'isi' => 'v_home',
                        'map' => $this->googlemaps->create_map()
    );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    //tampil semua data sekolah dari database Ke tabel
	public function listwisata()
	{
		$wisata = $this->m_wisata->lists();
		$map=$this->googlemaps->create_map();
		$setting=$this->m_setting->list_setting();
        $data = array('title' => 'GIS Wisata '.$setting->nama_wilayah,
        	'title2'=> $setting->nama_wilayah,
                        'isi'	=>	'v_listwisata',					
						'wisata'	=>	$wisata,
						'map'		=>	$map
					);
		$this->load->view('layout/v_wrapper', $data,false);
	}

	public function about()
	{
   		$map= $this->googlemaps->create_map();
        $setting=$this->m_setting->list_setting();
        $data = array('title' => 'GIS Wisata '.$setting->nama_wilayah,
        				'title2'=> $setting->nama_wilayah,
                        'map'       =>$map,
                        'isi'       =>'v_about'
                    );
        $this->load->view('layout/v_wrapper', $data,false); 
	}

	public function lokasi($id_wisata)
	{
		$wisata=$this->m_wisata->detail($id_wisata);
		$this->load->library("googlemaps");
		$config['center'] = "$wisata->latitude, $wisata->longitude";
		$config['zoom'] = "18";
		$this->googlemaps->initialize($config);
		//tampil semua data sekolah dari database 
			
		$marker = array();
		$marker['animation'] = 'DROP';
		$marker['position'] = "$wisata->latitude, $wisata->longitude";
		$marker['infowindow_content'] = '<div class="media" style="width:300px;">';
		$marker['infowindow_content'] .= '<div class="media-left">';
		$marker['infowindow_content'] .= '</div>';
		$marker['infowindow_content'] .= '<div class="media-body">';
		$marker['infowindow_content'] .= '<h5 class="media-heading">'.$wisata->nama_wisata.'</h5>';
		$marker['infowindow_content'] .= '<a>'.$wisata->alamat.'</a><br>';
		$marker['infowindow_content'] .= '<a>'.$wisata->no_telpon.'</a><br>';
        $marker['infowindow_content'] .= '<a>'.$wisata->deskripsi.'</a><br>';
        $marker['infowindow_content'] .= '<a>Rp.'.$wisata->tiket.'</a><br>';
		$marker['infowindow_content'] .= '</div>';
		$marker['infowindow_content'] .= '</div>';
		$marker['icon'] = base_url("assets/icon/".$wisata->icon);
		$marker['icon_size'] = '48,48';
		$marker['icon_scaledSize'] = '48,48';

		$this->googlemaps->add_marker($marker);
		
        //end perulangan data
		//tampilan data marker map
		$this->googlemaps->initialize($config);

		$foto=$this->m_gallery->foto($id_wisata);
		$setting=$this->m_setting->list_setting();
        $data = array('title'  => 'GIS Wisata '.$setting->nama_wilayah,
        	          'title2' => $setting->nama_wilayah,
                        'map'  =>$this->googlemaps->create_map(),
                        'isi'       =>'v_lokasi',
                        'foto'		=>$foto,
                        'wisata' => $wisata
                    );
         $this->load->view('layout/v_wrapper', $data,false);
	}

}

/* End of file Controllername.php */
