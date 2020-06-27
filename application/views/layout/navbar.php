<div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url('Backend/index') ?>">SAYUR ONLINE</a>
                </div>

                <ul class="nav navbar-right navbar-top-links">
                    
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="<?php echo base_url('Backend/profile') ?>"><i class="fa fa-user fa-fw"></i> Profile</a>
                            </li>

                            <li><a href="<?php echo base_url('Backend/ubah_password') ?>"><i class="fa fa-lock fa-fw"></i> Ubah Password</a>
                            </li>
                            
                            <li class="divider"></li>
                            <li><a data-toggle="modal" data-target="#logoutModal"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>