<?php 
    $img = explode('|',$umkm['images']);
?>
    <div class="img-container">
        <div class="click-close"></div>
        <a href="" class="close">X</a>
        <div class="img">
          <img src="" alt="" />
          <div class="caption"></div>
        </div>
      </div>
  
    <section id="detail">
      <div class="sampul">
        <div
          class="img-sampul"
          style="background:url('<?php echo base_url()."assets/img/umkm/".$umkm['sampul'] ?>')"
        ></div>
        <div class="container custom">
          <div class="row align-items-end">
            <div class="col-md-2 pr-0">
              <img src="<?php echo base_url()."assets/img/umkm/".$umkm['profil'] ?>" alt="" class='img-profil'  />
            </div>
            <div class="col-md-10">
                <h5 class="font-weight-bold color-purple"><?php echo $umkm['nama_umkm'] ?></h5>
                <h6 class="color-orange"> <u><span class="color-grey"> Kategori UMKM :</span> <?php echo $umkm['nama_kategori'] ?></u></h6>
            </div>
          </div>
        </div>
        </div>
      </div>
      <div class="container custom section-space mt-5">
        <div class="row">
          <div class="col-auto">
              <div class="subtitle">Usaha Dikelola Oleh :</div>
              <h3 class="title"><?php echo $umkm['nama_pemilik'] ?></h3>
          </div>
        </div>
          <div class="row mt-3">
            <?php 
                foreach ($img as $key => $value) {
            ?>
            <div class="col-md-3">
              <div class="foto img-scale" data-id="<?php echo $key ?>">
                <div class="img">
                  <img
                    src="<?php echo base_url()."assets/img/umkm/".$value ?>"
                    alt=""
                    class="img-fluid"
                  />
                  <div class="layer"></div>
                  <div class="sticky-title">Foto 1</div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
          <div class="row mt-5">
              <div class="col-auto">
                  <div class="subtitle">Deskripsi</div>
                  <h3 class="title">Deskripsi UMKM</h3>
              </div>
          </div>
          <div class="row">
            <div class="col-md-12">
                <div class="alert-orange mt-2">
                    <?php echo $umkm['deskripsi'] ?>
                </div>
            </div>
          </div>
      </div>
    </section>
    <div class="bg-light py-5 relative-hidden">
        <div class="circle circle-top"></div>
        <div class="circle circle-bottom"></div>
      <div class="container custom">
        <div class="row">
          <div class="col-12 text-center">
              <div class="mb-4">
                <div class="subtitle">Tetap Terhubung</div>
                <h3 class="title">Hubungi Usaha Perikanan</h3>
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <a class="btn-border" href=''><span class="fa fa-phone"></span> Telpon </a>
            <a class="btn-border" href='https://wa.me/<?php echo $umkm['no_hp'] ?>?text=Halo, <?php echo $umkm['nama_umkm'] ?>. Saya ingin bertanya...'><span class="fa fa-whatsapp"></span> Whatsapp </a>
            <a class="btn-border" href='<?php echo $umkm['instagram'] ?>'><span class="fa fa-instagram"></span> Instagram </a>
            <a class="btn-border" href='<?php echo $umkm['fb'] ?>'><span class="fa fa-facebook"></span> Facebook </a>
            <p class="mt-4"><span class="bg-orange px-3"> <span class="fa fa-map-marker"></span> Desa Kraton Yosowilangun Lumajang</span></p>
          </div>
        </div>
      </div>
    </div>
    <script>
document.querySelector('nav').classList.add('transparent')
</script>