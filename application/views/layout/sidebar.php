<div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-danger" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li >
                                <a href="<?php echo base_url('backend/index') ?>" style="color: red;"><i class="fa fa-home fa-fw" style="color: red"></i><b> Home</b></a>
                            </li>

                            <li >
                                <a href="#" style="color: red;"><i class="fa fa-user fa-fw" style="color: red"></i><b> Data Pengguna</b><span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url('backend/pembeli') ?>" style="color: red;"> Pembeli</a> 
                                        <a href="<?php echo base_url('backend/penjual') ?>" style="color: red;"> Penjual</a> 
                                        
                                    </li>
                                </ul>
                            </li>
                            
                            <li >
                                <a href="<?php echo base_url('backend/pasar') ?>" style="color: red;"><i class="fa fa-map-marker fa-fw" style="color: red"></i><b> Data Pasar</b></a>
                            </li>

                            <li >
                                <a href="<?php echo base_url('backend/sayur') ?>" style="color: red;"><i class="fa fa-shopping-cart fa-fw" style="color: red"></i><b> Data Sayur</b></a>
                            </li>

                            <li >
                                <a href="<?php echo base_url('backend/transaksi') ?>" style="color: red;"><i class="fa fa-money fa-fw" style="color: red"></i><b> Transaksi</b></a>
                            </li>

                            
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>