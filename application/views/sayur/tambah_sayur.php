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
                        <h1 class="page-header">Tabel Sayur</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form action="<?php echo base_url('Backend/tambah_sayur') ?>" method="post" enctype="multipart/form-data"
                                            >

                                            <div class="form-group">
                                                <label for="nama">Nama Penjual</label><br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <label>
                                                    <select name="id_pengguna" class="form-control">
                                                        <?php foreach ($pengguna as $row) {  ?>
                                                            <option value="<?php echo $row->id_pengguna?>" ><?php echo $row->nama ?></option>
                                                        <?php } ?>  
                                                    </select>
                                                </label>
                                            </div>  

                                            <div class="form-group">
                                                <label for="nama_pasar">Nama Pasar</label><br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <label>
                                                    <select name="id_pasar" class="form-control">
                                                        <?php foreach ($pasar as $row) {  ?>
                                                            <option value="<?php echo $row->id_pasar?>" ><?php echo $row->nama_pasar ?></option>
                                                        <?php } ?>  
                                                    </select>
                                                </label>
                                            </div>
 
                                            <!-- <div class="form-group">
                                                <label for="id_pengguna">Nama Pengguna</label>
                                                <input class="form-control <?php echo form_error('id_pengguna') ? 'is-invalid':'' ?>" type="text" name="id_pengguna" id="id_pengguna" required="required">
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('id_pengguna') ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="nama_sayur">Nama Pasar</label>
                                                <input class="form-control <?php echo form_error('id_pasar') ? 'is-invalid':'' ?>" type="text" name="id_pasar" id="id_pasar" required="required">
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('id_pasar') ?>
                                                </div>
                                            </div> -->

                                            <div class="form-group">
                                                <label for="nama_sayur">Nama Sayur</label>
                                                <input class="form-control <?php echo form_error('nama_sayur') ? 'is-invalid':'' ?>" type="text" name="nama_sayur" id="nama_sayur" required="required">
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('nama_sayur') ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="keterangan">Stok</label>
                                                <input class="form-control <?php echo form_error('stok') ? 'is-invalid':'' ?>" type="text" name="stok" id="stok" required="required">
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('stok') ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="keterangan">Keterangan</label>
                                                <input class="form-control <?php echo form_error('keterangan') ? 'is-invalid':'' ?>" type="text" name="keterangan" id="keterangan" required="required">
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('keterangan') ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="harga">Harga</label>
                                                <input class="form-control <?php echo form_error('harga') ? 'is-invalid':'' ?>" type="text" name="harga" id="harga" required="required">
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('harga') ?>
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
