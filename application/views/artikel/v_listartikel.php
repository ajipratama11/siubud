<div class="card shadow py-2">
    <div class="card-body">
        
    <a href="<?= base_url('Pages/artikel') ?>" style="margin-bottom: 10px;" class="btn btn-success" >Tambah Artikel</a>
        <div class="table-responsive">
        <?php echo $this->session->flashdata('editartikel'); ?>
        <?php echo $this->session->flashdata('deleteartikel'); ?>
        <?php echo $this->session->flashdata('tambahartikel'); ?>
            <table class="table table-striped table-hover table-bordered datatable table-custom">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Judul Artikel</td>
                        <td>Tanggal Publish</td>
                        <td>Isi Artikel</td>
                        <td>Gambar</td>
                        <td>Option</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($artikel as $g) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $g->judul_artikel ?></td>
                            <td><?= $g->tanggal_publish ?></td>
                            <td><?= (str_word_count($g->isi_artikel) > 30 ? substr($g->isi_artikel,0,200)."..." : $g->isi_artikel)  ?></td>
                            <td><a target="_blank" href="<?php echo base_url('./assets/img/'.$g->gambar); ?>"><img width="150px" height="150px" src="<?php echo base_url('./assets/img/'.$g->gambar); ?>"></a></td>
                            <td>
                                <?php
                                $dropdown['link'] = array(
                                    "Edit" => base_url() ."pages/editartikel/".$g->id_artikel,
                                    "Detail" => array('openModal', base_url() ."pages/detail/".$g->id_artikel),
                                    "Delete" => array('confirm', base_url('Pages/aksihapus_artikel/'.$g->id_artikel))
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