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
                        <h1 class="page-header">Profile</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
           
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">

                            <div class="panel-body">
                                <?php echo $this->session->flashdata('pesan');?>
                                <div class="row">
                                    <div class="col-lg-6">

                                        <?php 
                                            foreach ($data_profile->result_array() as $profile) { ?>
                                            
                                            <div class="form-group">
                                                <h6>Username</h6>
                                                <h4><?php echo $profile['username']; ?></h4>
                                            </div>

                                            <div class="form-group">
                                                <h6>Nama</h6>
                                                <h4><?php echo $profile['nama']; ?></h4>
                                            </div>

                                            <div class="form-group">
                                                <h6>No Hp</h6>
                                                <h4><?php echo $profile['no_hp']; ?></h4>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <h6>Email</h6>
                                                <h4><?php echo $profile['email']; ?></h4>
                                            </div>

                                            <div class="form-group">
                                                <h6>Alamat</h6>
                                                <h4><?php echo $profile['alamat']; ?></h4>
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>     
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <?php 
                            foreach ($data_profile->result_array() as $profile) { ?>

                            <a href="<?php echo base_url('Backend/edit_profile/').$profile['id_admin']; ?>" class="btn btn-danger pull-left">Edit Profile</a>

                        <?php } ?>
                    </div>
                    <!-- /.col-lg-12 -->
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
