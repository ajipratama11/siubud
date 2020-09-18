<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets/frontend/' ?>/css/custom.css" />
    <title>Document</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light py-4 fixed-top">
      <div class="container custom">
        <a class="navbar-brand font-weight-bold" href="#"><img src="<?php echo base_url()."assets/frontend/img/common/logo.png" ?>" width="150px" alt="">
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
              <li class="nav-item active"><a class='nav-link' href="<?php echo base_url() ?>">Beranda</a></li>
              <li class="nav-item"><a class='nav-link' href="<?php echo base_url().'profil-desa' ?>">Profil Desa</a></li>
              <li class="nav-item"><a class='nav-link' href="<?php echo base_url().'bumdes' ?>">BUMDesa Kraton</a></li>
              <li class="nav-item"><a class='nav-link' href="<?php echo base_url().'produk-umkm' ?>">Produk UMKM</a></li>

          </ul>
        </div>
      </div>
    </nav>
    <?php echo $contents; ?>
    <section id="footer" class="section-space">
      <div class="container custom">
        <div class="row">
          <div class="col-md-4 pr-4">
            <img src="<?php echo base_url()."assets/frontend/img/common/logo.png" ?>" width="120px" alt="">
            <p class="mt-2 color-grey font-weight-light">Web ini berisi tentang informasi UMKM yang ada di Desa Kraton dan BUMDES Ramai Jaya.Yang menjelaskan tentang deskripsi dan informasi tentang usaha yang ada di Desa Kraton Kecamatan Yosowilangun Kabupaten Lumajang</p>
          </div>
          <div class="col-md-2">
            <h6 class="color-p  urple font-weight-bold">Internal Link</h6>
            <ul class="link-list-footer">
              <li><a href="<?php echo base_url() ?>" class="active">Beranda</a></li>
              <li><a href="<?php echo base_url().'profil-desa' ?>">Profil Desa</a></li>
              <li><a href="<?php echo base_url().'bumdes' ?>">BUMDesa Kraton</a></li>
              <li><a href="<?php echo base_url().'produk-umkm' ?>">Produk UMKM</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <h6 class="color-purple font-weight-bold">Eksternal Link</h6>
            <ul class="link-list-footer">
              <li><a href=""><span class="fa fa-external-link"></span> Website Resmi Kabupaten Lumajang</a></li>
              <li><a href=""><span class="fa fa-external-link"></span> Website Resmi Desa Kraton</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <h6 class="color-purple font-weight-bold">Kontak Kami</h6>
            <ul class="link-list-footer">
              <li><a href=""><span class="fa fa-facebook-square"></span> Akun Facebook Desa Kraton</a></li>
              <li><a href=""><span class="fa fa-youtube"></span> Akun YouTube Desa Kraton</a></li>
              <li><a href=""><span class="fa fa-envelope"></span> Email: desa.kraton@gmail.com</a></li>
            </ul>
          </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
              <span class="color-purple bg-orange">
              Dibuat Oleh Mahasiwa PKL TKWU Politeknik Negeri Jember Tahun 2020</span>
            </div>
            <div class="col-md-6 text-right">
              <a href="" class="color-grey">Kembali ke atas <span class="fa fa-chevron-up"></span></a>
            </div>
        </div>
        <div class="text-center mt-5">
          <div class="color-grey">&copy; Copyright Sistem Informasi UMKM dan BUMDesa Kraton Yosowilangun</div>
        </div>
      </div>
    </section>

    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="<?php echo base_url()."assets/frontend/js/custom.js" ?>"></script>
  </body>
</html>
