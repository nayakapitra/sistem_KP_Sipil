<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Mahasiswa</title>
  <!-- Tell the browser to be responsive to screen width -->

  <!-- Bootstrap 3.3.6 -->
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.png'?>">
  <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
  <!-- Ionicons -->
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
   <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">


        </head>
        <body class="hold-transition skin-blue sidebar-mini">
          <div class="wrapper">

            <!--Header-->
            <?php
            $this->load->view('admin/v_header');
            ?>

            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
              <!-- sidebar: style can be found in sidebar.less -->
              <section class="sidebar">

                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                  <li class="header">Menu Utama</li>
                  <li class="active">
                    <a href="<?php echo base_url().'admin/dashboard'?>">
                      <i class="fa fa-home"></i> <span>Dashboard</span>
                      <span class="pull-right-container">
                        <small class="label pull-right"></small>
                      </span>
                    </a>
                  </li>
                  
                  <li>  
                    <a href="<?php echo base_url().'admin/pengguna'?>">
                      <i class="fa fa-users"></i> <span>Data Dosen</span>
                      <span class="pull-right-container">
                        <small class="label pull-right"></small>
                      </span>
                    </a>
                  </li>


                  <li>
                    <a href="<?php echo base_url().'admin/Download'?>">
                      <i class="fa fa-download"></i> <span>Download</span>
                      <span class="pull-right-container">
                        <small class="label pull-right"></small>
                      </span>
                    </a>
                  </li>


                  <li class="treeview">
                    <a href="#">
                      <i class="fa fa-user"></i>
                      <span>Kesiswaan</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                   <ul class="treeview-menu">
                      <li><a href="<?php echo base_url().'admin/siswa'?>"><i class="fa fa-users"></i> Data Mahasiswa</a></li>
                      <li><a href="<?php echo base_url().'admin/files'?>"><i class="fa fa-users"></i> Data Pendaftaran</a></li>
                      <li><a href="<?php echo base_url().'admin/perusahaan'?>"><i class="fa fa-users"></i> Data Perusahaan</a></li>
                      <li><a href="<?php echo base_url().'admin/surat'?>"><i class="fa fa-users"></i> Data Surat Balasan</a></li>
                      <li><a href="<?php echo base_url().'admin/Laporan'?>"><i class="fa fa-users"></i> Data Berkas Laporan</a></li>
                    </ul>
                  </li>

                  <li>
                    <a href="<?php echo base_url().'login/logout'?>">
                      <i class="fa fa-sign-out"></i> <span>Sign Out</span>
                      <span class="pull-right-container">
                        <small class="label pull-right"></small>
                      </span>
                    </a>
                  </li>


                </ul>
              </section>
              <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
              <!-- Content Header (Page header) -->
              <section class="content-header">
                <h1>
                  Data Pendaftaran
                  <small></small>
                </h1>
                <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li class="active">Data Pendaftaran</li>
                </ol>
              </section>

              <!-- Main content -->
              <section class="content">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="box">

                      <div class="box">
                        <div class="box-header">
                          <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-user-plus"></span> Add Mahasiswa</a>
                          </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <table id="example1" class="table table-striped" style="font-size:13px;">
                            <thead>
                              <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th style="text-align:right;">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $no=0;
                              foreach ($data->result_array() as $i) :
                               $no++;
                               $id=$i['siswa_id'];
                               $nis=$i['siswa_nis'];
                               $nama=$i['siswa_nama'];
                               $Email=$i['email_siswa'];

                               ?>
                               <tr>
                                <td><?php echo $nis;?></td>
                                <td><?php echo $nama;?></td>
                                <td><?php echo $Email;?></td>
                                <td style="text-align:right;">
                                  <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $id;?>"><span class="fa fa-pencil"></span></a>
                                  <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id;?>"><span class="fa fa-trash"></span></a>
                                </td>
                              </tr>
                            <?php endforeach;?>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </section>
              <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
              <div class="pull-right hidden-xs">
              </div>
              <strong>Copyright &copy; 2019 <a href="">Teknik Sipil </a>.</strong>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
              <!-- Create the tabs -->
              <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab">
                  <h3 class="control-sidebar-heading">Recent Activity</h3>
                  <ul class="control-sidebar-menu">
                    <li>
                      <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                        <div class="menu-info">
                          <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                          <p>Will be 23 on April 24th</p>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-user bg-yellow"></i>

                        <div class="menu-info">
                          <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                          <p>New phone +1(800)555-1234</p>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                        <div class="menu-info">
                          <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                          <p>nora@example.com</p>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-file-code-o bg-green"></i>

                        <div class="menu-info">
                          <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                          <p>Execution time 5 seconds</p>
                        </div>
                      </a>
                    </li>
                  </ul>
                  <!-- /.control-sidebar-menu -->

                  <h3 class="control-sidebar-heading">Tasks Progress</h3>
                  <ul class="control-sidebar-menu">
                    <li>
                      <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                          Custom Template Design
                          <span class="label label-danger pull-right">70%</span>
                        </h4>

                        <div class="progress progress-xxs">
                          <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                          Update Resume
                          <span class="label label-success pull-right">95%</span>
                        </h4>

                        <div class="progress progress-xxs">
                          <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                          Laravel Integration
                          <span class="label label-warning pull-right">50%</span>
                        </h4>

                        <div class="progress progress-xxs">
                          <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                          Back End Framework
                          <span class="label label-primary pull-right">68%</span>
                        </h4>

                        <div class="progress progress-xxs">
                          <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                        </div>
                      </a>
                    </li>
                  </ul>
                  <!-- /.control-sidebar-menu -->

                </div>
                <!-- /.tab-pane -->
                <!-- Stats tab content -->
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                <!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                  <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                      <label class="control-sidebar-subheading">
                        Report panel usage
                        <input type="checkbox" class="pull-right" checked>
                      </label>

                      <p>
                        Some information about this general settings option
                      </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label class="control-sidebar-subheading">
                        Allow mail redirect
                        <input type="checkbox" class="pull-right" checked>
                      </label>

                      <p>
                        Other sets of options are available
                      </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label class="control-sidebar-subheading">
                        Expose author name in posts
                        <input type="checkbox" class="pull-right" checked>
                      </label>

                      <p>
                        Allow the user to show his name in blog posts
                      </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                      <label class="control-sidebar-subheading">
                        Show me as online
                        <input type="checkbox" class="pull-right" checked>
                      </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label class="control-sidebar-subheading">
                        Turn off notifications
                        <input type="checkbox" class="pull-right">
                      </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                      <label class="control-sidebar-subheading">
                        Delete chat history
                        <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                      </label>
                    </div>
                    <!-- /.form-group -->
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
            </aside>
            <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->
   <div class="control-sidebar-bg"></div>
 </div>
 <!-- ./wrapper -->

 <!--Modal Add Pengguna-->
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        <h4 class="modal-title" id="myModalLabel">Add Mahasiswa</h4>
      </div>
      <form class="form-horizontal" action="<?php echo base_url().'admin/siswa/simpan_siswa'?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">NIM</label>
            <div class="col-sm-7">
              <input type="number" name="xnis" class="form-control" id="inputUserName" placeholder="NIS" required>
            </div>
          </div>

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
            <div class="col-sm-7">
              <input type="text" name="xnama" class="form-control" id="inputUserName" placeholder="Nama" required>
            </div>
          </div>

          <div class="form-group">
            <label for="inputUserName" class="col-sm-4 control-label">Email</label>
            <div class="col-sm-7">
              <input type="text" name="xemail" class="form-control" id="inputUserName" placeholder="nama.nim@student.itera.ac.id" required>
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
            <div class="col-sm-7">
              <input type="password" name="xpassword" class="form-control" id="inputPassword3" placeholder="Password" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword4" class="col-sm-4 control-label">Ulangi Password</label>
            <div class="col-sm-7">
              <input type="password" name="xpassword2" class="form-control" id="inputPassword4" placeholder="Ulangi Password" required>
            </div>
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!--Modal Edit Album-->
<?php foreach ($data->result_array() as $i) :
  $id=$i['siswa_id'];
  $nis=$i['siswa_nis'];
  $nama=$i['siswa_nama'];
  $Email=$i['email_siswa'];
  $password=$i['siswa_password'];
  ?>

  <div class="modal fade" id="ModalEdit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Edit Mahasiswa</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url().'admin/siswa/update_siswa'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" name="kode" value="<?php echo $id;?>"/>
            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">NIM</label>
              <div class="col-sm-7">
                <input type="number" name="xnis" value="<?php echo $nis;?>" class="form-control" id="inputUserName" placeholder="NIP" required>
              </div>
            </div>

            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
              <div class="col-sm-7">
                <input type="text" name="xnama" value="<?php echo $nama;?>" class="form-control" id="inputUserName" placeholder="Nama" required>
              </div>
            </div>

            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">Email</label>
              <div class="col-sm-7">
                <input type="text" name="xemail" value="<?php echo $Email;?>" class="form-control" id="inputUserName" placeholder="nama.nim@student.itera.ac.id" required>
              </div>
            </div>

            <div class="form-group">
              <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
              <div class="col-sm-7">
                <input type="password" maxlength="6" name="xpassword" class="form-control" id="inputPassword3" placeholder="Password">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword4" class="col-sm-4 control-label">Ulangi Password</label>
              <div class="col-sm-7">
                <input type="password" maxlength="6" name="xpassword2" class="form-control" id="inputPassword4" placeholder="Ulangi Password">
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach;?>
<!--Modal Edit Album-->

<?php foreach ($data->result_array() as $i) :
  $id=$i['siswa_id'];
  $nis=$i['siswa_nis'];
  $nama=$i['siswa_nama'];
  $Email=$i['email_siswa'];
  $password=$i['siswa_password'];
  ?>
  <!--Modal Hapus Pengguna-->
  <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Hapus Siswa</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url().'admin/siswa/hapus_siswa'?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
           <input type="hidden" name="kode" value="<?php echo $id;?>"/>
           <p>Apakah Anda yakin mau menghapus Siswa <b><?php echo $nama;?></b> ?</p>

         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach;?>




<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<?php if($this->session->flashdata('msg')=='error'):?>
  <script type="text/javascript">
    $.toast({
      heading: 'Error',
      text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
      showHideTransition: 'slide',
      icon: 'error',
      hideAfter: false,
      position: 'bottom-right',
      bgColor: '#FF4859'
    });
  </script>

  <?php elseif($this->session->flashdata('msg')=='success'):?>
    <script type="text/javascript">
      $.toast({
        heading: 'Success',
        text: "Siswa Berhasil disimpan ke database.",
        showHideTransition: 'slide',
        icon: 'success',
        hideAfter: false,
        position: 'bottom-right',
        bgColor: '#7EC857'
      });
    </script>
    <?php elseif($this->session->flashdata('msg')=='info'):?>
      <script type="text/javascript">
        $.toast({
          heading: 'Info',
          text: "Siswa berhasil di update",
          showHideTransition: 'slide',
          icon: 'info',
          hideAfter: false,
          position: 'bottom-right',
          bgColor: '#00C9E6'
        });
      </script>
      <?php elseif($this->session->flashdata('msg')=='success-hapus'):?>
        <script type="text/javascript">
          $.toast({
            heading: 'Success',
            text: "Siswa Berhasil dihapus.",
            showHideTransition: 'slide',
            icon: 'success',
            hideAfter: false,
            position: 'bottom-right',
            bgColor: '#7EC857'
          });
        </script>
        <?php else:?>

        <?php endif;?>
      </body>
      </html>
