<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Milestone extends Migration
{
    public function up()
    {
        // Create Tabel Milestone
        $this->forge->addField([
            'milestoneId' => [
                'type' => 'CHAR',
                'constraint' => 36,
            ],
            'creatorId' => [
                'type' => 'CHAR',
                'constraint' => 36,
            ],
            'milestoneName' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'milestoneBalance' => [
                'type' => 'INT',
                'constraint' => 16,
                'default' => 0,
            ],
            'milestoneTarget' => [
                'type' => 'INT',
                'constraint' => 16,
            ],
            'milestoneStatus' => [
                'type' => 'ENUM',
                'constraint' => ['draft', 'publish', 'archive','ended'],
                'default' => 'draft',
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
        $this->forge->addPrimaryKey('milestoneId');
        $this->forge->addForeignKey('creatorId', 'Creator', 'creatorId', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Milestone');

        // Create Trigger Updated At
        $this->db->query("CREATE TRIGGER MilestoneUpdatedAt BEFORE UPDATE ON Milestone FOR EACH ROW SET NEW.updatedAt = CURRENT_TIMESTAMP");
    }

    public function down()
    {
        // Drop Tabel Milestone
        $this->forge->dropTable('Milestone');
    }
}