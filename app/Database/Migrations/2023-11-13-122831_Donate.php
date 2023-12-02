<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Donate extends Migration
{
    public function up()
    {
        // Create Tabel Donate
        $this->forge->addField([
            'donateId' => [
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
            'donateName' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'donateAmount' => [
                'type' => 'INT',
                'constraint' => 16,
            ],
            'donateDescription' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'donateDescription' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'donateStatus' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'success'],
                'default' => 'pending',
            ],
            'donateTimestamp' => [
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
        $this->forge->addPrimaryKey('donateId');
        $this->forge->addForeignKey('userId', 'User', 'userId', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('creatorId', 'Creator', 'creatorId', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Donate');

        // Create Trigger Updated At
        $this->db->query("CREATE TRIGGER DonateUpdatedAt BEFORE UPDATE ON Donate FOR EACH ROW SET NEW.updatedAt = CURRENT_TIMESTAMP");
    }

    public function down()
    {
        // Drop Tabel Donate
        $this->forge->dropTable('Donate');
    }
}