<?php

namespace App\Models;

use CodeIgniter\Model;

class SocialModel extends Model
{
    protected $table            = 'Social';
    protected $primaryKey       = 'socialId';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['socialId','creatorId','socialMedia','socialLink'];

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function selectAllById($id)
    {
        return $this->select('Social.*')
            ->join('Creator', 'Social.creatorId = Creator.creatorId')
            ->orderBy('createdAt', 'desc')
            ->where('Social.creatorId',$id)
            ->findAll();
    }

    public function getSocialByAlias($alias) {
        return $this->select('Social.socialMedia, Social.socialLink')
            ->where('Creator.creatorAlias', $alias)
            ->join('Creator', 'Creator.creatorId = Social.creatorId')
            ->findAll();
    }
}