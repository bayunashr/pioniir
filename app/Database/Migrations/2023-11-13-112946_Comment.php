<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Comment extends Migration
{
    public function up()
    {
        // Create Tabel Comment
        $this->forge->addField([
            'commentId' => [
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
            'commentValue' => [
                'type' => 'TEXT',
            ],
        ]);
        $this->forge->addPrimaryKey('commentId');
        $this->forge->addForeignKey('userId', 'User', 'userId', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('contentId', 'Content', 'contentId', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('postId', 'Post', 'postId', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Comment');
    }

    public function down()
    {
        // Drop Tabel Comment
        $this->forge->dropTable('Comment');
    }
}
