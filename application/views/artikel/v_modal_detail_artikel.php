<?php
$id = $this->uri->segment(3);
$query = $this->db->query("SELECT * FROM `artikel` WHERE id_artikel='$id'")->result();
foreach ($query as $q) { ?>
    <div class="modal modalJS" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Isi Artikel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <center><h2><?= $q->judul_artikel ?></h2></center>
                        <center><h5><?= $q->tanggal_publish ?></h5></center>
                        <p><?= $q->isi_artikel ?></p>
                    </div>
               
            </div>
        </div>
    </div>
<?php } ?>