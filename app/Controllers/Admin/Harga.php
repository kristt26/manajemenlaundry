<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\HargaModel;

class Harga extends BaseController
{
    protected $harga;
    public function __construct() {
        $this->harga = new HargaModel();
    }
    public function index()
    {
        return view('admin/kategori/index');
    }

    public function read() : object {
        $data = $this->harga->select("harga.*, layanan.layanan, layanan.waktu, kategori.kategori")
        ->join('layanan', "layanan.id=harga.layanan_id", "LEFT")
        ->join('kategori', "kategori.id=harga.kategori_id", "LEFT")
        ->findAll();
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
