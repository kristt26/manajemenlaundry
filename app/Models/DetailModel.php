<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'detail';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['pesanan_id', 'harga_id', 'jumlah'];
}
