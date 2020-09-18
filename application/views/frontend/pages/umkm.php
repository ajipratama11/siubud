    <section id="heroUmkm">
        <img src="assets/img/common/layer-umkm.png" alt="" class='img-layer'>
        <div class="container custom section-space">
            <div class="row align-items-center mt-5">
                <div class="col-md-5">
                    <h3 class="color-purple font-weight-bold">Website UMKM Desa Kraton</h3>
                    <p class="color-grey font-weight-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur consequuntur dignissimos alias molestiae laborum deleniti </p>
                    <div class="input-group mb-3">
                        <input type="text" class="py-4 form-control color-grey font-weight-light" placeholder="Cari UMKM Disini" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary color-white" type="button"><span class="fa fa-search"></span> Cari UMKM</button>
                        </div>
                    </div>                    
                    <div class="link-category">
                    <a href="" class="btn-border mr-1 active">Semua Bidang Usaha</a>
                        <?php 
                        foreach ($kategori as $key => $value) {
                            echo '<a href="" class="btn-border mx-1">'.$value['nama_kategori'].'</a>';
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-7 text-center">
                    <div class="row justify-content-center">
                        <div class="col-md-9 text-center">
                            <div class="video-thumbnail btn-shadow">
                                <img src="https://asset.satelitnews.id/wp-content/uploads/2020/07/22225355/BATIK-TANGERANG-3.jpg" alt="" srcset="" class="img-fluid img-bumdes btn-shadow">
                                <div class="layer" style='background :rgba(10, 8, 58, 0.4) !important'></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="umkm" class="section-space">
      <div class="container custom">
        <div class="row">
        <?php 
            foreach($umkm as $data){
                $img = explode('|',$data['images']);
        ?>
          <div class="col-md-3">
            <div class="card card-umkm img-scale">
              <div class="top">
                <div class="img">
                  <img
                    class="card-img-top"
                    src="<?php echo base_url()."assets/img/umkm/".$img[0] ?>"
                    alt="Card image"
                  />
                  <div class="layer"></div>
                  <div class="sticky-title"><?php echo $data['nama_kategori'] ?></div>
                </div>
              </div>
              <div class="card-body">
                <div class="title"><?php echo $data['nama_umkm'] ?></div>
                <p>
                    <?php echo substr($data['deskripsi'],0,100) ?>
                </p>
                <p class="font-weigh-bold">
                  <span class="fa fa-user mr-1"></span> <?php echo $data['nama_pemilik'] ?>
                </p>
                <?php 
                    $url = strtolower(str_replace(' ','-', $data['nama_umkm']));
                ?>
                <a href="<?php echo base_url()."umkm/".$data['id_umkm'].'/'.$url ?>" class="color-orange"><u>Selengkapnya ></u></a>
              </div>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
    </section>
