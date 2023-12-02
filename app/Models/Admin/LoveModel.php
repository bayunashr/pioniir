<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class LoveModel extends Model
{
    protected $table            = 'Love';
    protected $primaryKey       = 'loveId';
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
        return $this->select('Love.*, User.userName AS user_name, Content.contentTitle AS content_title, Post.postTitle AS post_title')
            ->join('User', 'User.userId = Love.userId')
            ->join('Content', 'Content.contentId = Love.contentId', 'left')
            ->join('Post', 'Post.postId = Love.postId', 'left')
            ->orderBy('createdAt', 'desc')
            ->findAll();
    }
}