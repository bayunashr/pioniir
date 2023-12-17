<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificationModel extends Model
{
    protected $table = 'Notification';
    protected $primaryKey = 'notificationId';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['notificationId', 'userId', 'postId', 'contentId', 'commentId', 'subId', 'buyId', 'milestoneId', 'donateId', 'notificationType', 'notificationMessage', 'isRead'];

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

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    public function selectOneById($id)
    {
        return $this->select('Notification.*, User.userName AS user_name')
            ->join('User', 'User.userId = Notification.userId')
            ->orderBy('createdAt', 'desc')
            ->where('Notification.userId', $id)
            ->first();
    }

    public function selectAllById($id)
    {
        return $this->select('Notification.*, User.userName AS user_name, Post.postTitle AS post_title, Content.contentTitle AS content_title, Comment.commentValue AS comment_value, Subscribe.userId AS subscriber_name, Donate.donateName AS donatur_name, Donate.donateAmount AS donate_amount, Buy.userId AS buyer_name, Buy.contentId AS content_buy_title, Milestone.milestoneName AS miles_name')
            ->join('User', 'User.userId = Notification.userId', 'left')
            ->join('Post', 'Post.postId = Notification.postId', 'left')
            ->join('Content', 'Content.contentId = Notification.contentId', 'left')
            ->join('Comment', 'Comment.commentId = Notification.commentId', 'left')
            ->join('Subscribe', 'Subscribe.subId = Notification.subId', 'left')
            ->join('Donate', 'Donate.donateId = Notification.donateId', 'left')
            ->join('Buy', 'Buy.buyId = Notification.buyId', 'left')
            ->join('Milestone', 'Milestone.milestoneId = Notification.milestoneId', 'left')
            ->orderBy('createdAt', 'desc')
            ->where('Notification.userId', $id)
            ->where('isRead', 'no')
            ->get()
            ->getResult();
    }
}