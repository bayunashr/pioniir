<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'User';
    protected $primaryKey       = 'userId';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['userName', 'userFullName', 'userEmail', 'userPassword', 'userStatus', 'userAvatar'];

    // Validation
    protected $validationRules = [
        'userName'      => [
            'rules' => 'required|is_unique[User.userName]',
            'errors' => [
                'required' => 'Username wajib diisi.',
                'is_unique' => 'Username sudah digunakan.'
            ]
        ],
        'userFullName'  => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama lengkap wajib diisi.'
            ]
        ],
        'userEmail'     => [
            'rules' => 'required|valid_email|is_unique[User.userEmail]',
            'errors' => [
                'required' => 'Email wajib diisi.',
                'valid_email' => 'Email harus berformat valid.',
                'is_unique' => 'Email sudah digunakan oleh pengguna lain.'
            ]
        ]
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function selectAll()
    {
        return $this->select('*')
            ->orderBy('createdAt', 'desc')
            ->findAll();
    }
}