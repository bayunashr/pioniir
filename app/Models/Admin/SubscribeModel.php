<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class SubscribeModel extends Model
{
    protected $table            = 'Subscribe';
    protected $primaryKey       = 'subscribeId';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function selectAll()
    {
        return $this->select('Subscribe.*, User.userName AS user_name, Creator.creatorAlias AS creator_name')
            ->join('User', 'User.userId = Subscribe.userId')
            ->join('Creator', 'Creator.creatorId = Subscribe.creatorId')
            ->orderBy('createdAt', 'desc')
            ->findAll();
    }
}