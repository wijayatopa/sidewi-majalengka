<div class="col-sm-4">
  <div class="panel panel-info">
    <div class="panel-heading"><?php echo $title2; ?></div>
    <div class="panel-body">

<?php

//notifikasi error
echo validation_errors('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>','</div>');
//error upload
if (isset($error_upload)){
    echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i>
        </button><i class="fa fa-bullhorn"></i>'.$error_upload.'</div>';
}
 
// notifikasi
              if ($this->session->flashdata('sukses')) {
              echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i>';
              echo $this->session->flashdata('sukses');
              echo '</div>';
              }
$atribut='class="form-horizontal"';
echo form_open_multipart('setting/edit',$atribut);
 ?>


    	<div class="form-group">
          <input type="hidden" name="id_setting" value="<?php echo $setting->id_setting; ?>">
        <div class="col-sm-12">
            <label class="control-label">Nama Wilayah</label>
            <input name="nama_wilayah" value="<?php echo $setting->nama_wilayah; ?>" type="text" class="form-control" placeholder="Nama Kategori" required>
        </div>
    	</div>

         <div class="form-group">
        <div class="col-sm-12">
            <label class="control-label">Lokasi Wilayah (Koordinat)</label>
        </div>
        <div class="col-sm-6">
            <input name="latitude" type="text" class="form-control" placeholder="Latitude" value="<?php echo $setting->latitude; ?>" required>
        </div>
        <div class="col-sm-6">
            <input name="longitude" type="text" class="form-control" placeholder="Longitude" value="<?php echo $setting->longitude; ?>" required>
        </div>
        </div>

        <div class="form-group">
        <div class="col-sm-12">
            <label class="control-label">Zoom</label>
            <select name="zoom" class="form-control">
                    <option value="<?php echo $setting->zoom; ?>" selected><?php echo $setting->zoom; ?></option>               
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>                    
            </select>
        </div>
        </div>

        <div class="form-group">
        <div class="col-sm-12">
            <p>(* Semakin Besar Angkanya Maka Peta Akan Terlihat Semakin Rendah Dan Sebaliknya</p>
            
        </div>
        </div>

        <div class="form-group">
        <div class="col-sm-12">
            <button type="submit" class="form-control btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        </div>
        </div>  	 		


<?php echo form_close(); ?>

    </div>
    <div class="panel-footer"></div>
  </div>
</div>


<div class="col-sm-8">
  <div class="panel panel-success">
    <div class="panel-heading">Pilih Lokasi Wisata</div>
    <div class="panel-body">
      
    <?php echo $map['html']; ?>

    </div>
    <div class="panel-footer"></div>
  </div>
</div>

