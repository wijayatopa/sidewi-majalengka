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
              ?>


		<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
			<thead>
				<tr>
					<th class="text-center" width="50px">No</th>
					<th class="text-center">Nama Wisata</th>
					<th class="text-center" width="100px">Foto</th>
					<th class="text-center" width="100px">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1 ; foreach($gallery as $value){ ?>
				<tr>
					<td class="text-center"><?php echo $no++; ?></td>
					<td><?php echo $value->nama_wisata; ?></td>
					<td  width="100px" class="text-center"><img width="32px" src="<?php echo base_url('assets/gambar_wisata/'.$value->gambar_wisata); ?>">
						<?php echo $value->total_foto; ?> Foto
					</td>
					<td width="130px" class="text-center">
						<a href="<?php echo base_url('gallery/addfoto/'.$value->id_wisata); ?>" class="btn btn-success btn-xs"><i class="fa fa-photo"></i> Add Foto</a>
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>

</div>
</div>