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
                        <td>Username</td>
                        <td>Password</td>
                        <td>No tlp</td>
                        <td>Option</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($akun as $g) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $g->username ?></td>
                            <td><?= $g->password ?></td>
                            <td><?= $g->no_tlp ?></td>
                            <td>
                                <?php
                                $dropdown['link'] = array(
                                    "Edit" => array('openModal', base_url() ."pages/edit_akun/".$g->id_admin),
                                    "Detail" => base_url(),
                                    "Delete" => array('confirm', base_url('Pages/delete_akun/'.$g->id_admin))
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
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Kategori</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('pages/tambah_akun'); ?>" method="post" enctype="multipart/form-data">
                             
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-4  control-label col-form-label">Username</label>
                                    <div class="col-sm-8">
                                        <input type="text" style="border-radius: 10px;" name="username" class="form-control" id="username" placeholder="Username" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-4  control-label col-form-label">Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" style="border-radius: 10px;" name="password" class="form-control" id="password" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-4  control-label col-form-label">Nomor Telepon</label>
                                    <div class="col-sm-8">
                                    <input type="number" style="border-radius: 10px;" name="no_tlp" class="form-control" id="password" placeholder="No Tlp" required>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>