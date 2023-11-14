<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Content extends Migration
{
    public function up()
    {
        // Create Tabel Content
        $this->forge->addField([
            'contentId' => [
                'type' => 'CHAR',
                'constraint' => 36,
            ],
            'creatorId' => [
                'type' => 'CHAR',
                'constraint' => 36,
            ],
            'contentValue' => [
                'type' => 'TEXT',
            ],
            'contentStatus' => [
                'type' => 'ENUM',
                'constraint' => ['draft', 'publish', 'archive'],
                'default' => 'draft',
            ],
            'contentPrice' => [
                'type' => 'INT',
                'constraint' => 16,
            ],
            'contentPreview' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'contentDownload' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'contentLike' => [
                'type' => 'INT',
                'constraint' => 16,
                'default' => 0,
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
        $this->forge->addPrimaryKey('contentId');
        $this->forge->addForeignKey('creatorId', 'Creator', 'creatorId', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Content');

        // Create Trigger Updated At
        $this->db->query("CREATE TRIGGER ContentUpdatedAt BEFORE UPDATE ON Content FOR EACH ROW SET NEW.updatedAt = CURRENT_TIMESTAMP");
    }

    public function down()
    {
        // Drop Tabel Content
        $this->forge->dropTable('Content');
    }
}
