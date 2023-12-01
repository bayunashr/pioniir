<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Admin extends Migration
{
    public function up()
    {
        // Create Tabel Admin
        $this->forge->addField([
            'adminId' => [
                'type' => 'CHAR',
                'constraint' => 36,
            ],
            'adminName' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'adminEmail' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'adminPassword' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'createdAt' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updatedAt' => [
                'type'    => 'TIMESTAMP',
                'null'    => true,
            ],
        ]);
        $this->forge->addPrimaryKey('adminId');
        $this->forge->createTable('Admin');

        // Create Trigger Updated At
        $this->db->query("CREATE TRIGGER AdminUpdatedAt BEFORE UPDATE ON Admin FOR EACH ROW SET NEW.updatedAt = CURRENT_TIMESTAMP");
    }

    public function down()
    {
        // Drop Tabel Admin
        $this->forge->dropTable('Admin');
    }
}
