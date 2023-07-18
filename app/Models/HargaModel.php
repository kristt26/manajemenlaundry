<?php

namespace App\Models;

use CodeIgniter\Model;

class HargaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'harga';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kategori_id', 'layanan_id', 'satuan', 'harga'];
}
