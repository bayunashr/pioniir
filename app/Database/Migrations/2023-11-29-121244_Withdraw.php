<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Withdraw extends Migration
{
    public function up()
    {
        // Create Tabel Withdraw
        $this->forge->addField([
            'withdrawId' => [
                'type' => 'CHAR',
                'constraint' => 36,
            ],
            'creatorId' => [
                'type' => 'CHAR',
                'constraint' => 36,
            ],
            'withdrawAmount' => [
                'type' => 'int',
                'constraint' => 16,
            ],
            'withdrawStatus' => [
                'type' => 'ENUM',
                'constraint' => ['fail', 'pending', 'success'],
                'default' => 'pending',
            ],
            'withdrawTimestamp' => [
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
        $this->forge->addPrimaryKey('withdrawId');
        $this->forge->addForeignKey('creatorId', 'Creator', 'creatorId', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Withdraw');

        // Create Trigger Updated At
        $this->db->query("CREATE TRIGGER WithdrawUpdatedAt BEFORE UPDATE ON Withdraw FOR EACH ROW SET NEW.updatedAt = CURRENT_TIMESTAMP");
    }

    public function down()
    {
        // Drop Tabel Withdraw
        $this->forge->dropTable('Withdraw');
    }
}
