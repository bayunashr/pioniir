<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

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
            'postTitle' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'postValue' => [
                'type' => 'TEXT',
            ],
            'postStatus' => [
                'type' => 'ENUM',
                'constraint' => ['draft', 'publish', 'archive'],
                'default' => 'draft',
            ],
            'postLike' => [
                'type' => 'INT',
                'constraint' => 16,
                'default' => 0,
            ],
            'createdAt' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updatedAt' => [
                'type'    => 'TIMESTAMP',
                'null'    => true,
            ],
        ]);
        $this->forge->addPrimaryKey('postId');
        $this->forge->addForeignKey('creatorId', 'Creator', 'creatorId', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Post');

        // Create Trigger Updated At
        $this->db->query("CREATE TRIGGER PostUpdatedAt BEFORE UPDATE ON Post FOR EACH ROW SET NEW.updatedAt = CURRENT_TIMESTAMP");
    }

    public function down()
    {
        // Drop Tabel Post
        $this->forge->dropTable('Post');
    }
}
