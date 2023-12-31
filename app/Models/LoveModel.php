<?php

namespace App\Models;

use CodeIgniter\Model;

class LoveModel extends Model
{
    protected $table            = 'Love';
    protected $primaryKey       = 'loveId';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['loveId', 'userId', 'contentId', 'postId'];

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function selectAll()
    {
        return $this->select('Love.*, User.userName AS user_name, Content.contentTitle AS content_title, Post.postTitle AS post_title')
            ->join('User', 'User.userId = Love.userId')
            ->join('Content', 'Content.contentId = Love.contentId', 'left')
            ->join('Post', 'Post.postId = Love.postId', 'left')
            ->orderBy('createdAt', 'desc')
            ->findAll();
    }

    public function selectDataByUserAndPost($userId, $postId) {
        return $this->select('Love.*')
        ->where('Love.postId', $postId)
        ->where('Love.userId', $userId)
        ->first();
    }

    public function selectDataByUserAndContent($userId, $contentId) {
        return $this->select('Love.*')
        ->where('Love.contentId', $contentId)
        ->where('Love.userId', $userId)
        ->first();
    }
}