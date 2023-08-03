<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\HargaModel;
use App\Models\KategoriModel;
use App\Models\LayananModel;

class Harga extends BaseController
{
    protected $harga;
    protected $layanan;
    protected $kategori;
    public function __construct() {
        $this->harga = new HargaModel();
        $this->layanan = new LayananModel();
        $this->kategori = new KategoriModel();
    }
    public function index()
    {
        return view('admin/harga/index', ['title'=>'Harga']);
    }

    public function read() : object {
        $data['harga'] = $this->harga->select("harga.*, layanan.layanan, layanan.waktu, kategori.kategori")
        ->join('layanan', "layanan.id=harga.layanan_id", "LEFT")
        ->join('kategori', "kategori.id=harga.kategori_id", "LEFT")
        ->findAll();
        $data['layanan'] =  $this->layanan->findAll();
        $data['kategori'] =  $this->kategori->findAll();
        return $this->respond($data);
    }
    public function create() : object {
        $param = $this->request->getJSON();
        $this->harga->insert($param);
        $param->id = $this->harga->getInsertID();
        return $this->respondCreated($param);
    }
    public function update() : object {
        $param = $this->request->getJSON();
        $this->harga->update($param->id, $param);
        return $this->respondUpdated(true);
    }
    public function delete($id) : object {
        $this->harga->delete($id);
        return $this->respondDeleted(true);
    }
}
