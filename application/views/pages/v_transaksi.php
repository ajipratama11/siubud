<div class="card shadow py-2">
    <div class="card-body">
        <a href="<?php echo base_url() . "pages/form_tambahbarang" ?>" class="btn btn-primary mb-3"> <span class="fa fa-plus-circle"></span> Tambah Barang</a>
        <div class="table-responsive">
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
                                    "Edit" => array('openModal', base_url()),
                                    "Detail" => base_url(),
                                    "Delete" => array('confirm', base_url())
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