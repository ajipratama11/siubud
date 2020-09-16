<?php
$id = $this->uri->segment(3);
$query = $this->db->query("SELECT * FROM kategori WHERE id_kategori='$id'")->result();
foreach ($query as $q) { ?>
    <div class="modal modalJS" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?= base_url('Pages/aksiedit_kategori'); ?>" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" name="id_kategori" value="<?= $q->id_kategori; ?>" />
                        <input type="text" class="form-control" name="nama_kategori" value="<?= $q->nama_kategori; ?>" />
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