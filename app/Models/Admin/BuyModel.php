<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class BuyModel extends Model
{
    protected $table            = 'Buy';
    protected $primaryKey       = 'buyId';
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
        return $this->select('Buy.*, User.userName AS user_name, Content.contentTitle AS content_title')
            ->join('User', 'User.userId = Buy.userId')
            ->join('Content', 'Content.contentId = Buy.contentId')
            ->orderBy('createdAt', 'desc')
            ->findAll();
    }
}