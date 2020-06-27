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
                        <h1 class="page-header">Tabel Pembeli</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                  
                                        <form action="<?php echo base_url('Backend/proses_tambah_pembeli') ?>" method="post" enctype="multipart/form-data"
                                            >
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input class="form-control" type="text" name="username" id="username" required="required">
                                            </div>

                                            <div class="form-group">
                                                <label>Nama Pengguna</label>
                                                <input class="form-control" type="text" name="nama" id="nama" required="required">
                                            </div>

                                            <div class="form-group">
                                                <label>Password</label>
                                                <input class="form-control" type="password" name="password" id="password" required="required">
                                            </div>

                                            <div class="form-group">
                                                <label>No Hp</label>
                                                <input class="form-control" type="text" name="no_hp" id="no_hp" required="required">
                                            </div>

                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" type="text" name="email" id="email" required="required">
                                            </div>

                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input class="form-control" name="alamat" id="alamat" required="required">
                                            </div>

                                            <button type="submit" class="btn btn-danger pull-right">Tambah Data</button>
                                        </form>
                                        
                                    </div>
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

    </body>
</html>
