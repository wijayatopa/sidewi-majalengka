<div class="panel panel-info">
<div class="panel-heading">
	 <a href="<?php echo base_url('kategori/add'); ?>" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Add Data</a>

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


		<table width="100%" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="text-center" width="50px">No</th>
					<th class="text-center">Nama Kategori</th>
					<th class="text-center">Icon</th>
					<th class="text-center" width="100px">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1 ; foreach($kategori as $value){ ?>
				<tr>
					<td class="text-center"><?php echo $no++; ?></td>
					<td><?php echo $value->nama_kategori; ?></td>
					<td  width="100px" class="text-center"><img width="32px" src="<?php echo base_url('assets/icon/'.$value->icon); ?>"></td>
					<td width="130px" class="text-center">
						<a href="<?php echo base_url('kategori/edit/'.$value->id_kategori); ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Edit</a>

						<a href="<?php echo base_url('kategori/delete/'.$value->id_kategori); ?>" type="button" class="btn  btn-danger btn-xs" onclick="return confirm('Yakin Ingin Menghapus Data ini.?')" type="button" class="btn  btn-danger btn-sm" onclick="return confirm('Yakin Ingin Menghapus Data ini.?')"><i class="fa fa-trash"></i> Delete</a>
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>

</div>
</div>