<?php
$id = $this->uri->segment(3);
$query = $this->db->query("SELECT * FROM `admin` WHERE id_admin='$id'")->result();
foreach ($query as $q) { ?>
    <div class="modal modalJS" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?= base_url('Pages/aksiedit_akun'); ?>" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" name="id_admin" value="<?= $q->id_admin; ?>" />
                        <input type="text" class="form-control" name="username" value="<?= $q->username; ?>" />
                        <input type="text" class="form-control" name="password" value="<?= $q->password; ?>" />
                        <input type="text" class="form-control" name="no_tlp" value="<?= $q->no_tlp; ?>" />
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>