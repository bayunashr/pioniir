<?php

namespace App\Models;

use App\Database\Migrations\Creator;
use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'Post';
    protected $primaryKey = 'postId';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['postId', 'creatorId', 'postTitle', 'postValue', 'postStatus', 'postLike'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    public function selectAll()
    {
        return $this->select('Post.*, Creator.creatorAlias AS creator_name, Creator.userId AS user_id')
            ->join('Creator', 'Creator.creatorId = Post.creatorId')
            ->orderBy('createdAt', 'desc')
            ->findAll();
    }

    public function selectOneByPostId($id)
    {
        return $this->select('Post.*, User.userId AS user_id')
            ->join('Creator', 'Creator.creatorId = Post.creatorId')
            ->join('User', 'User.userId = Creator.userId')
            ->where('Post.postId', $id)
            ->first();
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

    public function getPostByAlias($alias)
    {
        return $this->select('Post.*, Creator.creatorAlias AS alias')
            ->where('Creator.creatorAlias', $alias)
            ->where('Post.postStatus', 'publish')
            ->join('Creator', 'Creator.creatorId = Post.creatorId')
            ->findAll();
    }

    public function getTopLoved($id)
    {
        return $this->select('Post.postTitle, Post.postLike, Post.postStatus')
            ->where('Post.creatorId', $id)
            ->orderBy('Post.postLike', 'DESC')
            ->findAll(10);
    }

    public function getLoved($id)
    {
        return $this->select('Post.postTitle, Post.postLike, Post.postStatus')
            ->where('Post.creatorId', $id)
            ->orderBy('Post.postLike', 'DESC')
            ->findAll();
    }

    public function getPostLikeByCreatorTime($id, $month, $year)
    {
        return $this->select('Post.postLike')
            ->where('MONTH(createdAt)', $month)
            ->where('YEAR(createdAt)', $year)
            ->where('creatorId', $id)
            ->findAll();
    }
}