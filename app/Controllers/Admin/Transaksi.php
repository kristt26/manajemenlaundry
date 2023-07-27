<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DetailModel;
use App\Models\HargaModel;
use App\Models\KategoriModel;
use App\Models\LayananModel;
use App\Models\PesananModel;
use App\Models\TransaksiModel;

class Transaksi extends BaseController
{
    protected $harga;
    protected $layanan;
    protected $kategori;
    protected $pesanan;
    protected $trx;
    protected $detail;
    public function __construct() {
        $this->harga = new HargaModel();
        $this->layanan = new LayananModel();
        $this->kategori = new KategoriModel();
        $this->pesanan = new PesananModel();
        $this->trx = new TransaksiModel();
        $this->detail = new DetailModel();
    }
    public function index()
    {
        return view('admin/transaksi/index');
    }

    public function read() : object {
        $data = $this->pesanan->select('pesanan.*, layanan.layanan')->join('layanan', 'layanan.id=pesanan.layanan_id')->findAll();
        foreach ($data as $key => $value) {
            $value->transaksi = $this->trx->where('pesanan_id', $value->id)->first();
            $value->detail = $this->detail->where('pesanan_id', $value->id)->findAll();
        }
        return $this->respond($data);
    }

    public function readAdd() : object {
        $data['harga'] = $this->harga->findAll();
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
