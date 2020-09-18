<?php
class Home extends CI_Controller {
    public function index()
    {
        $data['kategori'] = $this->common->getData('*','kategori','','','','');
        $data['umkm'] = $this->common->getData('id_umkm,u.images,k.nama_kategori,nama_umkm,deskripsi,nama_pemilik',['umkm u',0,4],['kategori k','u.id_kategori = k.id_kategori'],'','','');
        $this->template->front('frontend/pages/home', $data);
    }
    public function profil()
    {
        $this->template->front('frontend/pages/profil');
    }
    public function bumdes()
    {
        $this->template->front('frontend/pages/bumdes');
    }
    public function umkm()
    {
        $data['kategori'] = $this->common->getData('*','kategori','','','','');
        $data['umkm'] = $this->common->getData('id_umkm,u.images,k.nama_kategori,nama_umkm,deskripsi,nama_pemilik','umkm u',['kategori k','u.id_kategori = k.id_kategori'],'','','');
        $this->template->front('frontend/pages/umkm', $data);
    }
    public function detail_umkm($id)
    {
        $data['umkm'] = $this->common->getData('u.*,k.nama_kategori','umkm u',['kategori k','u.id_kategori = k.id_kategori'],['id_umkm' => $id],'','')[0];
        $this->template->front('frontend/pages/detail', $data);
    }

}