<div class="card shadow py-2">
    <div class="card-body">
    <a href="<?php echo base_url()."pages/table_barang" ?>" class="btn btn-success mb-3"> <span class="fa fa-arrow-alt-circle-left"></span> Back to table</a>
    <?php foreach($artikel as $g) { ?>
    <hr>
        <form action="<?= base_url('Pages/aksiedit_artikel'); ?>" method="POST" enctype="multipart/form-data">
            <label>Judul Artikel</label>
            <input name="nama_umkm" value="<?= $g->judul_artikel ?>"  type="text" placeholder="Nama Umkm" class="form-control">
            <input name="tanggal_publish" value="<?= $g->tanggal_publish ?>"  type="text" placeholder="Nama Umkm" class="form-control">
            <br>
            <br>
            <label>Isi Artikel</label>
            <textarea name="isi_artikel"  cols="30" rows="5" class="form-control"><?= $g->isi_artikel ?></textarea>
            <br>
            <label>Gambar</label>
            <input name="gambar"  type="file" placeholder="Stok" class="form-control">
            <img src="<?=  $g->judul_artikel ?>">
            <br>
            <?php 
                $this->load->view("common/btn");
            ?>
        </form>
    </div>
</div>
    <?php } ?>
