<?php

namespace App\Models;

use CodeIgniter\Model;

class ContentModel extends Model
{
    protected $table = 'Content';
    protected $primaryKey = 'contentId';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['contentId', 'creatorId', 'contentTitle', 'contentValue', 'contentStatus', 'contentPrice', 'contentPreview', 'contentDownload', 'contentLike'];

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function selectAll()
    {
        return $this->select('Content.*, Creator.creatorAlias AS creator_name')
            ->join('Creator', 'Content.creatorId = Creator.creatorId')
            ->orderBy('createdAt', 'desc')
            ->findAll();
    }

    public function selectOneByContentId($id)
    {
        return $this->select('Content.*, User.userId AS user_id')
            ->join('Creator', 'Creator.creatorId = Content.creatorId')
            ->join('User', 'User.userId = Creator.userId')
            ->where('Content.contentId', $id)
            ->first();
    }

    public function getContentByAlias($alias)
    {
        return $this->select('Content.*')
            ->where('Creator.creatorAlias', $alias)
            ->where('Content.contentStatus', 'publish')
            ->join('Creator', 'Creator.creatorId = Content.creatorId')
            ->orderBy('Content.contentPrice', 'ASC')
            ->findAll();
    }

    public function countAllPerMonth($id, $month, $year)
    {
        return $this->where('MONTH(createdAt)', $month)
            ->where('YEAR(createdAt)', $year)
            ->where('creatorId', $id)
            ->countAllResults();
    }

    public function countAllPerDay($id, $day, $month, $year)
    {
        return $this->where('DAY(createdAt)', $day)
            ->where('MONTH(createdAt)', $month)
            ->where('YEAR(createdAt)', $year)
            ->where('creatorId', $id)
            ->countAllResults();
    }

    public function getTopLoved($id)
    {
        return $this->select('Content.contentTitle, Content.contentLike, Content.contentStatus')
            ->where('Content.creatorId', $id)
            ->orderBy('Content.contentLike', 'DESC')
            ->findAll(10);
    }

    public function getLoved($id)
    {
        return $this->select('Content.contentTitle, Content.contentLike, Content.contentStatus')
            ->where('Content.creatorId', $id)
            ->orderBy('Content.contentLike', 'DESC')
            ->findAll();
    }

    public function getContentByCreatorId($id)
    {
        return $this->select('Content.contentId, Content.contentTitle, Content.contentStatus')
            ->where('Creator.creatorId', $id)
            ->join('Creator', 'Creator.creatorId = Content.creatorId')
            ->findAll();
    }

    public function countContentByCreatorId($id)
    {
        return $this->where('Content.creatorId', $id)
            ->countAllResults();
    }

    public function getContentLikeByCreatorTime($id, $month, $year)
    {
        return $this->select('Content.contentLike')
            ->where('MONTH(createdAt)', $month)
            ->where('YEAR(createdAt)', $year)
            ->where('creatorId', $id)
            ->findAll();
    }
}
