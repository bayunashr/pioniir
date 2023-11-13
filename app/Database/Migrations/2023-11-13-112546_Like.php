<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Like extends Migration
{
    public function up()
    {
        // Create Tabel Like
        $this->forge->addField([
            'likeId' => [
                'type' => 'CHAR',
                'constraint' => 36,
            ],
            'userId' => [
                'type' => 'CHAR',
                'constraint' => 36,
            ],
            'contentId' => [
                'type' => 'CHAR',
                'constraint' => 36,
                'null' => true,
            ],
            'postId' => [
                'type' => 'CHAR',
                'constraint' => 36,
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('likeId');
        $this->forge->addForeignKey('userId', 'User', 'userId', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('contentId', 'Content', 'contentId', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('postId', 'Post', 'postId', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Like');
    }

    public function down()
    {
        // Drop Tabel Like
        $this->forge->dropTable('Like');
    }
}
