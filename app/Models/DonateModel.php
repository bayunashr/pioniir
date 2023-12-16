<?php

namespace App\Models;

use CodeIgniter\Model;

class DonateModel extends Model
{
    protected $table            = 'Donate';
    protected $primaryKey       = 'donateId';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['userId','creatorId','donateName','donateAmount','donateDescription', 'donateStatus'];

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function selectAll()
    {
        return $this->select('Donate.*, User.userName AS user_username, Creator.creatorAlias AS creator_name')
            ->join('User', 'User.userId = Donate.userId')
            ->join('Creator', 'Creator.creatorId = Donate.creatorId')
            ->orderBy('donateTimestamp', 'desc')
            ->findAll();
    }

    public function getDonateByAlias($alias)
    {
        return $this->select('Donate.donateName, Donate.donateAmount, Donate.donateTimestamp, User.userAvatar')
            ->where('Donate.donateStatus', 'success')
            ->where('Creator.creatorAlias', $alias)
            ->join('User', 'User.userId = Donate.userId', 'left ')
            ->join('Creator', 'Creator.creatorId = Donate.creatorId')
            ->orderBy('donateTimestamp', 'desc')
            ->findAll();
    }

    public function getDonateByIdUser($userId) {
        return $this->select('Donate.donateAmount, Donate.donateDescription, Donate.donateTimestamp, Creator.creatorAlias')
            ->where('Donate.userId', $userId)
            ->where('Donate.donateStatus', 'success')
            ->join('Creator', 'Creator.creatorId = Donate.creatorId')
            ->orderBy('donateTimestamp', 'desc');
    }
}