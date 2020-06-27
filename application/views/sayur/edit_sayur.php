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
                                        <form action="<?php echo base_url('Backend/edit_sayur') ?>" method="post" enctype="multipart/form-data"
                                            >

                                        <h6 style="color: red;">* Edit Kembali Nama Penjual dan Nama Pasar</h6>

                                        <input type="hidden" name="id_sayur" value="<?php echo $data_sayur->id_sayur ?>" /> 

                                            <div class="form-group">
                                                <label for="id_pengguna">Nama Penjual *</label> <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <label>
                                                    <select name="id_pengguna" class="form-control <?php echo form_error('id_pengguna') ? 'is-invalid':'' ?>">
                                                        <?php foreach ($pengguna as $row) {  ?>
                                                            <option value="<?php echo $row->id_pengguna?>" ><?php echo $row->nama ?></option>
                                                        <?php } ?>  
                                                    </select>
                                                </label>

                                                <!-- <input class="form-control <?php echo form_error('id_pengguna') ? 'is-invalid':'' ?>" type="text" name="id_pengguna" value="<?php echo $data_sayur->id_pengguna ?>" /> -->
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('id_pengguna') ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="id_pasar">Nama Pasar *</label> <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <label>
                                                    <select name="id_pasar" class="form-control <?php echo form_error('id_pasar') ? 'is-invalid':'' ?>">
                                                        <?php foreach ($pasar as $row) {  ?>
                                                            <option value="<?php echo $row->id_pasar?>" ><?php echo $row->nama_pasar ?></option>
                                                        <?php } ?>  
                                                    </select>
                                                </label>
                                                <!-- <input class="form-control <?php echo form_error('id_pasar') ? 'is-invalid':'' ?>" type="text" name="id_pasar" value="<?php echo $data_sayur->id_pasar ?>" /> -->
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('id_pasar') ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="nama_sayur">Nama Sayur</label>
                                                <input class="form-control <?php echo form_error('nama_sayur') ? 'is-invalid':'' ?>" type="text" name="nama_sayur" value="<?php echo $data_sayur->nama_sayur ?>" />
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('nama_sayur') ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="stok">Stok</label>
                                                <input class="form-control <?php echo form_error('stok') ? 'is-invalid':'' ?>" type="text" name="stok" value="<?php echo $data_sayur->stok ?>" />
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('stok') ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="keterangan">Keterangan</label>
                                                <input class="form-control <?php echo form_error('keterangan') ? 'is-invalid':'' ?>" type="text" name="keterangan" value="<?php echo $data_sayur->keterangan ?>" />
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('keterangan') ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="harga">Harga</label>
                                                <input class="form-control <?php echo form_error('harga') ? 'is-invalid':'' ?>" type="text" name="harga" value="<?php echo $data_sayur->harga ?>" />
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('harga') ?>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="gambar">Gambar</label>
                                                <input class="form-control-file <?php echo form_error('gambar') ? 'is-invalid':'' ?>" type="file" name="gambar" />
                                                <input type="hidden" name="old_image" value="<?php echo $data_sayur->gambar ?>" />
                                                <div class="invalid-feedback">
                                                    <?php echo form_error('gambar') ?>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-danger pull-right">Edit Data</button>

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
