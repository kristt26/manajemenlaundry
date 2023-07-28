<?php

namespace App\Controllers\Admin;

use CodeIgniter\Database\Exceptions\DatabaseException;
use App\Controllers\BaseController;
use App\Libraries\Decode;
use App\Models\CustomerModel;
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
    protected $customer;
    protected $conn;
    protected $lib;
    public function __construct()
    {
        $this->harga = new HargaModel();
        $this->layanan = new LayananModel();
        $this->kategori = new KategoriModel();
        $this->pesanan = new PesananModel();
        $this->trx = new TransaksiModel();
        $this->customer = new CustomerModel();
        $this->detail = new DetailModel();
        $this->conn = \Config\Database::connect();
        $this->lib = new Decode();
    }

    public function index()
    {
        return view('admin/transaksi/index');
    }

    public function add()
    {
        return view('admin/transaksi/add');
    }

    public function read(): object
    {
        $data = $this->pesanan->select('pesanan.*, layanan.layanan')->join('layanan', 'layanan.id=pesanan.layanan_id')->findAll();
        foreach ($data as $key => $value) {
            $value->transaksi = $this->trx->where('pesanan_id', $value->id)->first();
            $value->detail = $this->detail->where('pesanan_id', $value->id)->findAll();
        }
        return $this->respond($data);
    }

    public function readAdd(): object
    {
        $data['harga'] = $this->harga->findAll();
        $data['layanan'] =  $this->layanan->findAll();
        $data['kategori'] =  $this->kategori->findAll();
        return $this->respond($data);
    }
    public function create(): object
    {
        $param = $this->request->getJSON();
        try {
            $this->conn->transException(true)->transStart();
            $this->customer->insert($param);
            $param->id = $this->customer->getInsertID();
            $param->layanan->customer_id = $param->id;
            $this->pesanan->insert($param->layanan);
            $param->layanan->id = $this->pesanan->getInsertID();
            foreach ($param->detail as $key => $value) {
                $value->pesanan_id = $param->layanan->id;
                $this->detail->insert($value);
            }
            $param->trx->pesanan_id = $param->layanan->id;
            $this->trx->insert($param->trx);
            $kode = $param->layanan->kode;
            $total = $param->trx->total;
            $bayar = $param->trx->bayar;
            $sisa = $param->trx->sisa;
            $pesan ="Informasi Laundry \nkode pesan: $kode \nTagihan: $total \nBayar: $bayar \nSisa: $sisa \n";
            $this->conn->transComplete();
            $this->lib->sendWA($param->hp, $pesan);
            $this->lib->sendSMS($param->hp, $pesan);
            return $this->respondCreated(true);
        } catch (DatabaseException $th) {
            return $this->fail($th->getMessage());
        }
        $this->harga->insert($param);
        $param->id = $this->harga->getInsertID();
        return $this->respondCreated($param);
    }
    public function update(): object
    {
        $param = $this->request->getJSON();
        $this->harga->update($param->id, $param);
        return $this->respondUpdated(true);
    }
    public function delete($id): object
    {
        $this->harga->delete($id);
        return $this->respondDeleted(true);
    }
}
