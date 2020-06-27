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
                        <h1 class="page-header">Edit Profile</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">

                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php foreach ($data_profile->result_array() as $profile) { ?>
                                            
                                            <?php echo form_open_multipart('Backend/proses_edit_profile'); ?>
                  
                                            <input type="hidden" name="id_admin" id="id_admin" value="<?php echo $profile['id_admin'] ?>" >
                                            
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input class="form-control" type="text" name="username" id="username" value="<?php echo $profile['username'] ?>">
                                            </div>

                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input class="form-control" type="text" name="nama" id="nama" value="<?php echo $profile['nama'] ?>">
                                            </div>

                                            <div class="form-group">
                                                <label>No Hp</label>
                                                <input class="form-control" type="text" name="no_hp" id="no_hp" value="<?php echo $profile['no_hp'] ?>">
                                            </div>

                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" type="text" name="email" id="email" value="<?php echo $profile['email'] ?>">
                                            </div>

                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input class="form-control" name="alamat" id="alamat" value="<?php echo $profile['alamat'] ?>">
                                            </div>

                                            <button type="submit" class="btn btn-danger pull-right">Edit Profile</button>

                                        <?php } ?>
                                        
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
