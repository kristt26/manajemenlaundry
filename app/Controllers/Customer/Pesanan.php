<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;
use App\Models\PesananModel;

class Pesanan extends BaseController
{
    protected $pesanan;
    public function __construct()
    {
        $this->pesanan = new PesananModel();
    }
    public function index()
    {
        return view('customer/pesanan/index');
    }

    public function read(): object
    {
        $data = $this->pesanan
            ->join('customer', 'customer.id=pesanan.customer_id', 'left')
            ->join('layanan', 'layanan.id=pesanan.layanan_id', 'left')
            ->where('user_id', session()->get('uid'))->findAll();
        return $this->respond($data);
    }

    public function add() {
        $userkey = '024aa52aa4c3';
        $passkey = 'c581a02ad7b1c39466fa5b7d';
        $telepon = '082199901655';
        $message = 'Hi John Doe, have a nice day.';
        $url = 'https://console.zenziva.net/wareguler/api/sendWA/';
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
            'userkey' => $userkey,
            'passkey' => $passkey,
            'to' => $telepon,
            'message' => $message
        ));
        $results = json_decode(curl_exec($curlHandle), true);
        curl_close($curlHandle);
        return $this->respond($results);
    }
    public function create()
    {
        
    }
    public function update(): object
    {
        $param = $this->request->getJSON();
        $this->pesanan->update($param->id, $param);
        return $this->respondUpdated(true);
    }
    public function delete($id): object
    {
        $this->pesanan->delete($id);
        return $this->respondDeleted(true);
    }
}
