<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('layout/head') ?>
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

                <?php $this->load->view('layout/navbar') ?>
                <!-- /.navbar-top-links -->

                <?php $this->load->view('layout/sidebar') ?>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tabel Penjual</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">

                            <div class="panel-body">
                                <a href="<?php echo base_url('Backend/tambah_penjual')?>" class="btn btn-default btn-sm btn-outline btn-circle"><i class="fa fa-plus" style="color: red;"></i></a>
                            </div>
                        
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <?php echo $this->session->flashdata('pesan');?>
                                    
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No</th> 
                                                <th>Username</th>
                                                <th>Nama Pengguna</th>
                                                <th>No Telepon</th>
                                                <th>Email</th>
                                                <th>Alamat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                              $no=+1;
                                              foreach ($data_pengguna->result_array() as $pengguna) { ?>
                                              
                                              <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $pengguna['username'] ?></td>
                                                <td><?php echo $pengguna['nama'] ?></td>
                                                <td><?php echo $pengguna['no_hp'] ?></td>
                                                <td><?php echo $pengguna['email'] ?></td>
                                                <td><?php echo $pengguna['alamat'] ?></td>
                                                <td> 
                                                 <a href="<?php echo base_url('Backend/edit_penjual/'.$pengguna['id_pengguna']) ?>" class="btn btn-default btn-sm btn-outline btn-circle"><i class="fa fa-edit" style="color: red;"></i></a> | 
                                                  <a onclick="deleteConfirm('<?php echo site_url('Backend/hapus_penjual/').$pengguna['id_pengguna']; ?>')" href="#!" class="btn btn-default btn-sm btn-outline btn-circle"><i class="fa fa-trash" style="color: red;"></i></a>
                                                </td>
                                              </tr>
                                            
                                            <?php
                                              $no++; } ?>
                                        
                                      </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>     
                </div>
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <?php $this->load->view('layout/modal') ?>
        <?php $this->load->view('layout/js') ?>
        
        <script>

            function deleteConfirm(url){
                $('#btn-delete').attr('href', url);
                $('#deleteModal').modal();
            }
        </script>

    </body>
</html>
