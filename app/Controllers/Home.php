<?php

namespace App\Controllers;

use App\Models\PesananModel;

class Home extends BaseController
{
    public function index()
    {
        $pesanan = new PesananModel();
        $pesan = $pesanan->select("pesanan.*, transaksi.total")->join('transaksi', 'transaksi.pesanan_id=pesanan.id', 'left')->findAll();
        $proses = 0;
        $selesai = 0;
        $total = 0;
        foreach ($pesan as $key => $value) {
            if ($value->status == 'Selesai')
                $selesai += 1;
            else
                $proses += 1;
            $total += $value->total;
        }
        $data['proses'] = $proses;
        $data['selesai'] = $selesai;
        $data['total'] = $total;
        $data['title'] = 'Home';
        return view('home', $data);
    }
}
