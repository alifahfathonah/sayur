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
                        <h1 class="page-header">Ubah Password</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <?php echo $this->session->flashdata('pesan');?>
                    </div>
                    
                </div>
                
                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">

                            <div class="panel-body">
            
                                <div class="row">
                                    <div class="col-lg-12">
                                        
                                            
                                            <?php echo form_open_multipart('Backend/proses_ubah_password'); ?>

                                            <div class="form-group">
                                                <input class="form-control" type="hidden" name="id_admin" id="id_admin">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Password Baru</label>
                                                <input class="form-control" type="password" name="password" id="password">
                                            </div>

                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input class="form-control" type="password" name="password" id="confirm_password">
                                                <span id='message'></span>
                                            </div>

                                            <button type="submit" class="btn btn-danger pull-right">Ubah Password</button>

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

        <script type="text/javascript">

        $('#password, #confirm_password').on('keyup', function () 
        {
            if ($('#password').val() == $('#confirm_password').val()) 
            {
            $('#message').html('Password sama').css('color', 'green');
            } 
            else 
            {
            $('#message').html('Password Tidak Sama').css('color', 'red');
            }
        });
    </script>

    </body>
</html>
