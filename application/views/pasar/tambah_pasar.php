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
                        <h1 class="page-header">Tabel Pasar</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form action="<?php echo base_url('Backend/tambah_pasar') ?>" method="post" enctype="multipart/form-data"
                                            >
                                            <div class="form-group">
                                                <label for="nama_pasar">Nama Pasar</label>
                                                <input class="form-control <?php echo form_error('nama_pasar') ? 'is-invalid':'' ?>" type="text" name="nama_pasar" id="nama_pasar" required="required">
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('nama_pasar') ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="gambar">Gambar</label>
                                                <input class="form-control-file <?php echo form_error('gambar') ? 'is-invalid':'' ?>" type="file" name="gambar" id="gambar" />
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('gambar') ?>
                                                </div>
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
