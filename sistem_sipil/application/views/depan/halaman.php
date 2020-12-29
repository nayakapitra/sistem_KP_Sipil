<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SIKp Teknik Sipil</title>
        <link type="text/css" href="<?php echo base_url().'asset/mahasiswa/bootstrap/css/bootstrap.min.css'?>" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url().'asset/mahasiswa/bootstrap/css/bootstrap-responsive.min.css'?>" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url().'asset/mahasiswa/css/theme.css'?>" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url().'asset/mahasiswa/images/icons/css/font-awesome.css' ?>" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
        <link rel="icon" type="image/png" href="<?php echo base_url() ?>.'assets/images/favicon.png'?>">
    </head>

    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a>
                        <a class="brand" href="<?php echo site_url('Mahasiswa/halaman');?>">Pendaftaran Kerja Praktek</a>
                        <?php
                        $id_admin=$this->session->userdata('ses_id');
                        $q=$this->db->query("SELECT * FROM tbl_siswa WHERE siswa_id='$id_admin'");
                        $c=$q->row_array();
                        ?>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-right">
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="hidden-xs"><?php echo $c['siswa_nama'];?></span>
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url().'login/logout'?>">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="<?php echo site_url('mahasiswa/halaman');?>"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                                <li><a href="<?php echo site_url('mahasiswa/daftar');?>"><i class="menu-icon icon-paste"></i>Pendaftaran </a>
                                </li>

                                <li>
                                        <?php if($daftar['Status_daftar']=='1') {?>
                                        <a href="<?php echo site_url('mahasiswa/Perusahaan');?>"><i class="menu-icon icon-paste"></i>Data Perusahaan </a>
                                        <?php } else {?>
                                        <a href="<?php echo site_url('mahasiswa/daftar');?>"><i class="menu-icon icon-paste"></i>Data Perusahaan </a>
                                        <?php } ?>
                                </li>

                                <li>
                                    <?php if($proyek['Status_proyek']=='1' && $daftar['Status_daftar']=='1' ) {?>
                                        <a href="<?php echo site_url('mahasiswa/File');?>"><i class="menu-icon icon-paste"></i>Upload Berkas Surat</a>
                                    <?php } elseif($proyek['Status_proyek']=='0' && $daftar['Status_daftar']=='1' ) {?>
                                        <a href="<?php echo site_url('mahasiswa/Perusahaan');?>"><i class="menu-icon icon-paste"></i>Upload Berkas Surat</a>
                                    <?php } else {?>
                                        <a href="<?php echo site_url('mahasiswa/daftar');?>"><i class="menu-icon icon-paste"></i>Upload Berkas Surat</a>
                                    <?php } ?>
                                    
                                </li>

                                <li>
                                    <?php if($proyek['Status_proyek']=='1' && $daftar['Status_daftar']=='1' && $file['status_surat']=='1' ) {?>
                                        <a href="<?php echo site_url('mahasiswa/Laporan');?>"><i class="menu-icon icon-paste"></i>Upload Berkas Laporan</a>
                                    <?php } elseif($proyek['Status_proyek']=='1' && $daftar['Status_daftar']=='1' ) {?>
                                        <a href="<?php echo site_url('mahasiswa/File');?>"><i class="menu-icon icon-paste"></i>Upload Berkas Laporan</a>
                                    <?php } elseif($proyek['Status_proyek']=='0' && $daftar['Status_daftar']=='1' ) {?>    
                                        <a href="<?php echo site_url('mahasiswa/Perusahaan');?>"><i class="menu-icon icon-paste"></i>Upload Berkas Laporan</a>
                                    <?php } else {?>
                                        <a href="<?php echo site_url('mahasiswa/daftar');?>"><i class="menu-icon icon-paste"></i>Upload Berkas Laporan</a>
                                    <?php } ?>
                                </li>
                            </ul>
                            <!--/.widget-nav-->
                        </div>
                    </div>
                        <div class="span9">
                        <div class="content">
                            <div class="module">
                            <div class="module-head">
                                <h3>Data Mahasiswa</h3>
                            </div>
                            <div class="module-body">
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th></th>
                                      <th>Status</th>
                                      <th>Keterangan</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>   
                                        
                                      <td>1</td>
                                      <td>Pendaftaran Kerja Praktek</td>
                                        <?php if($daftar ['Status_daftar']=='1'){?>
                                                <td>sudah divalidasi</td>
                                        <?php } else{?>
                                            <td>Belum divalidasi</td>
                                        <?php } ?>

                                        <?php if($daftar ['Status_daftar']=='1'){?>
                                                <td>sudah divalidasi</td>

                                            <?php }elseif($daftar['Status_daftar']=='0') {
                                            ?>
                                                <td>Belum divalidasi</td>
                                            <?php } else{?>
                                            <td>Belum mengisi data</td>
                                            <?php } ?>   
                                    </tr>
                                    <tr>
                                      <td>2</td>
                                      <td>Pengisian Data Proyek</td>
                                        <?php if($proyek['Status_proyek']=='1'){?>
                                                <td>sudah divalidasi</td>
                                            <?php } else{?>
                                            <td>Belum divalidasi</td>  
                                        <?php } ?>
                                      
                                        <?php if($proyek['Status_proyek']=='1'){?>
                                                <td>sudah divalidasi</td>

                                            <?php }elseif($proyek['Status_proyek']=='0') {
                                            ?>
                                                <td>Belum divalidasi</td>
                                            <?php } else{?>
                                            <td>Belum mengisi data</td>   
                                        <?php } ?>

                                    </tr>
                                    <tr>
                                      <td>3</td>
                                      <td>Upload Surat</td>
                                      <?php if($file['status_surat']=='1'){?>
                                                <td>sudah divalidasi</td>
                                            <?php } else{?>
                                            <td>Belum divalidasi</td>  
                                        <?php } ?>
                                      
                                        <?php if($file['status_surat']=='1'){?>
                                                <td>sudah divalidasi</td>

                                            <?php }elseif($file['status_surat']=='0') {
                                            ?>
                                                <td>Belum divalidasi</td>
                                            <?php } else{?>
                                            <td>Belum mengisi data</td>   
                                        <?php } ?>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Upload Berkas Laporan Kp</td>
                                        <?php if($laporan['Status_laporan']=='1'){?>
                                                <td>sudah divalidasi</td>
                                            <?php } else{?>
                                            <td>Belum divalidasi</td>  
                                        <?php } ?>
                                      
                                        <?php if($laporan['Status_laporan']=='1'){?>
                                                <td>sudah divalidasi</td>

                                            <?php }elseif($laporan['Status_laporan']=='0') {
                                            ?>
                                                <td>Belum divalidasi</td>
                                            <?php } else{?>
                                            <td>Belum mengisi data</td>   
                                        <?php } ?>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
             
        <script src="<?php echo base_url().'asset/mahasiswa/scripts/jquery-1.9.1.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/mahasiswa/scripts/jquery-ui-1.10.1.custom.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/mahasiswa/bootstrap/js/bootstrap.min.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/mahasiswa/scripts/flot/jquery.flot.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/mahasiswa/scripts/flot/jquery.flot.resize.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/mahasiswa/scripts/datatables/jquery.dataTables.js'?>" type="text/javascript"></script>
        <script src="<?php echo base_url().'asset/mahasiswa/scripts/common.js'?>" type="text/javascript"></script>
      
    </body>
</html>