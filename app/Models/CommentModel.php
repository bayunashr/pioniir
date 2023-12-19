<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table            = 'Comment';
    protected $primaryKey       = 'commentId';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['commentId', 'userId', 'contentId', 'postId', 'commentValue', 'commentStatus'];

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function selectAll()
    {
        return $this->select('Comment.*, User.userName AS user_name, Content.contentTitle AS content_title, Post.postTitle AS post_title')
            ->join('User', 'User.userId = Comment.userId')
            ->join('Content', 'Content.contentId = Comment.contentId', 'left')
            ->join('Post', 'Post.postId = Comment.postId', 'left')
            ->orderBy('createdAt', 'desc')
            ->findAll();
    }

    public function selectOneByCommentId($id)
    {
        return $this->select('Comment.*, User.userId AS user_id')
        ->join('User', 'User.userId = Comment.userId')
        ->where('Comment.commentId', $id)
        ->first();
    }

    public function selectAllByPostId($postId) {
        return $this->select('Comment.*, User.userFullName')
        ->where('Comment.postId', $postId)
        ->where('Comment.commentStatus', 'publish')
        ->join('Post', 'Post.postId = Comment.postId')
        ->join('User', 'User.userId = Comment.userId')
        ->orderBy('createdAt', 'desc')
        ->findAll();
    }

    public function selectAllByContentId($contentId) {
        return $this->select('Comment.*, User.userFullName')
        ->where('Comment.contentId', $contentId)
        ->where('Comment.commentStatus', 'publish')
        ->join('Content', 'Content.contentId = Comment.contentId')
        ->join('User', 'User.userId = Comment.userId')
        ->orderBy('createdAt', 'desc')
        ->findAll();
    }
}