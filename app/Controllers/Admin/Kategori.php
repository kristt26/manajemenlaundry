<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    protected $karyawan;
    public function __construct() {
        $this->karyawan = new KategoriModel();
    }
    public function index()
    {
        return view('admin/kategori/index', ['title'=>'Kategori']);
    }

    public function read() : object {
        $data = $this->karyawan->findAll();
        return $this->respond($data);
    }
    public function create() : object {
        $param = $this->request->getJSON();
        $this->karyawan->insert($param);
        $param->id = $this->karyawan->getInsertID();
        return $this->respondCreated($param);
    }
    public function update() : object {
        $param = $this->request->getJSON();
        $this->karyawan->update($param->id, $param);
        return $this->respondUpdated(true);
    }
    public function delete($id) : object {
        $this->karyawan->delete($id);
        return $this->respondDeleted(true);
    }
}
