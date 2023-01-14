<div class="panel panel-info">
<div class="panel-heading">
</div>
<div class="panel-body">

<?php
// notifikasi
              if ($this->session->flashdata('sukses')) {
              echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i>';
              echo $this->session->flashdata('sukses');
              echo '</div>';
              }
//notifikasi error
echo validation_errors('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>','</div>');
//error upload
if (isset($error_upload)){
    echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i>
        </button><i class="fa fa-bullhorn"></i>'.$error_upload.'</div>';
}
 

$atribut='class="form-horizontal"';
echo form_open_multipart('gallery/addfoto/'.$wisata->id_wisata,$atribut);
 ?>

<div class="form-group">
        <div class="col-sm-12">
            <label class="control-label">Keterangan Foto</label>
            <input name="ket_foto" type="text" class="form-control" placeholder="Keterangan Foto" value="<?php echo set_value('ket_foto'); ?>" required>
        </div>
    	</div>	 	

  
  		<div class="form-group">
  		<div class="col-sm-12">
  			<label class="control-label">Foto Wisata</label>
        </div>
        <div class="col-sm-6">
        	<input type="file" name="foto_wisata" class="form-control" required>
        </div>
        <div class="col-sm-2">
        	<button type="submit" class="form-control btn btn-primary"><i class="fa fa-plus"></i> Add Foto</button>
        </div>
        <div class="col-sm-2">
        	<a class="btn btn-success" href="<?php echo base_url('gallery'); ?>"><i class="fa fa-photo"></i> Gallery</a>
        </div>
    	</div>

   <?php echo form_close(); ?>    

  		


</div>
</div>

<div class="panel panel-info">
<div class="panel-heading">Gallery Foto</div>
<div class="panel-body">
	<div class="col-sm-12">
		<?php foreach ($foto as $key => $value) { ?>
			<div class="col-sm-3">
			<h4><?php echo $value->ket_foto; ?><a href="<?php echo base_url('gallery/delete/'.$value->id_wisata.'/'.$value->id_foto); ?>" type="button" class="btn  btn-danger btn-xs" onclick="return confirm('Yakin Ingin Menghapus Data ini.?')" type="button" class="btn  btn-danger btn-sm" onclick="return confirm('Yakin Ingin Menghapus Foto ini.?')"><i class="fa fa-trash"></i></a></h4>

			<img width="200px" height="200px" src="<?php echo base_url('assets/foto_wisata/'.$value->foto_wisata); ?>">
		</div>
		<?php } ?>
		
	</div>
</div>
</div>