<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

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
            'subTimestamp' => [
                'type' => 'TIMESTAMP',
            ],
        ]);
        $this->forge->addPrimaryKey('subId');
        $this->forge->addForeignKey('userId', 'User', 'userId', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('creatorId', 'Creator', 'creatorId', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Subscribe');
    }

    public function down()
    {
        // Drop Tabel Subscribe
        $this->forge->dropTable('Subscribe');
    }
}
