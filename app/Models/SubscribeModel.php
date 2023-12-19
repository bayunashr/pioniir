<?php

namespace App\Models;

use CodeIgniter\Model;

class SubscribeModel extends Model
{
    protected $table = 'Subscribe';
    protected $primaryKey = 'subId';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['userId', 'creatorId', 'subscribeStatus'];

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function selectAll()
    {
        return $this->select('Subscribe.*, User.userName AS user_name, Creator.creatorAlias AS creator_name')
            ->where('Subscribe.subscribeStatus', 'success')
            ->join('User', 'User.userId = Subscribe.userId')
            ->join('Creator', 'Creator.creatorId = Subscribe.creatorId')
            ->orderBy('subTimestamp', 'desc')
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

    public function selectActiveByIdCreator($id)
    {
        return $this->select('Subscribe.subId, User.userFullName AS name_user, User.userEmail AS email_user')
            ->where('Subscribe.creatorId', $id)
            ->where("DATEDIFF(NOW(), Subscribe.subTimestamp) <= 30")
            ->where('Subscribe.subscribeStatus', 'success')
            ->join('User', 'User.userId = Subscribe.userId')
            ->groupBy(['Subscribe.userId', 'Subscribe.creatorId'])
            ->orderBy('Subscribe.subTimestamp', 'DESC');
    }

    public function selectAllByIdUser($userId)
    {
        return $this->select('Subscribe.subTimestamp, Creator.creatorAlias, User.userAvatar')
            ->where('Subscribe.userId', $userId)
            ->where('Subscribe.subscribeStatus', 'success')
            ->where("DATEDIFF(NOW(), Subscribe.subTimestamp) <= 30")
            ->join('Creator', 'Creator.creatorId = Subscribe.creatorId')
            ->join('User', 'User.userId = Creator.userId')
            ->orderBy('subTimestamp', 'desc');
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

    public function CountSubscribeByAlias($alias)
    {
        return $this->select('Subscribe.*, Creator.creatorAlias AS alias')
            ->where('Creator.creatorAlias', $alias)
            ->where("DATEDIFF(NOW(), Subscribe.subTimestamp) <= 30")
            ->where('Subscribe.subscribeStatus', 'success')
            ->join('Creator', 'Creator.creatorId = Subscribe.creatorId')
            ->countAllResults();
    }

    public function getStatusSubscribe($alias, $userId)
    {
        return $this->select('Subscribe.*, Creator.creatorAlias AS alias')
            ->where('Creator.creatorAlias', $alias)
            ->where('Subscribe.userId', $userId)
            ->where('Subscribe.subscribeStatus', 'success')
            ->where("DATEDIFF(NOW(), Subscribe.subTimestamp) <= 30")
            ->join('Creator', 'Creator.creatorId = Subscribe.creatorId')
            ->findAll();
    }

    public function getAllSubscriber($id, $month, $year)
    {
        return $this->select('subId, userId, creatorId, MAX(subTimestamp) as latestTimestamp, subscribeStatus')
            ->where('MONTH(subTimestamp)', $month)
            ->where('YEAR(subTimestamp)', $year)
            ->where('creatorId', $id)
            ->where('Subscribe.subscribeStatus', 'success')
            ->groupBy(['userId', 'creatorId'])
            ->orderBy('latestTimestamp', 'ASC');
    }

    public function getAllSubscriberAllTime($id)
    {
        return $this->select('Subscribe.userId, COUNT(subId) as timeSubscribed, User.userName')
            ->join('User', 'User.userId = Subscribe.userId')
            ->where('creatorId', $id)
            ->where('Subscribe.subscribeStatus', 'success')
            ->groupBy('userId')
            ->orderBy('timeSubscribed', 'DESC')
            ->findAll();
    }

    public function getAllSubscriberWithMonth($id, $month, $year)
    {
        return $this->select('Subscribe.userId, COUNT(subId) as timeSubscribed, User.userName, Creator.creatorSubPrice')
            ->join('User', 'User.userId = Subscribe.userId')
            ->join('Creator', 'Creator.creatorId = Subscribe.creatorId')
            ->where('MONTH(subTimestamp)', $month)
            ->where('YEAR(subTimestamp)', $year)
            ->where('Subscribe.creatorId', $id)
            ->where('Subscribe.subscribeStatus', 'success')
            ->groupBy('userId')
            ->orderBy('timeSubscribed', 'DESC')
            ->findAll();
    }
}