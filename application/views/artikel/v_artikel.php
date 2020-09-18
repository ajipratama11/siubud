<div class="card shadow py-2">
    <div class="card-body">
    <a href="<?php echo base_url()."pages/table_barang" ?>" class="btn btn-success mb-3"> <span class="fa fa-arrow-alt-circle-left"></span> Back to table</a>
    <hr>
        <form action="<?= base_url('Pages/aksitambah_artikel'); ?>" method="POST" enctype="multipart/form-data">
            <label>Judul Artikel</label>
            <input name="nama_umkm"  type="text" placeholder="Nama Umkm" class="form-control">
            <input name="tanggal_publish" value="<?= date('Y/m/d'); ?>"  type="text" placeholder="Nama Umkm" class="form-control">
            <br>
            <br>
            <label>Isi Artikel</label>
            <textarea name="isi_artikel"  cols="30" rows="5" class="form-control"></textarea>
            <br>
            <label>Gambar</label>
            <input name="gambar"  type="file" placeholder="Stok" class="form-control">
            <br>
            <?php 
                $this->load->view("common/btn");
            ?>
        </form>
    </div>
</div>
