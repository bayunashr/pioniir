<?php

namespace App\Models;

use CodeIgniter\Model;

class CreatorModel extends Model
{
    protected $table            = 'Creator';
    protected $primaryKey       = 'creatorId';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['userId', 'creatorAlias', 'creatorTag', 'creatorDescription', 'creatorSubPrice', 'creatorBalance', 'creatorBanner'];

    // Validation
    protected $validationRules = [
        'creatorAlias'     => [
            'rules' => 'required|is_unique[Creator.creatorAlias]',
            'errors' => [
                'required' => 'Alias wajib diisi.',
                'is_unique' => 'Alias sudah digunakan.'
            ]
        ]
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    public function selectAll()
    {
        return $this->select('Creator.*, User.userName AS user_name')
            ->join('User', 'Creator.userId = User.userId')
            ->orderBy('createdAt', 'desc')
            ->findAll();
    }
}