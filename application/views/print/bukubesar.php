<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <?php
  $uri = !empty($this->uri->segment(2)) ? $this->uri->segment(2) : $this->uri->segment(1);
  $pageTitle = ucwords(str_replace("_", " ", $uri));
  ?>
  <title><?php echo $pageTitle . " - " . $pageInfo ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url() . "assets/" ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url() . "assets/" ?>css/sb-admin-2.min.css" rel="stylesheet" />
  <link href="<?php echo base_url() . "assets/" ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />
  <link href="<?php echo base_url() . "assets/" ?>vendor/select2-develop/dist/css/select2.min.css" rel="stylesheet" />
  <link href="<?php echo base_url() . "assets/" ?>vendor/sweetalert-master/dist/sweetalert.css" rel="stylesheet" />
  <link href="<?php echo base_url() . "assets/" ?>vendor/bootstrap-datepicker-master/dist/css/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" />
  <link href="<?php echo base_url() . "assets/" ?>css/custom.css" rel="stylesheet" />
  <script src="<?php echo base_url() . "assets/" ?>vendor/jquery/jquery.min.js"></script>
</head>
<div class="card shadow py-2">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered table-custom">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Kode Penjualan</td>
                        <td>Tanggal Penjualan</td>
                        <td>Nama Pembeli</td>
                        <td>Total QTY</td>
                        <td>Total Penjualan</td>
                        <td>Total Bayar</td>
                        <td>Potongan</td>
                        <td>Admin</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    $debit = '';
                    $kredit = '';
                    $saldoAwal = $totalDebit[0]->total - $totalKredit[0]->total; ?> 
                       <td><?= $no++; ?></td>
                            <td>Saldo Awal</td>
                            <td>Saldo Awal</td>
                            <td><?= $tanggal ?></td>
                            <td><?= $totalDebit[0]->total ?></td>
                            <td><?= $totalKredit[0]->total ?></td>
                            <td><?= $saldoAwal ?></td>
                            <td>-</td>
                    <?php

                      foreach ($records as $key => $record) {
                        if ($key == 0) {
                            $saldoTerakhir = $saldoAwal;
                        } else {
                            $saldoTerakhir = $records[$key - 1]->saldoSekarang;
                        }
                        if ($record->jenis == 'debit') {
                            $saldoSekarang = $saldoTerakhir + $record->nominal;
                        } else {
                            $saldoSekarang = $saldoTerakhir - $record->nominal;
                        }
                        $records[$key]->saldoSekarang = $saldoSekarang;
            
                        if ($record->jenis == 'debit') {
                            $debit = $record->nominal;
                        } else {
                            $debit = '-';
                        }
                        if ($record->jenis == 'kredit') {
                            $kredit = $record->nominal;
                        } else {
                            $kredit = '-';
                        } ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $record->kode_transaksi ?></td>
                            <td><?= $record->tipe ?></td>
                            <td><?= $record->tanggal ?></td>
                            <td><?= $debit ?></td>
                            <td><?= $kredit ?></td>
                            <td><?= $saldoSekarang ?></td>
                            <td><?= $record->keterangan ?></td>
                           
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
		window.print();
    </script>
     <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url() . "assets/" ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() . "assets/" ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() . "assets/" ?>js/sb-admin-2.min.js"></script>
<script src="<?php echo base_url() . "assets/" ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() . "assets/" ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() . "assets/" ?>vendor/select2-develop/dist/js/select2.min.js"></script>
<script src="<?php echo base_url() . "assets/" ?>vendor/sweetalert-master/dist/sweetalert-dev.js"></script>
<script src="<?php echo base_url() . "assets/" ?>vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url() . "assets/" ?>js/custom.js"></script>
</body>

</html>