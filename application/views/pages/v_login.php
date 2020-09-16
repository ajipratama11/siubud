<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url() . "assets/" ?>css/sb-admin-2.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() . "assets/" ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() . "assets/" ?>css/custom.css" rel="stylesheet" />
    <title>E-Kasir Login</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="box-login">
                    <div class="top">
                        <p>E-Kasir Desa Kraton</p>
                    </div>
                    <div class="body">
                        <div class="intro mb-4">
                            <p class="mb-0"><span class="fa fa-info-circle mr-2"></span> Login untuk masuk ke aplikasi E-Kasir Desa Kraton</p>
                        </div>

                        <form action="<?= base_url('Login/aksi_login') ?>" method="POST">
                            <div class="form-underline">
                                <input type="text" name="username" placeholder="Masukkan Username" />
                                <span class="fa fa-user"></span>
                            </div>
                            <br>
                            <div class="form-underline">
                                <input type="password" name="password" placeholder="Masukkan Password" />
                                <span class="fa fa-lock"></span>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary py-2 px-5">Login</button>
                        </form>
                    </div>
                </div>
                <div class="copyright mt-5">
                    Copyright E-Kasir Desa Kraton
                </div>

            </div>
        </div>
    </div>
</body>

</html>