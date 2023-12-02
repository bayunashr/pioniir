<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class MilestoneModel extends Model
{
    protected $table            = 'Milestone';
    protected $primaryKey       = 'milestoneId';
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
        return $this->select('Milestone.*, Creator.creatorAlias AS creator_name')
            ->join('Creator', 'Creator.creatorId = Milestone.creatorId')
            ->orderBy('createdAt', 'desc')
            ->findAll();
    }
}