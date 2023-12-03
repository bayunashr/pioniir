<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ContentModel extends Model
{
    protected $table            = 'Content';
    protected $primaryKey       = 'contentId';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['contentId', 'creatorId', 'contentTitle', 'contentValue', 'contentStatus', 'contentPrice', 'contentPreview', 'contentDownload', 'contentLike'];
    
    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function selectAll()
    {
        return $this->select('Content.*, Creator.creatorAlias AS creator_name')
            ->join('Creator', 'Content.creatorId = Creator.creatorId')
            ->orderBy('createdAt', 'desc')
            ->findAll();
    }
}