<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tambah Data</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="<?= base_url('assets/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Surat</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
  

    <!-- Navbar -->
    

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        

        <!-- Icon Cards-->
        

        <!-- Area Chart Example-->
      
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <a href="<?= base_url('surat');?>"><i class="fas fa-arrow-left">Back</i></a>
            </div>
              <form action="<?php base_url('surat/edit') ?>" method="post" enctype="multipart/form-data" >
              <input type="hidden" name="no_surat" value="<?= $table_surat->no_surat?>">
              <div class="form-group">
                <label for="perihal">perihal</label>
                <input class="form-control <?php echo form_error('perihal') ? 'is-invalid':'' ?>"
                 type="text" name="perihal" placeholder="Perihal" value="<?= $table_surat->perihal?>"/>
                <div class="invalid-feedback">
                  <?php echo form_error('perihal') ?>
                </div>
              </div>

              <div class="form-group">
                <label for="ditujukan">Ditujukan</label>
                <input class="form-control <?php echo form_error('ditujukan') ? 'is-invalid':'' ?>"
                 type="text" name="ditujukan" min="0" placeholder="Ditujukan" value="<?= $table_surat->ditujukan?>" />
                <div class="invalid-feedback">
                  <?php echo form_error('ditujukan') ?>
                </div>
              </div>


              <div class="form-group">
                <label for="penerima">Penerima</label>
                <input type="text" class="form-control <?php echo form_error('penerima') ? 'is-invalid':'' ?>"
                 name="penerima" placeholder="Penerima" value="<?= $table_surat->penerima?>">
                <div class="invalid-feedback">
                  <?php echo form_error('penerima') ?>
                </div>
              </div>


              <div class="form-group">
                <label for="file_surat">File Surat</label>
                <input class="form-control-file <?php echo form_error('file_surat') ? 'is-invalid':'' ?>"
                 type="file" name="file_surat" />
                <input type="hidden" name="old_file" value="<?= $table_surat->file_surat;?>">
                <div class="invalid-feedback">
                  <?php echo form_error('file_surat') ?>
                </div>
              </div>

              <input class="btn btn-success" type="submit" name="btn" value="Save" />
            </form>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->


  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/jquery/jquery.min.js'); ?>"></script>
  <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/jquery-easing/jquery.easing.min.js'); ?>"></script>

  <!-- Page level plugin JavaScript-->
  <script src="<?= base_url('assets/chart.js/Chart.min.js'); ?>"></script>
  <script src="<?= base_url('assets/datatables/jquery.dataTables.js'); ?>"></script>
  <script src="<?= base_url('assets/datatables/dataTables.bootstrap4.js'); ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>
