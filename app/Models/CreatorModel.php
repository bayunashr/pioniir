<?php

namespace App\Models;

use CodeIgniter\Model;

class CreatorModel extends Model
{
    protected $table            = 'Creator';
    protected $primaryKey       = 'creatorId';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function selectAll()
    {
        return $this->select('Creator.*, User.userName AS user_name')
            ->join('User', 'Creator.userId = User.userId')
            ->orderBy('createdAt', 'desc')
            ->findAll();
    }
}