<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

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
                'constraint'=> 16,
            ],
            'milestoneTarget' => [
                'type' => 'INT',
                'constraint'=> 16,
            ],
            'milestoneStatus' => [
                'type'       => 'ENUM',
                'constraint' => ['draft', 'publish', 'archive'],
                'default'    => 'draft',
            ],
        ]);
        $this->forge->addPrimaryKey('milestoneId');
        $this->forge->addForeignKey('creatorId', 'Creator', 'creatorId', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Milestone');
    }

    public function down()
    {
        // Drop Tabel Milestone
        $this->forge->dropTable('Milestone');
    }
}
