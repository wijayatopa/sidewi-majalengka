<div class="panel panel-info">
<div class="panel-heading">
	 <a href="<?php echo base_url('wisata/add'); ?>" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Add Data</a>

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
					<th class="text-center">Kategori</th>
					<th class="text-center">Tiket</th>
					<th class="text-center" width="100px">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1 ; foreach($wisata as $value){ ?>
				<tr>
					<td class="text-center"><?php echo $no++; ?></td>
					<td><?php echo $value->nama_wisata; ?></td>
					<td><?php echo $value->nama_kategori; ?></td>
					<td><?php echo number_format($value->tiket); ?></td>
					<td width="130px" class="text-center">
						<a href="<?php echo base_url('wisata/edit/'.$value->id_wisata); ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Edit</a>
						<a href="<?php echo base_url('wisata/delete/'.$value->id_wisata); ?>" type="button" class="btn  btn-danger btn-xs" onclick="return confirm('Yakin Ingin Menghapus Data ini.?')" type="button" class="btn  btn-danger btn-sm" onclick="return confirm('Yakin Ingin Menghapus Data ini.?')"><i class="fa fa-trash"></i> Delete</a>
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>

</div>
</div>