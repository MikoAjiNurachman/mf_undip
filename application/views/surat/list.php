<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Surat</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="<?= base_url('assets/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="<?= base_url('surat');?>">Surat</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
  

    <!-- Navbar -->
    

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('surat');?>" role="button" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data Surat</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('pejabat');?>" role="button" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data Pejabat</span>
        </a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="<?= base_url('arsip');?>" role="button" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data Arsip</span>
        </a>
      </li>
    
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        

        <!-- Icon Cards-->
        

        <!-- Area Chart Example-->
      
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <a href="<?= base_url('surat/add');?>"><i class="fas fa-plus">Tambah Data</i></a>
            </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No Surat</th>
                    <th>Perihal</th>
                    <th>Ditujukan</th>
                    <th>Penerima</th>
                    <th>File Surat</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                 <?php foreach($table_surat as $data) :?>
                  <tr>
                    <td><?= $data->no_surat?></td>
                    <td><?= $data->perihal?></td>
                    <td><?= $data->ditujukan?></td>
                    <td><?= $data->penerima?></td>
                    <td>
                      
                        <a target="_blank" href="<?= base_url('upload/'.$data->file_surat);?>"><i class="fas fa-download"> Download</i></a>
                      </td>
                    <td>
                      <a href="<?php echo base_url('surat/edit/'.$data->no_surat) ?>"
                       class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                      <a href="<?php echo base_url('surat/delete/'.$data->no_surat) ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                      <a href="<?php echo base_url('surat/arsip/'.$data->no_surat) ?>" class="btn btn-small text-danger"><i class="fas fa-envelope"></i> Arsip</a>
                    </td>
                  </tr>
                 <?php endforeach ;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

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
