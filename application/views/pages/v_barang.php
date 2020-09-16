<div class="card shadow py-2">
    <div class="card-body">
        <a href="<?php echo base_url()."pages/form_tambahbarang" ?>" class="btn btn-primary mb-3"> <span class="fa fa-plus-circle"></span> Tambah Barang</a>
        <div class="table-responsive">
        <?php echo $this->session->flashdata('success'); ?>
        <?php echo $this->session->flashdata('success2'); ?>
        <?php echo $this->session->flashdata('success3'); ?>
            <table class="table table-striped table-hover table-bordered datatable table-custom">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Kode Barang</td>
                        <td>Nama Barang</td>
                        <td>Kategori</td>
                        <td>Harga Jual</td>
                        <td>Stok</td>
                        <td>Keterangan</td>
                        <td>Option</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;
                    foreach($barang as $g) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $g->kode_barang ?></td>
                        <td><?= $g->nama_barang ?></td>
                        <td><?= $g->nama_kategori ?></td>
                        <td><?= $g->harga_jual ?></td>
                        <td><?= $g->stok ?></td>
                        <td><?= $g->keterangan ?></td>
                        <td>
                            <?php 
                                $dropdown['link'] = array(
                                    "Edit" => base_url('Pages/edit_barang/'.$g->kode_barang),
                                    "Delete" => base_url('Pages/delete_barang/'.$g->kode_barang)
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
