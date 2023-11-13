<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Buy extends Migration
{
    public function up()
    {
        // Create Tabel Buy
        $this->forge->addField([
            'buyId' => [
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
            ],
            'buyTimestamp' => [
                'type' => 'TIMESTAMP',
            ],
        ]);
        $this->forge->addPrimaryKey('buyId');
        $this->forge->addForeignKey('userId', 'User', 'userId', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('contentId', 'Content', 'contentId', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Buy');
    }

    public function down()
    {
        // Drop Tabel Buy
        $this->forge->dropTable('Buy');
    }
}
