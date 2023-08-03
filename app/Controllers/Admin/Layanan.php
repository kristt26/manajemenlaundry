<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LayananModel;

class Layanan extends BaseController
{
    protected $layanan;
    public function __construct() {
        $this->layanan = new LayananModel();
    }
    public function index()
    {
        return view('admin/layanan/index', ['title'=>'Layanan']);
    }

    public function read() : object {
        $data = $this->layanan->findAll();
        return $this->respond($data);
    }
    public function create() : object {
        $param = $this->request->getJSON();
        $this->layanan->insert($param);
        $param->id = $this->layanan->getInsertID();
        return $this->respondCreated($param);
    }
    public function update() : object {
        $param = $this->request->getJSON();
        $this->layanan->update($param->id, $param);
        return $this->respondUpdated(true);
    }
    public function delete($id) : object {
        $this->layanan->delete($id);
        return $this->respondDeleted(true);
    }
}
