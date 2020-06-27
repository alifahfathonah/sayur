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
                        <h1 class="page-header">Tabel Transaksi</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">

                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <?php echo $this->session->flashdata('pesan');?>
                                    
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No</th> 
                                                <th>Pasar</th>
                                                <th>Sayur</th>
                                                <th>Penjual</th>
                                                <th>Pembeli</th>
                                                <th>Jumlah Beli</th>
                                                <th>Total</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                              $no=+1;
                                              foreach ($data_transaksi as $transaksi) { ?>
                                              
                                              <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $transaksi->nama_pasar ?></td>
                                                <td><?php echo $transaksi->nama_sayur ?></td>
                                                <td><?php echo $transaksi->nama_penjual ?></td>
                                                <td><?php echo $transaksi->nama ?></td>
                                                <td><?php echo $transaksi->jumlah_beli ?></td>
                                                <td><?php echo $transaksi->total ?></td>
                                                <td align="center"> 
                                                  <a onclick="deleteConfirm('<?php echo site_url('Backend/hapus_transaksi/'.$transaksi->id_transaksi) ?>')" href="#!" class="btn btn-default btn-sm btn-outline btn-circle"><i class="fa fa-trash" style="color: red;"></i></a>
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
