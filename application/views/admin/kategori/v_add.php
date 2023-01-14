<div class="col-sm-5">
  <div class="panel panel-info">
    <div class="panel-heading">Input Data Wisata</div>
    <div class="panel-body">

<?php

//notifikasi error
echo validation_errors('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>','</div>');
//error upload
if (isset($error_upload)){
    echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i>
        </button><i class="fa fa-bullhorn"></i>'.$error_upload.'</div>';
}
 

$atribut='class="form-horizontal"';
echo form_open_multipart('kategori/add',$atribut);
 ?>


    	<div class="form-group">
        <div class="col-sm-12">
            <label class="control-label">Nama Kategori</label>
            <input name="nama_kategori" type="text" class="form-control" placeholder="Nama Kategori" value="<?php echo set_value('nama_kategori'); ?>" required>
        </div>
    	</div>	 	

  
  		<div class="form-group">
  		<div class="col-sm-12">
  			<label class="control-label">Icon</label>
        	<input type="file" name="icon" class="form-control" required>
        </div>
    	</div>

        <div class="form-group">
        <div class="col-sm-12">
            <label class="control-label">(* Gunakan Icon Format PNG dg Resolusi Max 48x48</label>
            
        </div>
        </div>  

  		

        <div class="form-group">
        	<div class="col-sm-6">
        		<button type="submit" class="form-control btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        	</div>
            <div class="col-sm-6">
            	<button type="reset" class="form-control btn btn-warning"><i class="fa fa-times"></i> Reset</button>
            </div>
        </div>


<?php echo form_close(); ?>

    </div>
    <div class="panel-footer"></div>
  </div>
</div>

