<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Subscribe extends Migration
{
    public function up()
    {
        // Create Tabel Subscribe
        $this->forge->addField([
            'subId' => [
                'type' => 'CHAR',
                'constraint' => 36,
            ],
            'userId' => [
                'type' => 'CHAR',
                'constraint' => 36,
            ],
            'creatorId' => [
                'type' => 'CHAR',
                'constraint' => 36,
            ],
            'subscribeStatus' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'success'],
                'default' => 'pending',
            ],
            'subTimestamp' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
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
        $this->forge->addPrimaryKey('subId');
        $this->forge->addForeignKey('userId', 'User', 'userId', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('creatorId', 'Creator', 'creatorId', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Subscribe');

        // Create Trigger Updated At
        $this->db->query("CREATE TRIGGER SubscribeUpdatedAt BEFORE UPDATE ON Subscribe FOR EACH ROW SET NEW.updatedAt = CURRENT_TIMESTAMP");
    }

    public function down()
    {
        // Drop Tabel Subscribe
        $this->forge->dropTable('Subscribe');
    }
}