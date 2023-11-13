<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

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
            'donateTimestamp' => [
                'type' => 'TIMESTAMP',
            ],
        ]);
        $this->forge->addPrimaryKey('donateId');
        $this->forge->addForeignKey('userId', 'User', 'userId', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('creatorId', 'Creator', 'creatorId', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Donate');
    }

    public function down()
    {
        // Drop Tabel Donate
        $this->forge->dropTable('Donate');
    }
}
