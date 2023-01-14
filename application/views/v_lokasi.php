<br>
<div class="container">    
  <div class="row">
    <div class="col-sm-5">
      <div class="panel panel-info">
        <div class="panel-heading">Data Wisata</div>
        <div class="panel-body">

          <div class="form-group">
            <div class="col-sm-4">
              Nama
            </div>
            <div class="col-sm-8">: 
              <?php echo $wisata->nama_wisata; ?>
            </div>            
          </div>

          <div class="form-group">
            <div class="col-sm-4"> 
              <p class="control-label">Kategori</p>
            </div>
            <div class="col-sm-8">: 
              <?php echo $wisata->nama_kategori; ?>
            </div>            
          </div>

          <div class="form-group">
            <div class="col-sm-4"> 
              <p class="control-label">Alamat</p>
            </div>
            <div class="col-sm-8">: 
              <?php echo $wisata->alamat; ?>
            </div>            
          </div>

          <div class="form-group">
            <div class="col-sm-4">
              <p class="control-label">No Telpon</p>
            </div>
            <div class="col-sm-8">: 
              <?php echo $wisata->no_telpon; ?>
            </div>            
          </div>

          <div class="form-group">
            <div class="col-sm-4">
              <p class="control-label">Latitude</p>
            </div>
            <div class="col-sm-8"> : 
              <?php echo $wisata->latitude; ?>
            </div>            
          </div>

          <div class="form-group">
            <div class="col-sm-4">
              <p class="control-label">Longitude</p>
            </div>
            <div class="col-sm-8">:  
              <?php echo $wisata->longitude; ?>
            </div>            
          </div>

          <div class="form-group">
            <div class="col-sm-4">
              <p class="control-label">Tiket</p>
            </div>
            <div class="col-sm-8">: Rp. 
              <?php echo number_format($wisata->tiket); ?>
            </div>            
          </div>

          <div class="form-group">
            <div class="col-sm-4">
              <p class="control-label">Fasilitas</p>
            </div>
            <div class="col-sm-8">: 
              <?php echo $wisata->fasilitas; ?>
            </div>            
          </div>  

          <div class="form-group">
            <div class="col-sm-4">
              <p class="control-label">Deskripsi</p>
            </div>
            <div class="col-sm-8">: 
              <?php echo $wisata->deskripsi; ?>
            </div>            
          </div>        
          
               
          
        </div>
        <div class="panel-footer"></div>
      </div>
    </div>
    <div class="col-sm-7">
      <div class="panel panel-info">
        <div class="panel-heading">Galleri</div>
        <div class="panel-body">
          <div class="col-sm-12">
            <?php foreach ($foto as $key => $value) { ?>
              <div class="col-sm-3 text-center">            
                <img border="12px" width="150px" height="150px"  src="<?php echo base_url('assets/foto_wisata/'.$value->foto_wisata); ?>">               
                <h5><?php echo $value->ket_foto; ?></h5>
             </div>
        <?php } ?>
        </div>

        </div>
        <div class="panel-footer"></div>
      </div>
    </div>

     <div class="col-sm-12">
      <div class="panel panel-info">
        <div class="panel-heading">Lokasi Wisata</div>
        <div class="panel-body">
          

          
        <?php
          echo $map['html']; 
        ?>

        </div>
        <div class="panel-footer"></div>
      </div>
    </div>
  </div>
</div>