<div class="card shadow py-2">
    <div class="card-body">
    <div class="row">
    <div class="col-md-2">
    <form action="<?= base_url('Pages/tambah_kategori'); ?>" method="POST">
            <input name="nama_kategori" type="text" placeholder="Nama Kategori" class="form-control">
    </div>
    <div class="col-md-4">
            <button type="submit" class="btn btn-primary"> <span class="fa fa-plus-circle"></span> Tambah Kategori</button>
        </form>
    </div>
    </div>
    <br>
        <div class="table-responsive">
        <?php echo $this->session->flashdata('tambahkategori'); ?>
        <?php echo $this->session->flashdata('deletekategori'); ?>
        <?php echo $this->session->flashdata('updatekategori'); ?>
            <table class="table table-striped table-hover table-bordered datatable table-custom">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>ID Kategori</td>
                        <td>Nama Kategori</td>
                        <td>Option</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($kategori as $g) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $g->id_kategori ?></td>
                            <td><?= $g->nama_kategori ?></td>
                            <td>
                                <?php
                                $dropdown['link'] = array(
                                    "Edit" => array('openModal', base_url() ."pages/edit_kategori/".$g->id_kategori),
                                    "Detail" => base_url(),
                                    "Delete" => array('confirm', base_url('Pages/delete_kategori/'.$g->id_kategori))
                                );
                                $this->load->view("common/dropdown", $dropdown);
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>