<div class="card shadow py-2">
    <div class="card-body">
    <a href="<?php echo base_url()."pages/table_barang" ?>" class="btn btn-success mb-3"> <span class="fa fa-arrow-alt-circle-left"></span> Back to table</a>
    <hr>
        <form action="<?= base_url('Pages/tambah_umkm'); ?>" method="POST" enctype="multipart/form-data">
            <label>Nama UMKM</label>
            <input name="nama_umkm"  type="text" placeholder="Nama Umkm" class="form-control">
            <br>
            <label>Kategori Barang</label>
            <select name="id_kategori" id="" class="form-control select2">
                <?php foreach($kategori as $g) { ?>
                <option value="<?= $g->id_kategori ?>" ><?= $g->nama_kategori ?></option>
                <?php } ?>
            </select>
            <br>
            <br>
            <label>Deskripsi</label>
            <textarea name="deskripsi"  cols="30" rows="5" class="form-control"></textarea>
            <br>
            <label>Profil</label>
            <input name="profil"  type="file" placeholder="Stok" class="form-control">
            <br>
            <label>Sampul</label>
            <input name="sampul"  type="file" placeholder="Harga Jual" class="form-control">
            <br>
            <label>Gambar</label>
            <input name="images[]" multiple  type="file" placeholder="Harga Jual" class="form-control">
            <br>
            <label>Nama Pemilik</label>
            <input name="nama_pemilik"  type="text" placeholder="Nama Pemilik" class="form-control">
            <br>
            <label>No HP</label>
            <input name="no_hp"  type="number" placeholder="No HP" class="form-control">
            <br>
            <label>WhatsApp</label>
            <input name="whatsapp"  type="number" placeholder="WhatsApp" class="form-control">
            <br>
            <label>Facebook</label>
            <input name="fb"  type="text" placeholder="facebook" class="form-control">
            <br>
            <label>Instagram</label>
            <input name="instagram"  type="text" placeholder="Instagram" class="form-control">
            <br>
            <?php 
                $this->load->view("common/btn");
            ?>
        </form>
    </div>
</div>
