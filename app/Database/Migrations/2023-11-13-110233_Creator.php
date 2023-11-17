<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Creator extends Migration
{
    public function up()
    {
        // Create Tabel Creator
        $this->forge->addField([
            'creatorId' => [
                'type' => 'CHAR',
                'constraint' => 36,
            ],
            'userId' => [
                'type' => 'CHAR',
                'constraint' => 36,
            ],
            'creatorAlias' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'creatorTag' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'creatorDescription' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'creatorSubPrice' => [
                'type' => 'INT',
                'constraint' => 16,
                'null' => true,
            ],
            'creatorBalance' => [
                'type' => 'INT',
                'constraint' => 16,
                'default' => 0,
            ],
            'creatorBanner' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
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
        $this->forge->addPrimaryKey('creatorId');
        $this->forge->addForeignKey('userId', 'User', 'userId', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Creator');

        // Create Trigger Updated At
        $this->db->query("CREATE TRIGGER CreatorUpdatedAt BEFORE UPDATE ON Creator FOR EACH ROW SET NEW.updatedAt = CURRENT_TIMESTAMP");
    }

    public function down()
    {
        // Drop Tabel Creator
        $this->forge->dropTable('Creator');
    }
}
