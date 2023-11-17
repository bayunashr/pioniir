<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class User extends Migration
{
    public function up()
    {
        // Create Tabel User
        $this->forge->addField([
            'userId' => [
                'type' => 'CHAR',
                'constraint' => 36,
            ],
            'userName' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'userFullName' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'userEmail' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'userPassword' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'userStatus' => [
                'type'       => 'ENUM',
                'constraint' => ['active', 'ban'],
                'default'    => 'active',
            ],
            'userAvatar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
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
        $this->forge->addPrimaryKey('userId');
        $this->forge->createTable('User');

        // Create Trigger Updated At
        $this->db->query("CREATE TRIGGER UserUpdatedAt BEFORE UPDATE ON User FOR EACH ROW SET NEW.updatedAt = CURRENT_TIMESTAMP");
    }

    public function down()
    {
        // Drop Tabel User
        $this->forge->dropTable('User');
    }
}
