<?php

namespace App\Models;

use CodeIgniter\Model;

class LayananModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'layanan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['layanan', 'waktu'];
}
