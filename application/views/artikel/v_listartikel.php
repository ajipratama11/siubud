<div class="card shadow py-2">
    <div class="card-body">
        
    <button style="margin-bottom: 10px;" type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">Tambah Akun</button>
        <div class="table-responsive">
        <?php echo $this->session->flashdata('editakun'); ?>
        <?php echo $this->session->flashdata('deleteakun'); ?>
        <?php echo $this->session->flashdata('usernamebelumada'); ?>
        <?php echo $this->session->flashdata('usernamesudahada'); ?>
            <table class="table table-striped table-hover table-bordered datatable table-custom">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Judul Artikel</td>
                        <td>Tanggal Publish</td>
                        <td>Isi Artikel</td>
                        <td>Gambar</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($artikel as $g) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $g->judul_artikel ?></td>
                            <td><?= $g->tanggal_publish ?></td>
                            <td><?= $g->isi_artikel ?></td>
                            <td><img><?= $g->gambar ?></td>
                            <td>
                                <?php
                                $dropdown['link'] = array(
                                    "Edit" => array('openModal', base_url() ."pages/edit_akun/".$g->id_artikel),
                                    "Detail" => array('openModal', base_url() ."pages/detail_artikel/".$g->id_artikel),
                                    "Delete" => array('confirm', base_url('Pages/delete_akun/'.$g->id_artikel))
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