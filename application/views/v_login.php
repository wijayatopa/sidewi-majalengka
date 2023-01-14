
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/back-end/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url(); ?>assets/back-end/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/back-end/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>assets/back-end/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                           <?php 
        //notifikasi error
      echo validation_errors('<div class="alert alert-warning">','</div>');
      //notifikasi

      if ($this->session->flashdata('warning')) {
        echo '<div class="alert alert-warning">';
        echo $this->session->flashdata('warning');
        echo '</div>';
        # code...
      }
      //notifikasi sukses
      if ($this->session->flashdata('sukses')) {
          echo '<div class="alert alert-success">';
        echo $this->session->flashdata('sukses');
        echo '</div>';
        # code...
      }
      //form open
      echo form_open(base_url('login'),'class="form-horizontal" entype="multipart/formdata"');
      ?>
                            
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                        </div>
                                
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success btn-block"><i class="fa fa-sign-out"></i>Login</button>
                        </div>
                        <div class="col-sm-6">
                            <a class="btn btn-primary btn-block" href="<?php echo base_url(); ?>"><i class="fa fa-globe"></i> Web</a>
                        </div>

                       <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/back-end/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/back-end/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>assets/back-end/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url(); ?>assets/back-end/dist/js/sb-admin-2.js"></script>

</body>

</html>
