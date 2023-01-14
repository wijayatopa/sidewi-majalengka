<br>
<div class="container">    
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-info">
        <div class="panel-heading">Pemetaan Wisata</div>
        <div class="panel-body">
          

           <?php 
              // notifikasi
              if ($this->session->flashdata('sukses')) {
              echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fa fa-check"></i>';
              echo $this->session->flashdata('sukses');
              echo '</div>';
              }
              ?>

          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="tabel">
              <thead>
                <tr>
                  <th style="width: 50px">No</th>
                  <th>Nama Wisata</th>
                  <th>Kategori</th>
                  <th>No Telpon</th>
                  <th>Tiket</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1 ; foreach($wisata as $value){ ?>
                <tr>
                  <td><?php echo $no++ ?>.</td>
                  <td><?php echo $value->nama_wisata ?></td>
                  <td><?php echo $value->nama_kategori ?></td>
                  <td><?php echo $value->no_telpon ?></td>
                  <td>Rp. <?php echo number_format($value->tiket); ?></td>
                  <td><a class="btn btn-success btn-sm" href="<?php echo base_url('home/lokasi/'.$value->id_wisata) ?>"><i class="fa fa-eye"></i> View</a></td>
                </tr>
                  <?php } ?>
                </tbody>
            </table>
          </div>
           
       

        </div>
        <div class="panel-footer"></div>
      </div>
    </div>
  </div>
</div>