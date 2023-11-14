<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

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
                'type' => 'INT',
                'constraint' => 4,
                'deafult' => 0,
            ],
            'contentPrice' => [
                'type' => 'INT',
                'constraint' => 16,
                'null' => true,
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
        ]);
        $this->forge->addPrimaryKey('contentId');
        $this->forge->addForeignKey('creatorId', 'Creator', 'creatorId', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Content');
    }

    public function down()
    {
        // Drop Tabel Content
        $this->forge->dropTable('Content');
    }
}
