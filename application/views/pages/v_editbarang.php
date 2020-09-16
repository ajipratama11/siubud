<div class="card shadow py-2">
    <div class="card-body">
    <a href="<?php echo base_url()."pages/table_barang" ?>" class="btn btn-success mb-3"> <span class="fa fa-arrow-alt-circle-left"></span> Back to table</a>
    <hr>
    <?php foreach($edit as $b) { ?>
        <form action="<?= base_url('Pages/aksiedit_barang'); ?>" method="POST" enctype="multipart/form-data">
        <?php $yahoo = md5(uniqid(rand(), true)) ?>
            <label>Nama Barang</label>
            <input name="kode_barang" value="<?= $b->kode_barang; ?>" type="text" placeholder="Nama Barang" class="form-control">
            <input name="nama_barang" value="<?= $b->nama_barang; ?>" type="text" placeholder="Nama Barang" class="form-control">
            <br>
            <label>Kategori Barang</label>
            <select name="id_kategori" id="" class="form-control select2">
                <?php foreach($kategori as $g) { ?>
                <option value="<?= $g->id_kategori ?>" <?php if($b->id_kategori == $g->id_kategori){ echo "selected"; } ?>><?= $g->nama_kategori ?></option>
                <?php } ?>
            </select>
            <br>
            <br>
            <label>Harga Jual</label>
            <input name="harga_jual" value="<?= $b->harga_jual; ?>" type="number" placeholder="Harga Jual" class="form-control">
            <br>
            <label>Stok</label>
            <input name="stok" value="<?= $b->stok; ?>" type="number" placeholder="Stok" class="form-control">
            <br>
           
            <label>Keterangan</label>
            <textarea name="keterangan"  cols="30" rows="5" class="form-control"><?= $b->keterangan; ?></textarea>
            <br>
            <?php 
                $this->load->view("common/btn");
            ?>
        </form>
                <?php } ?>
    </div>
</div>
