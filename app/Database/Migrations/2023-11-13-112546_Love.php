<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Love extends Migration
{
    public function up()
    {
        // Create Tabel Love
        $this->forge->addField([
            'loveId' => [
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
            'createdAt' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updatedAt' => [
                'type'    => 'TIMESTAMP',
                'null'    => true,
            ],
        ]);
        $this->forge->addPrimaryKey('loveId');
        $this->forge->addForeignKey('userId', 'User', 'userId', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('contentId', 'Content', 'contentId', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('postId', 'Post', 'postId', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Love');

        // Create Trigger Updated At
        $this->db->query("CREATE TRIGGER LoveUpdatedAt BEFORE UPDATE ON Love FOR EACH ROW SET NEW.updatedAt = CURRENT_TIMESTAMP");
    }

    public function down()
    {
        // Drop Tabel Love
        $this->forge->dropTable('Love');
    }
}
