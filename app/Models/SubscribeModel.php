<?php

namespace App\Models;

use CodeIgniter\Model;

class SubscribeModel extends Model
{
    protected $table            = 'Subscribe';
    protected $primaryKey       = 'subId';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['userId', 'creatorId', 'subscribeStatus'];

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function selectAll()
    {
        return $this->select('Subscribe.*, User.userName AS user_name, Creator.creatorAlias AS creator_name')
            ->join('User', 'User.userId = Subscribe.userId')
            ->join('Creator', 'Creator.creatorId = Subscribe.creatorId')
            ->orderBy('createdAt', 'desc')
            ->findAll();
    }

    public function selectAllById($creatorId)
    {
        return $this->select('Subscribe.*, User.userFullName AS name_user, User.userEmail AS email_user')
            ->where('Subscribe.creatorId', $creatorId)
            ->where('Subscribe.subscribeStatus', 'success')
            ->join('User', 'User.userId = Subscribe.userId')
            ->orderBy('subTimestamp', 'desc')
            ->findAll();
    }

    public function CountAllByMonthAndId($id, $month, $year)
    {
        return $this->where('MONTH(createdAt)', $month)
            ->where('YEAR(createdAt)', $year)
            ->where('creatorId', $id)
            ->countAllResults();
    }

    public function CountAllByDayAndId($id, $day, $month, $year)
    {
        return $this->where('DAY(createdAt)', $day)
            ->where('MONTH(createdAt)', $month)
            ->where('YEAR(createdAt)', $year)
            ->where('creatorId', $id)
            ->countAllResults();
    }
}
