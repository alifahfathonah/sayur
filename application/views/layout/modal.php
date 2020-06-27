<!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <a class="btn btn-danger btn-outline btn-circle" href="<?php echo base_url('Login/logout') ?>"><i class="fa fa-check"></i></a>
                    <button class="btn btn-warning btn-outline btn-circle" type="button" data-dismiss="modal"><i class="fa fa-times"></i></button>
                </div>
            </div>
        </div>
    </div>

<!-- Delete Confirmation-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-danger" >
                    <h5 class="modal-title" id="exampleModalLabel">Apakah Kamu Yakin?</h5>
                </div>
                <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                <div class="modal-footer">
                    <a id="btn-delete" class="btn btn-danger btn-outline btn-circle" href="#"><i class="fa fa-check"></i></a>
                    <button class="btn btn-warning btn-outline btn-circle" type="button" data-dismiss="modal"><i class="fa fa-times"></i></button>                    
                </div>
            </div>
        </div>
    </div>
