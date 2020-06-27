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
                        <h1 class="page-header">Home</h1>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="hero-widget well well-sm">
                                <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="text">
                                    <?php foreach ($jumlah_penjual->result_array() as $a) { ?>
                                    
                                    <span class="value"><?php echo $a['jumlah'];?></span>
                                    <label class="text-muted">Data Penjual</label>

                                    <?php } ?>
                                </div>
                                <div class="options">
                                    <a href="<?php echo base_url('Backend/penjual')?>"" class="btn btn-danger btn-lg">View Detail</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="hero-widget well well-sm">
                                <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <div class="text">
                                    <?php foreach ($jumlah_pembeli->result_array() as $a) { ?>
                                    
                                    <span class="value"><?php echo $a['jumlah'];?></span>
                                    <label class="text-muted">Data Pembeli</label>

                                    <?php } ?>
                                </div>
                                <div class="options">
                                    <a href="<?php echo base_url('Backend/pembeli')?>"" class="btn btn-danger btn-lg">View Detail</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="hero-widget well well-sm">
                                <div class="icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="text">
                                    <?php foreach ($jumlah_pasar->result_array() as $a) { ?>
                                    
                                    <span class="value"><?php echo $a['jumlah'];?></span>
                                    <label class="text-muted">Data Pasar</label>

                                    <?php } ?>
                                </div>
                                <div class="options">
                                    <a href="<?php echo base_url('Backend/pasar')?>"" class="btn btn-danger btn-lg">View Detail</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="hero-widget well well-sm">
                                <div class="icon">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="text">
                                    <?php foreach ($jumlah_sayur->result_array() as $a) { ?>
                                    
                                    <span class="value"><?php echo $a['jumlah'];?></span>
                                    <label class="text-muted">Data Sayur</label>

                                    <?php } ?>
                                </div>
                                <div class="options">
                                    <a href="<?php echo base_url('Backend/sayur')?>"" class="btn btn-danger btn-lg">View Detail</a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="hero-widget well well-sm">
                                <div class="icon">
                                    <i class="fa fa-money"></i>
                                </div>
                                <div class="text">
                                    <?php foreach ($jumlah_transaksi->result_array() as $a) { ?>
                                    
                                    <span class="value"><?php echo $a['jumlah'];?></span>
                                    <label class="text-muted">Data Transaksi</label>

                                    <?php } ?>
                                </div>
                                <div class="options">
                                    <a href="<?php echo base_url('Backend/transaksi')?>"" class="btn btn-danger btn-lg">View Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="hero-widget well well-sm">
                                
                                <div class="text">
                                    <?php foreach ($pasar_1->result_array() as $a) { ?>
                                    
                                    <span class="value"><?php echo $a['jumlah'];?></span>
                                    <label class="text-muted">Data Sayur di Pasar Padang Luar</label>

                                    <?php } ?>
                                </div>
                                
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="hero-widget well well-sm">
                                
                                <div class="text">
                                    <?php foreach ($pasar_2->result_array() as $a) { ?>
                                    
                                    <span class="value"><?php echo $a['jumlah'];?></span>
                                    <label class="text-muted">Data Sayur di Pasar Koto Baru</label>

                                    <?php } ?>
                                </div>
                                
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="hero-widget well well-sm">
                                
                                <div class="text">
                                    <?php foreach ($pasar_3->result_array() as $a) { ?>
                                    
                                    <span class="value"><?php echo $a['jumlah'];?></span>
                                    <label class="text-muted">Data Sayur di Pasar Aur Kuning</label>

                                    <?php } ?>
                                </div>
                                
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="hero-widget well well-sm">
                                
                                <div class="text">
                                    <?php foreach ($pasar_4->result_array() as $a) { ?>
                                    
                                    <span class="value"><?php echo $a['jumlah'];?></span>
                                    <label class="text-muted">Data Sayur di Pasar Baso</label>

                                    <?php } ?>
                                </div>
                                
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <div class="hero-widget well well-sm">
                                
                                <div class="text">
                                    <?php foreach ($pasar_5->result_array() as $a) { ?>
                                    
                                    <span class="value"><?php echo $a['jumlah'];?></span>
                                    <label class="text-muted">Data Sayur di Pasar Lasi</label>

                                    <?php } ?>
                                </div>
                                
                            </div>
                        </div>

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

    </body>
</html>
