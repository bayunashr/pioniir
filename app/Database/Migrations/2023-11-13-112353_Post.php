<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Post extends Migration
{
    public function up()
    {
        // Create Tabel Post
        $this->forge->addField([
            'postId' => [
                'type' => 'CHAR',
                'constraint' => 36,
            ],
            'creatorId' => [
                'type' => 'CHAR',
                'constraint' => 36,
            ],
            'postValue' => [
                'type' => 'TEXT',
            ],
            'postStatus' => [
                'type' => 'INT',
                'constraint' => 4,
                'deafult' => 0,
            ],
        ]);
        $this->forge->addPrimaryKey('postId');
        $this->forge->addForeignKey('creatorId', 'Creator', 'creatorId', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Post');
    }

    public function down()
    {
        // Drop Tabel Post
        $this->forge->dropTable('Post');
    }
}
