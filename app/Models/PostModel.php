<?php

namespace App\Models;

use App\Database\Migrations\Creator;
use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table            = 'Post';
    protected $primaryKey       = 'postId';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['postId', 'creatorId', 'postTitle', 'postValue', 'postStatus', 'postLike'];

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
}